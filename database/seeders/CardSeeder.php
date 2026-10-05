<?php

namespace Database\Seeders;

use App\Models\Card;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CardSeeder extends Seeder
{
    public function run(): void
    {
        $csvPath = database_path('data/cards.csv');

        $handle = fopen($csvPath, 'r');

        if ($handle === false) {
            throw new \RuntimeException('cards.csv を開けませんでした。');
        }

        // 1行目（見出し）を読み飛ばす
        fgetcsv($handle);

        while (($data = fgetcsv($handle)) !== false) {

            // 必要な6項目がない行は飛ばす
            if (count($data) < 7) {
                continue;
            }

            [
                $cardNumber,
                $name,
                $type,
                $rarity,
                $brand,
                $category,
                $image
            ] = $data;

            // 同じカード番号があれば更新、
            // なければ新しく登録
            $card = Card::firstOrNew([
                'card_number' => $cardNumber,
            ]);

            $card->name = $name;
            $card->type = $type;
            $card->rarity = $rarity;
            $card->brand = $brand;
            $card->category = $category;
            $card->image = $image !== '' ? $image : null;

            $card->save();


            // 所持情報がまだ無いカードだけ「0枚」で作成
            DB::table('collections')->insertOrIgnore([
                'card_id' => $card->id,
                'quantity' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        fclose($handle);
    }
}