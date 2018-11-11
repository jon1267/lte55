<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mslider;
use App\Sslider;
use App\Feature;
use App\Price;
use App\Promotion;
use App\Seo_page;
use App\Gray;
use App\Home;

class IndexController extends Controller
{
    public function index()
    {
        $active = [];
        for($i=0; $i<=7; $i++) $active[$i] = false;
        $active[0] = true;

        $slider = 'site.home.main_slider';//or pic with text

        $templates = [
            0 => 'site.content_features',
            1 => 'site.pricing_table',
            2 => 'site.content_varius'
        ];

        $msliders = Mslider::take(3)->get()->toArray();
        $features = Feature::take(6)->get();
        $prices = Price::take(4)->get();

        $seoData = Seo_page::where('slug','home')->first()->toArray();

        return view('site.index', [
            'active' => $active,
            'slider' => $slider,
            'templates' => $templates,
            'msliders' => $msliders,
            'features' => $features,
            'prices' => $prices,
            'seoData' => $seoData
        ]);
    }

    public function home1()
    {
        $active = [];
        for($i=0; $i<=7; $i++) $active[$i] = false;
        $active[0] = true;

        $slider = 'site.home.home1_slider';//or pic with text

        $templates = [
            0 => 'site.home.home1_price',
            1 => 'site.home.home1_facilities',
            2 => 'site.content_features',
            3 => 'site.home.home1_grey_stripe',
            4 => 'site.promotions.promotions_content'
        ];

        $ssliders = Sslider::take(2)->get()->toArray();
        $features = Feature::take(6)->get();
        $promotions = Promotion::take(2)->get();
        $prices = Price::take(3)->get();
        $grays = Gray::get()->toArray();

        $seoData = Seo_page::where('slug','videlennie-serveri')->first()->toArray();

        return view('site.index', [
            'active' => $active,
            'slider' => $slider,
            'ssliders' => $ssliders,
            'templates' => $templates,
            'features' => $features,
            'promotions' => $promotions,
            'prices' => $prices,
            'grays' => $grays,
            'seoData' => $seoData
        ]);
    }

    public function home2()
    {
        $active = [];
        for($i=0; $i<=7; $i++) $active[$i] = false;
        $active[0] = true;

        $slider = 'site.home.home2_slider';//or pic with text


        $templates = [
            0 => 'site.home.home2_content',
            1 => 'site.content_features',
            2 => 'site.contact.contact_form_map',
        ];

        $features = Feature::take(6)->get();
        $homes = Home::orderBy('created_at', 'desc')->get();
        $seoData = Seo_page::where('slug','home')->first()->toArray();

        return view('site.index', [
            'active' => $active,
            'slider' => $slider,
            'templates' => $templates,
            'features' => $features,
            'homes' => $homes,
            'seoData' => $seoData
        ]);
    }

    public function home3()
    {
        $active = [];
        for($i=0; $i<=7; $i++) $active[$i] = false;
        $active[0] = true;

        $slider = 'site.home.home3_slider';//or pic with text

        $templates = [
            0 => 'site.home.home3_content1',
            1 => 'site.home.home3_content2',
            2 => 'site.home.home3_content3',
            3 => 'site.content_features',
            4 => 'site.home.home3_price',
        ];

        $features = Feature::take(6)->get();
        $seoData = Seo_page::where('slug','home')->first()->toArray();

        return view('site.index', [
            'active' => $active,
            'slider' => $slider,
            'templates' => $templates,
            'features' => $features,
            'seoData' => $seoData
        ]);
    }
}
