<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class NeedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         Catgory::create([
            'category' => 'Coffee',
        ]);
       
       
    }
}
