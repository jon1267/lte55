<?php

use Illuminate\Database\Seeder;
use App\Mslider;
use App\Sslider;
use App\Feature;
use App\Price;


class MslidersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Mslider::truncate();
        Sslider::truncate();
        Feature::truncate();
        Price::truncate();

        // main slider, 3 records
        Mslider::create([
            'title' => 'Shared Hosting',
            'description' => 'Our Most Powerfull Hosting Package Ever',
            'p1' => ' Multi Core Processor Intel Xeon',
            'p2' => ' You Can Contact Us by Phone or Email',
            'p3' => ' 10TB Hardisk Space & Unlimited Domain',
            'p4' => ' Multi Core Processor Intel Xeon',
            'p5' => 'YEARLY FROM',
            'price' => '40',
            'img' => '3.png'
        ]);
        Mslider::create([
            'title' => 'Virtual Servers',
            'description' => 'Our Most Powerfull Hosting Package Ever',
            'p1' => ' Multi Core Processor Intel Xeon',
            'p2' => ' You Can Contact Us by Phone or Email',
            'p3' => ' 10TB Hardisk Space & Unlimited Domain',
            'p4' => ' Multi Core Processor Intel Xeon',
            'p5' => 'MONTHLY FROM',
            'price' => '15',
            'img' => '3.png'
        ]);
        Mslider::create([
            'title' => 'Dedicated Servers',
            'description' => 'Our Most Powerfull Hosting Package Ever',
            'p1' => ' Multi Core Processor Intel Xeon',
            'p2' => ' You Can Contact Us by Phone or Email',
            'p3' => ' 10TB Hardisk Space & Unlimited Domain',
            'p4' => ' Multi Core Processor Intel Xeon',
            'p5' => 'MONTHLY FROM',
            'price' => '120',
            'img' => '2.png'
        ]);

        // second slider, 2 records
        foreach(range(1,2) as $i) {
            Sslider::create([
                'title' => 'YOU RELAX, WE CARE FOR YOUR INFORMATION!',
                'description' => 'WE CARE VERY WELL YOUR INFORMATION, OUR PRIORITY IS TO ENSURE THE SAFETY OF YOUR DATA! Text4',
                'img' => ($i == 1) ? '1.png' : '3.png'
            ]);
        }

        // features, 6 records
        Feature::create([
            'title' => 'The improved infrastructure',
            'blue' => 'stability and speed',
            'text' => 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante.',
            'img' => '1.png'
        ]);
        Feature::create([
            'title' => 'Satisfaction Guarantee',
            'blue' => 'Quality hosting',
            'text' => 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante.',
            'img' => '2.png'
        ]);
        Feature::create([
            'title' => 'Constructor Site',
            'blue' => 'stability and speed',
            'text' => 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante.',
            'img' => '3.png'
        ]);
        Feature::create([
            'title' => '24/7 Support',
            'blue' => 'stability and speed',
            'text' => 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante.',
            'img' => '4.png'
        ]);
        Feature::create([
            'title' => 'Flexible Solutions',
            'blue' => 'speed and stability',
            'text' => 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante.',
            'img' => '1.png'
        ]);
        Feature::create([
            'title' => 'Backups Available',
            'blue' => 'expensive than money',
            'text' => 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante.',
            'img' => '5.png'
        ]);

        //price, 4 records
        $tarifPlan = [0=>'BASIC', 1=>'PREMIUM', 2=>'ADVANCE', 3=>'GOLD'];
        foreach(range(1,4) as $i) {
            Price::create([
                'title' => $tarifPlan[--$i],
                'price' => 13.99,
                'mo' => '/ Mo',
                'yearly' => 'Or  $ 150.5 Yearly!',
                'hdd' => '30 GB HDD',
                'bandwidth' => '1000GB Bandwidth',
                'ram' => '1024MB RAM',
                'ip' => '2 Dedicated IP Addresses',
                'cpanel' => 'cPanel/WHM Included',
                'os' => 'Open VZ Included',
            ]);

        }
    }
}
