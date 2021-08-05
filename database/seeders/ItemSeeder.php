<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('items')->insert($this->fillItems());
    }

    private function fillItems(): array{
        $arrayForItems = array();
        if (($g = fopen("database/files/items.csv", 'rb'))) {
            while (($data = fgetcsv($g, 0, ";"))) {
                $arrayForItems[] = [
                    'name' => $data[0],
                    'size' => $data[1],
                    'observations' => $data[2],
                    'providerName' => $data[3],
                    'onHand' => $data[4],
                    'shippingDate' => $data[5],
                    "created_at" => Carbon::now(),
                    "updated_at" => Carbon::now(),
                ];
            }
            fclose($g);
        }
        return $arrayForItems;
    }
}
