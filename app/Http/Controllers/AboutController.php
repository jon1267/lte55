<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\About;
use App\Accordion;
use App\Team;

class AboutController extends Controller
{
    public function about()
    {
        $active = [];
        for($i=0; $i<=7; $i++) $active[$i] = false;
        $active[1] = true;

        $abouts = About::get();
        $accordions = Accordion::get();
        $teams = Team::get();

        $breadCrumb = 'About Us';

        $templates = [
            0 => 'site.about.about_content',
            1 => 'site.about.about_team',
            2 => 'site.about.about_varius'
        ];

        return view('site.about.about', [
            'breadCrumb' => $breadCrumb,
            'active' => $active,
            'templates' => $templates,
            'abouts' => $abouts,
            'accordions' => $accordions,
            'teams' => $teams
        ]);
    }
}
