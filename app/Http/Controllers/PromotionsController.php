<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Promotion;
use App\Price;

class PromotionsController extends Controller
{
    public function promotions()
    {
        $active = [];
        for($i=0; $i<=7; $i++) $active[$i] = false;
        $active[5] = true;

        $promotions = Promotion::take(2)->get();
        $prices = Price::get();

        $breadCrumb = 'Promotions';
        $templates = [
            0 => 'site.promotions.promotions_content',
            1 => 'site.promotions.promotions_price',
            2 => 'site.promotions.promotions_varius'
        ];

        return view('site.promotions.promotions', [
            'breadCrumb' => $breadCrumb,
            'active' => $active,
            'templates' => $templates,
            'promotions' => $promotions,
            'prices' => $prices
        ]);
    }
}
