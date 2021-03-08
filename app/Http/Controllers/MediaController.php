<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Term;
use App\Models\TermRelationship;
use App\Models\Taxonomy;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->all();
        $per_page = get_option('posts_per_page', 10);
        $page = (int)$request->get('page', 1);

        if ($sticky = get_option('sticky_posts', [])) {
            $sticky = Post::find(current($sticky));
        }

        $posts = Post::type('post')
            ->published()
            ->where('id', '!=', $sticky ? $sticky->id : -1)
            ->filterBy('category', $request->category);

        $years = clone $posts;
        $years->select(\DB::raw('DISTINCT YEAR(post_date) AS `year`'))
              ->orderBy('year', 'desc');

        if ($request->year) {
            $posts->where('post_date', 'LIKE', "{$request->year}%");
        }

        if (strlen($request->q) > 2) {
            $posts->where('post_title', 'LIKE', "%{$request->q}%");
        }

        $total = ceil($posts->count() / $per_page);

        $posts->offset($per_page*($page-1))
              ->limit($per_page)
              ->orderBy('post_date', 'desc');

        $pager = create_pager($total, $page, $query);

        $category = Term::find($request->category);

        $categories = Taxonomy::name('category')
            ->where('count', '>', 0)
            ->withTerms();

        return view('media', compact('sticky', 'posts', 'categories', 'page', 'pager', 'total', 'query', 'years'));
    }

    public function post($slug)
    {
        $media = false;
        if (get_option('page_for_posts')) {
            $media = Post::find(get_option('page_for_posts'));
        }

        if (is_numeric($slug) and $id = $slug) {
            $post = Post::find($id);
        } else {
            $post = Post::root($slug);
        }

        if ($sticky = get_option('sticky_posts', [])) {
            $sticky = Post::find(current($sticky));
        }

        $latest = Post::type('post')
            ->published()
            ->where('id', '!=', $sticky ? $sticky->id : -1)
            ->where('id', '!=', $post->id)
            ->limit(3)
            ->orderBy('post_date', 'desc');

        return view('media-article', [
            'categories' => $post->terms('category'),
            'content' => $post->content(),
            'date' => $post->date(),
            'image' => $post->featuredImage('large'),
            'latest' => $latest,
            'media' => $media,
            'title' => $post->title,
        ]);
    }
}


