<?php

use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{

    private $permissions = [
        'delete',
        'edit',
        'create',
        'view'
    ];

    private $models = [
        'users',
        'coffees',
        'api_tokens',
        'active_models'
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->models as $model) {
            foreach ($this->permissions as $permission) {
                \Spatie\Permission\Models\Permission::create(['name' => $permission.' '.$model]);
            }
        }
    }
}
