<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Administrador Tienda App',
            'email' => 'tiendaapp@tiendaapp.com',
            'password' => Hash::make('password'),
            "created_at" =>  Carbon::now(),
            "updated_at" => Carbon::now()
        ]);

        $this->call([
            BrandSeeder::class,
            ItemSeeder::class
        ]);
    }
}
