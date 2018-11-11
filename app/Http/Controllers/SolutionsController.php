<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Feature;
use App\Price;
use App\Shared;
use App\Svp;
use App\Sdedic;
use App\Seo_page;

class SolutionsController extends Controller
{
    public function sharedHosting()
    {
        $active = [];
        for($i=0; $i<=7; $i++) $active[$i] = false;
        $active[2] = true;

        $features = Feature::take(6)->get();
        $prices = Price::take(4)->get();
        $shareds = Shared::get();

        $seoData = Seo_page::where('slug','server-web-app')->first()->toArray();

        $breadCrumb = 'Shared Hosting';
        $templates = [
            0 => 'site.solutions.solutions_hosting',
            1 => 'site.pricing_table',
            2 => 'site.content_features'
        ];

        return view('site.solutions.solutions', [
            'breadCrumb' => $breadCrumb,
            'active' => $active,
            'templates' => $templates,
            'features' => $features,
            'prices' => $prices,
            'shareds' => $shareds,
            'seoData' => $seoData
        ]);
    }

    public function virtualServers()
    {
        $active = [];
        for($i=0; $i<=7; $i++) $active[$i] = false;
        $active[2] = true;

        $features = Feature::take(6)->get();
        $prices = Price::take(4)->get();
        $svps = Svp::get();

        $seoData = Seo_page::where('slug','virtualnie-serveri')->first()->toArray();

        $breadCrumb = 'Virtual Hosting';
        $templates = [
            0 => 'site.solutions.solutions_vps',
            1 => 'site.pricing_table',
            2 => 'site.content_features'
        ];

        return view('site.solutions.solutions', [
            'breadCrumb' => $breadCrumb,
            'active' => $active,
            'templates' => $templates,
            'features' => $features,
            'prices' => $prices,
            'svps' => $svps,
            'seoData' => $seoData
        ]);
    }

    public function dedicatedServers()
    {
        $active = [];
        for($i=0; $i<=7; $i++) $active[$i] = false;
        $active[2] = true;

        $features = Feature::take(6)->get();
        $prices = Price::take(4)->get();
        $sdedics = Sdedic::get();

        $seoData = Seo_page::where('slug','videlennie-serveri')->first()->toArray();

        $breadCrumb = 'Dedicated Servers';
        $templates = [
            0 => 'site.solutions.solutions_dedic',
            1 => 'site.pricing_table',
            2 => 'site.content_features'
        ];

        return view('site.solutions.solutions', [
            'breadCrumb' => $breadCrumb,
            'active' => $active,
            'templates' => $templates,
            'features' => $features,
            'prices' => $prices,
            'sdedics' => $sdedics,
            'seoData' => $seoData
        ]);
    }
}
