<?php

use Illuminate\Database\Seeder;

class ActiveModelsTableSeeder extends Seeder
{

    private $models = [
        [
            'name' => 'User',
            'active' => 1,
            'icon' => 'users_single-02',
            'slug' => 'users'
        ],
        [
            'name' => 'Coffee',
            'active' => 1,
            'icon' => 'objects_planet',
            'slug' => 'coffees'
        ],
        [
            'name' => 'ActiveModel',
            'active' => 1,
            'icon' => 'ui-1_settings-gear-63',
            'slug' => 'active_models'
        ]
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->models as $model) {
            \App\ActiveModel::create($model);
        }
    }
}
