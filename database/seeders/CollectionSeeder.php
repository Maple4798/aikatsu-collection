<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CollectionSeeder extends Seeder
{
    public function run(): void
    {
        $cards = DB::table('cards')->get();

        foreach ($cards as $card) {
            DB::table('collections')->insert([
                'card_id' => $card->id,
                'quantity' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}