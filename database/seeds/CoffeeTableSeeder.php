<?php

use Illuminate\Database\Seeder;

class CoffeeTableSeeder extends Seeder
{
    protected $coffees = [
        [
            'name' => 'Black',
            'price' => 1.25
        ],
        [
            'name' => 'Cappuchino',
            'price' => 1.50
        ],
        [
            'name' => 'Latte Macchiato',
            'price' => 1.75
        ],
        [
            'name' => 'Espresso',
            'price' => 1.00
        ],
        [
            'name' => 'Irish coffee',
            'price' => 1.75
        ],
        [
            'name' => 'Caffe americano',
            'price' => 1.25
        ],
        [
            'name' => 'Chocalate milk',
            'price' => 1.00
        ],
        [
            'name' => 'Coffee with milk',
            'price' => 1.00
        ],
        [
            'name' => 'Caramel Macchiato',
            'price' => 2.00
        ],
        [
            'name' => 'American ultra iced latte with skim organic alp goat milk',
            'price' => 2.00
        ],
        [
            'name' => 'Real Tweek Bros.',
            'price' => 3.10
        ],
        [
            'name' => 'Organic bean coffee',
            'price' => 2.50
        ]
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->coffees as $coffee) {
            \App\Coffee::create($coffee);
        }
    }
}
