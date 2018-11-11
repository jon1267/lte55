<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FeaturesController extends Controller
{
    // all blades see page_*_*
    public function fullWidth()
    {
        $active = [];
        for($i=0; $i<=7; $i++) $active[$i] = false;
        $active[4] = true;

        $breadCrumb = 'Page Full Width';
        $template = 'site.features.page_full_width';

        // шаблон 'site.portfolio' тут не ошибка...
        // у Portfolio и Features полн. все одинак.
        // и по 1 блоку контента
        return view('site.portfolio.portfolio', [
            'breadCrumb' => $breadCrumb,
            'active' => $active,
            'template' => $template
        ]);
    }

    public function leftBar()
    {
        $active = [];
        for($i=0; $i<=7; $i++) $active[$i] = false;
        $active[4] = true;

        $breadCrumb = 'Page Left Sidebar';
        $template = 'site.features.page_left_bar';

        return view('site.portfolio.portfolio', [
            'breadCrumb' => $breadCrumb,
            'active' => $active,
            'template' => $template
        ]);
    }
    public function rightBar()
    {
        $active = [];
        for($i=0; $i<=7; $i++) $active[$i] = false;
        $active[4] = true;

        $breadCrumb = 'Page Right Sidebar';
        $template = 'site.features.page_right_bar';

        return view('site.portfolio.portfolio', [
            'breadCrumb' => $breadCrumb,
            'active' => $active,
            'template' => $template
        ]);
    }
    public function pageFaq()
    {
        $active = [];
        for($i=0; $i<=7; $i++) $active[$i] = false;
        $active[4] = true;

        $breadCrumb = 'Page Faq Questions';
        $template = 'site.features.page_faq';

        return view('site.portfolio.portfolio', [
            'breadCrumb' => $breadCrumb,
            'active' => $active,
            'template' => $template
        ]);
    }
    public function siteMap()
    {
        $active = [];
        for($i=0; $i<=7; $i++) $active[$i] = false;
        $active[4] = true;

        $breadCrumb = 'Sitemap';
        $template = 'site.features.page_sitemap';

        return view('site.portfolio.portfolio', [
            'breadCrumb' => $breadCrumb,
            'active' => $active,
            'template' => $template
        ]);
    }
}
