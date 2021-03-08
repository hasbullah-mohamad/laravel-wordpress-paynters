<?php 

use App\Models\Post;
use App\Models\Project;
use App\Models\ProjectsAwards;
use App\Models\ProjectsCategories;


function save_project($id){

    $post = Post::find($id);
    if ($post->status != 'publish') {
        Project::destroy($id);
        ProjectsAwards::where('project_id', $id)->delete();
        ProjectsCategories::where('project_id', $id)->delete();
        return;
    }

    $project = Project::find($id) ?: new Project();
    $project->id = $id;
    $project->url = $post->url();
    $project->thumbnail_url = relative_url($post->featuredImage('medium_large'));
    $project->title = $post->title;
    $project->slug = $post->name;
    $project->content = $post->content;
    $project->menu_order = $post->menu_order;

    if ($region = $post->terms('project_region')->first()) {
        $project->region_id = $region->id;
    }

    $project->setTable('projects');
    $project->save();

    add_action('acf/save_post', function($id) use ($post, $project) {
        $project->completed = !$post->field('under_construction');
        if ($post->field('completion_year')) {
            $project->completion_date = $post->field('completion_year') . '-' . $post->field('completion_month');
        } else {
            $project->completion_date = null;
        }
        $project->save();
    });

    $categories = $post->terms('project_category')->map(function($term){ 
        return [
            'project_id' => $term->object_id,
            'term_id' => $term->term_id,
        ];
    });

    ProjectsCategories::where('project_id', $id)->delete();
    ProjectsCategories::insert($categories->toArray());
}


function delete_project_category($id) {
    ProjectsCategories::where('term_id', $id)->delete();
}

function update_projects_order() {
    parse_str($_POST['order'], $data);
    if ($data and $data['post']) {
        foreach ($data['post'] as $menu_order => $id) {
            Project::where('id', $id)->update(compact('menu_order'));
        }
    }
}