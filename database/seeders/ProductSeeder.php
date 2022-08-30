<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $packages[]=['id'=>1,'recursive'=>0, 'type' => 'Gold Membership',    'price'=>'9.99', 'duration'=>'1', 'save'=>0];
        $packages[]=['id'=>2,'recursive'=>1, 'type' => 'Gold Membership',    'price'=>'8.31', 'duration'=>'3', 'save'=>'5'];
        $packages[]=['id'=>3,'recursive'=>1, 'type' => 'Gold Membership',    'price'=>'7.65', 'duration'=>'6', 'save'=>'13'];
        $packages[]=['id'=>4,'recursive'=>1, 'type' => 'Gold Membership',    'price'=>'6.65', 'duration'=>'12', 'save'=>'40'];;
        $packages[]=['id'=>5,'recursive'=>1, 'type' => 'Diamond Membership', 'price'=>'150',  'duration'=>'1200','save'=>0];
        foreach ($packages as $package){
            $product=new Product();
            $product->id=$product['id'];
            $product->type=$package['type'];
            $product->save=$package['save'];
            $product->price=$package['price'];
            $product->recursive=$package['recursive'];
            $product->duration=$package['duration'];
            $product->save();
        }
    }
}
