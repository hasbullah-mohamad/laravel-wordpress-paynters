<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PagesController extends Controller
{
    public function page($page)
    {
        $page = Post::published()->where('post_type', 'page')->where('post_name', $page)->firstOrFail();
        $template = $page->getMeta('_wp_page_template');
        return view($template ?: 'page', compact('page'));
    }
}
