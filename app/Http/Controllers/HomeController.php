<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Project;
use App\Models\Taxonomy;
use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        if ($request->p and $request->preview) {
            return \App::call('\App\Http\Controllers\MediaController@post', [(int)$request->p]);
        }

        if ($home = get_the_ID()) {
            $home = Post::find($home);
        }

        $media = false;
        if (get_option('page_for_posts')) {
            $media = Post::find(get_option('page_for_posts'));
        }

        $posts = Post::type('post')
            ->published()
            ->orderBy('post_date', 'desc')
            ->limit(3);

        $projects = Project::withCategories()
            ->orderByDate()
            ->withAwards()
            ->having('categories', 'like', '%featured%');

        $categories = Taxonomy::name('project_category')
            ->select('*', \DB::raw('name LIKE "%featured%" AS active'))
            ->where('count', '>', 0)
            ->withTerms()
            ->orderBy('term_order');

        return view('home', [
            'categories' => $categories->get(),
            'home' => $home,
            'media' => $media,
            'posts' => $posts->get(),
            'projects' => $projects->get(),
            'template_style' => 'primary',
        ]);
    }
}


