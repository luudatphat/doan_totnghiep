<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('loai')->insert([
            [
                'id'=>'1',
                'ma' => 'dt',
                'ten' => 'Điện thoại'
        	],
            [
                'id'=>'2',
                'ma' => 'lt',
                'ten' => 'Laptop'
        	],
        	[
                'id'=>'3',
                'ma' => 'mp',
                'ten' => 'Mỹ phẩm'
        	],
        ]);
        DB::table('hang')->insert([
            [
                'id'=>'1',
                'ma' => 'ap',
                'ten' => 'Apple'
            ],
            [
                'id'=>'2',
                'ma' => 'lg',
                'ten' => 'LG'
            ],
            [
                'id'=>'3',
                'ma' => 'dell',
                'ten' => 'Dell'
            ],
            [
                'id'=>'4',
                'ma'=>'sino',
                'ten'=>'Mỹ phẩm sino'
            ],
        ]);
        DB::table('sanpham')->insert([
            ['ma' => 'ip4',
             'ten' => 'Iphone4',
             'idnguoidung'=>'1',
             'idloai'=>'1',
             'idhang'=>'1',
             'ididid'=>'ididid',
            ],
            
        ]);
    }
}
