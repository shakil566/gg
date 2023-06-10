<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Brand::create([
            'name' => 'Bell',
            'code' => 'bell',
            'status' => '1',
        ]);
        Brand::create([
            'name' => 'Easy',
            'code' => 'easy',
            'status' => '1',
        ]);
    }
}
