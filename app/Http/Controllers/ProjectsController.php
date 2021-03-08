<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectsAwards;
use App\Models\ProjectsCategories;
use App\Models\Taxonomy;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function index(Request $request)
    {
        // $products = $this->products($request);
        $filters = $this->filters($request);

        $categories_walker = function ($category) use ($filters, $request) { 
            $category->active = $category->id == $filters->category;
            $category->url = '?' . http_build_query( ['category' => $category->id ] );
            if (stristr($category->name, 'featured')) {
                $category->url = '.';
            }
            return $category; 
        };

        $categories = Taxonomy::name('project_category')
            ->where('count', '>', 0)
            ->withTerms()
            ->orderBy('term_order')
            ->get()
            ->map($categories_walker);

        $regions = Taxonomy::name('project_region')
            ->where('count', '>', 0)
            ->withTerms()
            ->orderBy('name');

        $projects = Project::filterBy($filters);

        $query = $request->all();
        $per_page = get_option('posts_per_page', 10);
        $page = (int)$request->get('page', 1);
        $total = ceil($projects->count() / $per_page);

        $projects->offset($per_page*($page-1))
                 ->limit($per_page)
                 ->withAwards()
                 ->isPublished()
                 ->orderByDate();

        return view('projects', [
            'page' => $page,
            'query' => $query,
            'total' => $total,
            'categories' => $categories,
            'projects' => $projects->get(),
            'regions' => $regions->get(),
        ]);
    }

    public function filters(Request $request)
    {
        $filters = (object)[
            'category' => $request->category == 'all' ? null : $request->category,
            'region' => $request->region,
            'q' => $request->q,
        ];
        //by default show featured projects
        if (!$request->all()) {
            $featured = Taxonomy::name('project_category')->withTerms()->where('name', 'like', '%featured%')->first();
            $filters->category = $featured->id;
        }
        return $filters;
    }

    public function details($slug, Request $request)
    {
        if (!$project = Project::where('slug', $slug)->first()) {
            throw new Exception('Project not found.', 1);
        }

        $projects = [];
        foreach (Project::filterBy($this->filters($request))->orderByDate()->get() as $item) {
            $projects[] = $item->id;
        }

        $other_projects = array_filter($projects, function($id) use ($project) { return $project->id != $id; });
        $projects = array_merge($other_projects, $projects, $other_projects);
        $index = array_search($project->id, $projects);

        $prev = isset($projects[$index-1]) ? Project::find($projects[$index-1]) : false;
        $next = isset($projects[$index+1]) ? Project::find($projects[$index+1]) : false;

        $award = ProjectsAwards::where('project_id', $project->id)
            ->orderBy('year', 'desc')
            ->detailed()
            ->take(1)
            ->first();

        $categories = $project->categories()
                              ->withTerms()
                              ->get()
                              ->map(function($cat){ return $cat->name; })
                              ->toArray();

        $gallery = $project->field('gallery', []);
        $gallery = array_map(function($image) { return isset($image['url']) ? $image['url'] : null; }, $gallery);

        $region = $project->region();
        $region = $region ? $region->name : null;
        
        return view('project-detail', compact('award', 'categories', 'gallery', 'next', 'prev', 'project', 'region'));
    }
}


