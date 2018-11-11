<?php

use Illuminate\Database\Seeder;
use App\About;
use App\Accordion;
use App\Team;

class AboutsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        About::truncate();
        Accordion::truncate();
        Team::truncate();

        // abouts, 1 record
        About::create([
            'title' => 'About Us',
            'description' => 'Lorem ipsum ea cum congue bonorum, pri no natum clita. His ne vide omnis forensibus. Eum cetero imperdiet et. Id mutat mazim quo, recusabo consequat scribentur te pro, nam laudem eripuit at Lorem ipsum ea cum congue bonorum, pri no natum clita. His ne vide omnis forensibus.
            Inani nominati sit eu. Te ubique cotidieque philosophia mel, vix id omnes iudico prompta. Ex usu nihil mediocritatem. Sea quod vituperata no, omittam offendit vel in. Noster voluptua luptatum id mea. Et voluptatum adversarium usu, rebum nominati recteque vix ei.',
            'img' => 'office.jpg',
        ]);

        //content accordions, 3 records
        Accordion::create([
            'name' => 'Accomplishment',
            'title' => 'Accomplishment',
            'text' => 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.',
        ]);
        Accordion::create([
            'name' => 'Honesty',
            'title' => 'Honesty',
            'text' => 'Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci.',
        ]);
        Accordion::create([
            'name' => 'Responsibility',
            'title' => 'Responsability',
            'text' => 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.',
        ]);

        //teams table - 4 rec    'img' => 'mhost/img/team/1.jpg'
        Team::create([
            'name' => 'Fernis Drisfre',
            'position' => 'Founder/Partner',
            'text' => 'Sed nunc tortor, sagittis quis viverra id, molestie vitae nibh. Donec vitae lacus sed risus consectetur.',
            'img' => '1.jpg',
        ]);
        Team::create([
            'name' => 'George Retruper',
            'position' => 'Founder/Partner',
            'text' => 'Sed nunc tortor, sagittis quis viverra id, molestie vitae nibh. Donec vitae lacus sed risus consectetur.',
            'img' => '2.jpg',
        ]);
        Team::create([
            'name' => 'Clarey feriter',
            'position' => 'Comunity manager',
            'text' => 'Sed nunc tortor, sagittis quis viverra id, molestie vitae nibh. Donec vitae lacus sed risus consectetur.',
            'img' => '3.jpg',
        ]);
        Team::create([
            'name' => 'Trisre Dritts',
            'position' => 'Support',
            'text' => 'Sed nunc tortor, sagittis quis viverra id, molestie vitae nibh. Donec vitae lacus sed risus consectetur.',
            'img' => '4.jpg',
        ]);
    }
}
