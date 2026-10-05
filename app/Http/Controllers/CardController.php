<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\DrawLog;
use Illuminate\Http\Request;

class CardController extends Controller
{
    public function index(Request $request)
    {
        $query = Card::leftJoin('collections', 'cards.id', '=', 'collections.card_id')
            ->select('cards.*')
            ->selectRaw('COALESCE(collections.quantity, 0) as quantity');

        // タイプ
        if ($request->filled('type')) {
            $query->where('cards.type', $request->type);
        }

        // レアリティ
        if ($request->filled('rarity')) {
            $query->where('cards.rarity', $request->rarity);
        }

        // ブランド
        if ($request->filled('brand')) {
            $query->where('cards.brand', $request->brand);
        }

        // カテゴリ
        if ($request->filled('category')) {
            $query->where('cards.category', $request->category);
        }

        // 所持状況
        if ($request->status === 'owned') {
            $query->where('collections.quantity', '>', 0);
        }

        if ($request->status === 'unowned') {
            $query->where(function ($q) {
                $q->whereNull('collections.quantity')
                ->orWhere('collections.quantity', 0);
            });
        }

        $cards = $query->get();

        // 全カードの種類数
        $totalCards = Card::count();

        // 1枚以上持っているカードの種類数
        $ownedCards = Card::leftJoin('collections', 'cards.id', '=', 'collections.card_id')
            ->where('collections.quantity', '>', 0)
            ->count();

        // 全体コンプリート率
        $completionRate = $totalCards > 0
            ? round(($ownedCards / $totalCards) * 100, 1)
            : 0;

        // タイプ別コンプリート率
        $types = ['キュート', 'クール', 'ポップ', 'セクシー'];

        $typeStats = [];

        foreach ($types as $type) {
            $total = Card::where('type', $type)->count();

            $owned = Card::leftJoin('collections', 'cards.id', '=', 'collections.card_id')
                ->where('cards.type', $type)
                ->where('collections.quantity', '>', 0)
                ->count();

            $rate = $total > 0
                ? round(($owned / $total) * 100, 1)
                : 0;

            $typeStats[$type] = [
                'total' => $total,
                'owned' => $owned,
                'rate' => $rate,
            ];
        }


        // レアリティ別コンプリート率
        $rarities = [
            'プレミアムレア',
            'レア',
            'ノーマル',
            'アンコールレア',
        ];

        $rarityStats = [];

        foreach ($rarities as $rarity) {
            $total = Card::where('rarity', $rarity)->count();

            $owned = Card::leftJoin('collections', 'cards.id', '=', 'collections.card_id')
                ->where('cards.rarity', $rarity)
                ->where('collections.quantity', '>', 0)
                ->count();

            $rate = $total > 0
                ? round(($owned / $total) * 100, 1)
                : 0;

            $rarityStats[$rarity] = [
                'total' => $total,
                'owned' => $owned,
                'rate' => $rate,
            ];
        }

        // 総プレイ回数
        $totalPlays = DrawLog::count();

        // 合計使用金額（1プレイ100円）
        $totalSpent = $totalPlays * 100;


        // レアリティ別の排出割合
        $dropStats = [];

        foreach ($rarities as $rarity) {

            $count = DrawLog::join('cards', 'draw_logs.card_id', '=', 'cards.id')
                ->where('cards.rarity', $rarity)
                ->count();

            $rate = $totalPlays > 0
                ? round(($count / $totalPlays) * 100, 1)
                : 0;

            $dropStats[$rarity] = [
                'count' => $count,
                'rate' => $rate,
            ];
        }

        return view('cards.index', compact(
            'cards',
            'totalCards',
            'ownedCards',
            'completionRate',
            'typeStats',
            'rarityStats',
            'totalPlays',
            'totalSpent',
            'dropStats'
        ));
    }


    public function show(Card $card)
    {
        $card = Card::leftJoin('collections', 'cards.id', '=', 'collections.card_id')
            ->select('cards.*', 'collections.quantity')
            ->where('cards.id', $card->id)
            ->firstOrFail();

        return view('cards.show', compact('card'));
    }

    public function increment(Card $card)
    {
        $collection = \App\Models\Collection::where('card_id', $card->id)->first();

        $collection->increment('quantity');

        \App\Models\DrawLog::create([
            'card_id' => $card->id,
        ]);

        return redirect()->route('cards.index');
    }

    public function decrement(Card $card)
    {
        $collection = \App\Models\Collection::where('card_id', $card->id)->first();

        if ($collection->quantity > 0) {
            $collection->decrement('quantity');
        }

        return redirect()->route('cards.index');
    }
}