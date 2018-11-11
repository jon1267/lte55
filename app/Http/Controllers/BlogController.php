<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function blog()
    {
        $active = [];
        for($i=0; $i<=7; $i++) $active[$i] = false;
        $active[6] = true;

        $breadCrumb = 'Blog Post';

        $template = 'site.blog.blog_posts';

        return view('site.blog.blog', [
            'breadCrumb' => $breadCrumb,
            'active' => $active,
            'template' => $template
        ]);

    }

    public function blogSingle()
    {
        $active = [];
        for($i=0; $i<=7; $i++) $active[$i] = false;
        $active[6] = true;

        $breadCrumb = 'Single Post';

        $template = 'site.blog.blog_single_post';

        return view('site.blog.blog', [
            'breadCrumb' => $breadCrumb,
            'active' => $active,
            'template' => $template
        ]);
    }
}
