<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Portfolio;

class PortfolioController extends Controller
{
    private $filters = [
        0=>'desing', 1=>'development', 2=>'development',
        3=>'development', 4=>'desing retina', 5=>'mobile',
        6=>'retina', 7 => 'mobile desing'
    ];
    public function portfolio2()
    {
        $active = [];
        for($i=0; $i<=7; $i++) $active[$i] = false;
        $active[3] = true;

        $breadCrumb = 'Portfolio 2';
        $template = 'site.portfolio.portfolio_2';
        $portfolios = Portfolio::get();

        return view('site.portfolio.portfolio', [
            'breadCrumb' => $breadCrumb,
            'active' => $active,
            'template' => $template,
            'portfolios' => $portfolios,
            'filters' => $this->filters
        ]);
    }

    public function portfolio3()
    {
        $active = [];
        for($i=0; $i<=7; $i++) $active[$i] = false;
        $active[3] = true;

        $breadCrumb = 'Portfolio 3';
        $template = 'site.portfolio.portfolio_3';
        $portfolios = Portfolio::get();

        return view('site.portfolio.portfolio', [
            'breadCrumb' => $breadCrumb,
            'active' => $active,
            'template' => $template,
            'portfolios' => $portfolios,
            'filters' => $this->filters
        ]);
    }

    public function portfolio4()
    {
        $active = [];
        for($i=0; $i<=7; $i++) $active[$i] = false;
        $active[3] = true;

        $breadCrumb = 'Portfolio 4';
        $template = 'site.portfolio.portfolio_4';
        $portfolios = Portfolio::get();

        return view('site.portfolio.portfolio', [
            'breadCrumb' => $breadCrumb,
            'active' => $active,
            'template' => $template,
            'portfolios' => $portfolios,
            'filters' => $this->filters
        ]);
    }
}
