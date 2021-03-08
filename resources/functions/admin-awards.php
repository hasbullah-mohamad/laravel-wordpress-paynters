<?php 

use App\Models\Post;
use App\Models\ProjectsAwards;
use App\Models\Term;

function save_award($id){

    $award = Post::find($id);
    if ($award->status != 'publish') {
        ProjectsAwards::where('award_id', $award->id)->delete();
        return;
    }

    $awarder = $award->terms('award_awarder')->first();

    $badges = $awarder ? $awarder->field('badges', []) : [];
    $badges = array_reduce($badges, function($carry, $item){ 
        return $carry + [ $item['year'] => $item['image']['sizes']['medium'] ];
    }, []);

    add_action('acf/save_post', function($id) use ($award, $awarder, $badges) {
        $data = array_map(function($winner) use ($award, $awarder, $badges) {
            return [
                'award_id' => $award->id,
                'awarder_id' => $awarder ? $awarder->id : null,
                'project_id' => $winner['project']->ID,
                'title' => $award->title,
                'subtitle' => $winner['subtitle'],
                'year' => $winner['year'],
                'featured' => $winner['featured'],
                'badge_url' => isset($badges[$winner['year']]) ? $badges[$winner['year']] : null,
                'thumbnail_url' => $winner['thumbnail'] ? $winner['thumbnail']['sizes']['medium_large'] : null,
            ];
        }, $award->field('winners', []));
        ProjectsAwards::where('award_id', $award->id)->delete();
        ProjectsAwards::insert($data);
    });

}

function save_awarder($id){

    $awarder = Term::find($id);

    ProjectsAwards::where('awarder_id', $awarder->id)->update(['badge_url' => null]);

    foreach ($awarder->field('badges', []) as $badge) {
        ProjectsAwards::where('awarder_id', $awarder->id)
                      ->where('year', $badge['year'])
                      ->update(['badge_url' => $badge['image']['sizes']['medium']]);
    }

}



// Add the custom columns to the award post type:
add_filter( 'manage_award_posts_columns', function($columns) {
    return [
      'cb' => '<input type="checkbox" />',
      'title' => 'Title',
      'projects' => 'Projects',
      'taxonomy-award_awarder' => 'Awarders',
      'date' => 'Date',
    ];
});

// Add the data to the custom columns for the award post type:
add_action( 'manage_award_posts_custom_column' , function($column, $post_id){
    switch ( $column ) {
        case 'projects' :
            $projects = array_map(function($winner) {
                if ($winner['project']) {
                    $title = $winner['project']->post_title;
                    $id = $winner['project']->ID;
                    $link = "/cms/wp-admin/post.php?post=$id&action=edit";
                    return "<a href='$link'>$title</a>";
                }
            }, get_field('winners', $post_id));
            echo join(', ', array_filter($projects));
    }
}, 10, 2 );
