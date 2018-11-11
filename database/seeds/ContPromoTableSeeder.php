<?php

use Illuminate\Database\Seeder;
use App\Contact;
use App\Promotion;

class ContPromoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Contact::truncate();
        Promotion::truncate();

        // contacts Cites. 3 records...
        Contact::create([
            'title' => 'Москва',
            'p1' => '(499) 777-21-12',
            'p2' => 'ул. Московская 12',
            'p3' => 'info@yourdomain.com',
            'description' => 'Lorem Ipsum - это текст-рыба, часто используемый в печати и вэб-дизайне. Lorem Ipsum',
            'img' => 'office.jpg'
        ]);
        Contact::create([
            'title' => 'СПб',
            'p1' => '(812) 777-21-12',
            'p2' => 'ул. Питерская 21',
            'p3' => 'info@yourdomain.com',
            'description' => 'Lorem Ipsum - это текст-рыба, часто используемый в печати и вэб-дизайне. Lorem Ipsum',
            'img' => 'office2.jpg'
        ]);
        Contact::create([
            'title' => 'Екатеринбург',
            'p1' => '(343) 777-21-12',
            'p2' => 'ул. Свободы 123',
            'p3' => 'info@yourdomain.com',
            'description' => 'Lorem Ipsum - это текст-рыба, часто используемый в печати и вэб-дизайне. Lorem Ipsum',
            'img' => 'office3.jpg'
        ]);

        //promotions, 2 records
        $titles = [
            '0'=>'Security', '1'=>'Scalable', '2'=>'Robust',
            '3'=>'A fair prices', '4'=>'Without paying more', '5'=>'Do not think twice',
        ];
        foreach(range(1,2) as $i) {
            Promotion::create([
                'title' => ($i == 1) ? 'High-End Servers' : 'Unattainable Promotions %',
                'p1' => ($i == 1) ? $titles[0] : $titles[3],
                't1' => 'Lorem ipsum ea cum congue bonorum, pri no natum clita. His ne vide omnis forensibus. Eum cetero imperdiet et.',
                'p2' => ($i == 1) ? $titles[1] : $titles[4],
                't2' => 'Lorem ipsum ea cum congue bonorum, pri no natum clita. His ne vide omnis forensibus. Eum cetero imperdiet et.',
                'p3' => ($i == 1) ? $titles[2] : $titles[5],
                't3' => 'Lorem ipsum ea cum congue bonorum, pri no natum clita. His ne vide omnis forensibus. Eum cetero imperdiet et.',

            ]);
        }
    }
}
