<?php

use Illuminate\Database\Seeder;
use App\Shared;
use App\Svp;
use App\Sdedic;

class SoluTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Shared::truncate();
        Svp::truncate();
        Sdedic::truncate();

        // 'img' => 'mhost/img/servers/1.png',
        Shared::create([
        'title' => 'Shared Web Hosting',
        'description' => 'We have a wide range of managed dedicated servers, which allow your applications to make a 100% productive and efficient.',
        'text' =>   trim('Inani nominati sit eu. Te ubique cotidieque philosophia mel, vix id omnes iudico prompta. Ex usu nihil mediocritatem.  Sea qu').
            trim('od vituperata no, omittam offendit vel in. Noster voluptua luptatum id mea. Et voluptatum adversarium usu, rebum nominati recte').
            trim('que vix ei. Lorem ipsum ea cum congue bonorum, pri no natum clita. His ne vide omnis forensibus. Eum cetero imperdiet et. Id mut').
            trim('at mazim quo, recusabo consequat scribentur te pro, nam laudem eripuit at Lorem ipsum ea cum congue bonorum, pri no natum clita. Hi').
            trim('s ne vide omnis forensibus.'),
        'img' => '1.png'
    ]);

        Svp::create([
            'title' => 'Managed VPS Hosting Servers',
            'description' => 'We have a wide range of managed dedicated servers, which allow your applications to make a 100% productive and efficient.',
            'text' =>   trim('Inani nominati sit eu. Te ubique cotidieque philosophia mel, vix id omnes iudico prompta. Ex usu nihil mediocritatem.  Sea qu').
                trim('od vituperata no, omittam offendit vel in. Noster voluptua luptatum id mea. Et voluptatum adversarium usu, rebum nominati recte').
                trim('que vix ei. Lorem ipsum ea cum congue bonorum, pri no natum clita. His ne vide omnis forensibus. Eum cetero imperdiet et. Id mut').
                trim('at mazim quo, recusabo consequat scribentur te pro, nam laudem eripuit at Lorem ipsum ea cum congue bonorum, pri no natum clita. Hi').
                trim('s ne vide omnis forensibus.'),
            'img' => '1.png'
        ]);

        Sdedic::create([
            'title' => 'Total Management of Dedicated Server',
            'description' => 'We have a wide range of managed dedicated servers, which allow your applications to make a 100% productive and efficient.',
            'text' =>   trim('Inani nominati sit eu. Te ubique cotidieque philosophia mel, vix id omnes iudico prompta. Ex usu nihil mediocritatem.  Sea qu').
                trim('od vituperata no, omittam offendit vel in. Noster voluptua luptatum id mea. Et voluptatum adversarium usu, rebum nominati recte').
                trim('que vix ei. Lorem ipsum ea cum congue bonorum, pri no natum clita. His ne vide omnis forensibus. Eum cetero imperdiet et. Id mut').
                trim('at mazim quo, recusabo consequat scribentur te pro, nam laudem eripuit at Lorem ipsum ea cum congue bonorum, pri no natum clita. Hi').
                trim('s ne vide omnis forensibus.'),
            'img' => '2.png'
        ]);
    }
}
