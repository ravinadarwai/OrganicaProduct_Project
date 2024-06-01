<?php

namespace Database\Seeders;

use App\Models\trendymodel;
use faker\Factory as trendyfaker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Userseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = trendyfaker::create();
        $trendy = new trendymodel;
        $trendy->prono = "56";
       

        $trendy->name	 =  $faker->name;
        $trendy->quant	 = "78";

        $trendy->date = $faker->date;

        $trendy->sprice	 = "34";
        $trendy->cprice = "38978";
        $trendy->description = "djkjdkj";
        $trendy->image = $faker->imageUrl(200, 200);


        $trendy->save();



    }
}
