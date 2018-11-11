<?php

use Illuminate\Database\Seeder;
use App\Gray;
use App\Home;
use App\Portfolio;

class GraysHomesPortsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Gray::truncate();
        Home::truncate();
        Portfolio::truncate();

        Gray::create([
            'title' => 'our Facilities',
            'text' =>   trim('Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultri').
                        trim('cies mi vitae est. Mauris placerat eleifend leo. s egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.')
        ]);
        Gray::create([
            'title' => 'Need Help? Call our support team 7/365 01 8000 127 200',
            'text' =>  ''
        ]);
        Gray::create([
            'title' => '¿Would not you like to have a more reliable solution for information on your drive?',
            'text' => 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.'
        ]);

        Home::create([
            'title' => 'Profesional Web Hosting',
            'description' => 'We have a wide range of managed dedicated servers, which allow your applications to make a 100% productive and efficient.',
            'text' =>   trim('Inani nominati sit eu. Te ubique cotidieque philosophia mel, vix id omnes iudico prompta. Ex usu nihil mediocritatem.  Sea qu').
                        trim('od vituperata no, omittam offendit vel in. Noster voluptua luptatum id mea. Et voluptatum adversarium usu, rebum nominati recte').
                        trim('que vix ei. Lorem ipsum ea cum congue bonorum, pri no natum clita. His ne vide omnis forensibus. Eum cetero imperdiet et. Id mut').
                        trim('at mazim quo, recusabo consequat scribentur te pro, nam laudem eripuit at Lorem ipsum ea cum congue bonorum, pri no natum clita. Hi').
                        trim('s ne vide omnis forensibus.'),
            'img' => 'Server_06.jpg',
        ]);


        $title = [
            0 => 'Jekas Responsive Page', 1 =>'Mycv - Html5', 2 => 'MegaHost - Hosting',
            3 => 'Studio - Landing Page', 4 =>'Ebook - Landing Page', 5 => 'Gotten - Landing Page',
            6 => 'Vinilo - Html Page', 7 => 'NewHosting - Html Page'
        ];
        foreach(range(0,7) as $i) {
            Portfolio::create([
                'title' => $title[$i],
                'description' => 'Pellentesque habitant morbi tristique.',
                'img' => ++$i.'.jpg',
            ]);
        }

    }
}
