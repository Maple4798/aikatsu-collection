<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $card->name }}</title>

    <style>
        body {
            margin: 0;
            padding: 30px;
            font-family: sans-serif;
            background: linear-gradient(#fff0f7, #ffffff);
        }

        .detail {
            max-width: 700px;
            margin: 0 auto;
            background: white;
            border: 3px solid #ffc6df;
            border-radius: 30px;
            padding: 35px;
            box-shadow: 0 8px 25px rgba(231, 84, 158, 0.18);
        }

        .back {
            color: #e7549e;
            text-decoration: none;
            font-weight: bold;
        }

        .image-area {
            width: 100%;
            max-width: 420px;
            aspect-ratio: 2 / 3;

            margin: 25px auto;

            background: #fff0f7;
            border-radius: 25px;

            display: flex;
            justify-content: center;
            align-items: center;

            color: #e7549e;
            font-size: 22px;
            overflow: hidden;
        }

        h1 {
            text-align: center;
            color: #e7549e;
        }

        .card-number {
            text-align: center;
            color: #999;
            margin-bottom: 25px;
        }

        .info {
            background: #fff6fa;
            padding: 16px;
            border-radius: 15px;
            margin: 10px 0;
        }

        .quantity {
            margin-top: 25px;
            text-align: center;
            font-size: 20px;
            font-weight: bold;
            color: #e7549e;
        }

        .detail-card-image {
            width: 100%;
            height: 100%;
            object-fit: contain;
            border-radius: 25px;
        }
    </style>
</head>

<body>

<div class="detail">

    <a href="{{ route('cards.index') }}" class="back">
        ← カード一覧に戻る
    </a>

<div class="image-area">

    @if ($card->image)

        <img
            src="{{ asset('images/cards/' . $card->image) }}"
            alt="{{ $card->name }}"
            class="detail-card-image"
        >

    @else

        <span>NO IMAGE</span>

    @endif

</div>

    <h1>{{ $card->name }}</h1>

    <div class="card-number">
        {{ $card->card_number }}
    </div>

    <div class="info">
        ♡ タイプ：{{ $card->type }}
    </div>

    <div class="info">
        ♢ レアリティ：{{ $card->rarity }}
    </div>

    <div class="info">
        ♤ ブランド：{{ $card->brand }}
    </div>

    <div class="info">
        ♧ カテゴリ：{{ $card->category }}
    </div>

    <div class="quantity">
        所持枚数：{{ $card->quantity }}枚
    </div>

</div>

</body>
</html>