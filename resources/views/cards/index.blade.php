<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>アイカツ！カードコレクション</title>

    <style>
        body {
            margin: 0;
            padding: 30px;
            font-family: sans-serif;
            background: linear-gradient(#fff0f7, #ffffff);
        }

        h1 {
            text-align: center;
            color: #e7549e;
        }

        .subtitle {
            text-align: center;
            color: #888;
            margin-bottom: 30px;
        }

        .card-list {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            gap: 20px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .card {
            background: white;
            border: 3px solid #ffc6df;
            border-radius: 20px;
            padding: 18px;
            box-shadow: 0 5px 15px rgba(231, 84, 158, 0.15);
            transition: 0.3s;

            display: flex;
            flex-direction: column;
        }

        .card.not-owned {
            opacity: 0.35;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .image-area {
            width: 100%;
            aspect-ratio: 2 / 3;
            background: #fff0f7;
            border-radius: 15px;

            display: flex;
            justify-content: center;
            align-items: center;

            color: #e7549e;
            margin-bottom: 15px;
            overflow: hidden;
        }

        .card-number {
            color: #999;
            font-size: 14px;
        }

        .card-name {
            color: #e7549e;
            font-size: 20px;
            font-weight: bold;
            margin: 8px 0;
            text-align: center;
        }

        .info {
            margin: 6px 0;
        }

        .quantity {
            margin-top: auto;
            padding: 10px;
            text-align: center;
            background: #fff0f7;
            border-radius: 10px;
            font-weight: bold;
        }

        .card-link {
        text-decoration: none;
        color: inherit;
        }

        .card {
            display: flex;
            flex-direction: column;
        }

        .quantity {
            margin-top: auto;
            padding: 10px;
            text-align: center;
            background: #fff0f7;
            border-radius: 10px;
            font-weight: bold;
        }

        .plus-button {
            margin-top: 8px;
            width: 36px;
            height: 36px;
            border: none;
            border-radius: 50%;
            background: #ff8fc4;
            color: white;
            font-size: 22px;
            cursor: pointer;
        }

        .plus-button:hover {
            background: #e7549e;
        }

        .button-row {
        display: flex;
        justify-content: center;
        gap: 10px;
        margin-top: 8px;
        }

        .minus-button {
            width: 36px;
            height: 36px;
            border: none;
            border-radius: 50%;
            background: #ffd3e6;
            color: #e7549e;
            font-size: 22px;
            cursor: pointer;
        }

        .minus-button:hover {
            background: #ffbad8;
        }

        .filter-box {
        max-width: 1200px;
        margin: 0 auto 30px;
        padding: 20px;
        background: white;
        border: 2px solid #ffc6df;
        border-radius: 20px;
        box-shadow: 0 5px 15px rgba(231, 84, 158, 0.1);

        display: flex;
        flex-wrap: wrap;
        gap: 15px;
        justify-content: center;
        align-items: end;
        }

        .filter-item {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .filter-item label {
            color: #e7549e;
            font-weight: bold;
        }

        .filter-item select {
            padding: 10px 14px;
            border: 2px solid #ffd3e6;
            border-radius: 12px;
            background: #fff8fb;
        }

        .filter-buttons {
            display: flex;
            gap: 10px;
        }

        .search-button {
            padding: 10px 22px;
            border: none;
            border-radius: 20px;
            background: #ff8fc4;
            color: white;
            font-weight: bold;
            cursor: pointer;
        }

        .search-button:hover {
            background: #e7549e;
        }

        .reset-button {
            padding: 10px 18px;
            border-radius: 20px;
            background: #fff0f7;
            color: #e7549e;
            text-decoration: none;
            font-weight: bold;
        }

        .completion-box {
            max-width: 600px;
            margin: 0 auto 30px;
            padding: 24px;
            text-align: center;
            background: white;
            border: 3px solid #ffc6df;
            border-radius: 25px;
            box-shadow: 0 6px 18px rgba(231, 84, 158, 0.15);
        }

        .completion-title {
            color: #e7549e;
            font-size: 20px;
            font-weight: bold;
        }

        .completion-rate {
            margin-top: 8px;
            color: #ff69ae;
            font-size: 42px;
            font-weight: bold;
        }

        .completion-count {
            margin: 5px 0 15px;
            color: #888;
        }

        .progress {
            width: 100%;
            height: 18px;
            background: #ffe4f0;
            border-radius: 20px;
            overflow: hidden;
        }

        .progress-bar {
            height: 100%;
            background: linear-gradient(
                90deg,
                #ff9acb,
                #ff69ae
            );
            border-radius: 20px;
            transition: width 0.4s ease;
        }

        .stats-wrapper {
            max-width: 1200px;
            margin: 0 auto 30px;

            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        .stats-box {
            padding: 24px;
            background: white;
            border: 3px solid #ffc6df;
            border-radius: 25px;
            box-shadow: 0 6px 18px rgba(231, 84, 158, 0.12);
        }

        .stats-box h2 {
            margin-top: 0;
            text-align: center;
            color: #e7549e;
            font-size: 20px;
        }

        .stat-item {
            margin: 18px 0;
        }

        .stat-header {
            display: flex;
            justify-content: space-between;
            gap: 10px;

            margin-bottom: 7px;

            color: #666;
            font-weight: bold;
        }

        .mini-progress {
            width: 100%;
            height: 12px;

            background: #ffe4f0;
            border-radius: 20px;
            overflow: hidden;
        }

        .mini-progress-bar {
            height: 100%;

            background: linear-gradient(
                90deg,
                #ffb3d6,
                #ff69ae
            );

            border-radius: 20px;
            transition: width 0.4s ease;
        }

        @media (max-width: 800px) {
            .stats-wrapper {
                grid-template-columns: 1fr;
            }

            .stat-header {
                font-size: 14px;
            }
        }

        .play-summary {
            max-width: 700px;
            margin: 0 auto 20px;

            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        .summary-item {
            padding: 22px;
            text-align: center;

            background: white;
            border: 3px solid #ffc6df;
            border-radius: 25px;

            box-shadow: 0 6px 18px rgba(231, 84, 158, 0.12);
        }

        .summary-icon {
            font-size: 30px;
        }

        .summary-label {
            margin-top: 5px;
            color: #888;
            font-weight: bold;
        }

        .summary-value {
            margin-top: 5px;

            color: #e7549e;
            font-size: 28px;
            font-weight: bold;
        }


        .drop-box {
            max-width: 700px;
            margin: 0 auto 30px;
            padding: 24px;

            background: white;
            border: 3px solid #ffc6df;
            border-radius: 25px;

            box-shadow: 0 6px 18px rgba(231, 84, 158, 0.12);
        }

        .drop-box h2 {
            margin-top: 0;
            text-align: center;

            color: #e7549e;
            font-size: 20px;
        }


        @media (max-width: 600px) {
            .play-summary {
                grid-template-columns: 1fr;
            }
        }

        .card-image {
            width: 100%;
            height: 100%;
            object-fit: contain;
            border-radius: 15px;
        }

        .app-shell {
            max-width: 1450px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 250px 1fr;
            gap: 30px;
            align-items: start;
        }

        .sidebar {
            position: sticky;
            top: 30px;

            background: white;
            border: 3px solid #ffc6df;
            border-radius: 25px;
            padding: 22px;

            box-shadow: 0 6px 18px rgba(231, 84, 158, 0.12);
        }

        .sidebar-title {
            text-align: center;
            color: #e7549e;
            font-size: 22px;
            font-weight: bold;
            margin-bottom: 25px;
        }

        .menu-group {
            margin-bottom: 22px;
        }

        .menu-group-title {
            color: #999;
            font-size: 13px;
            font-weight: bold;
            margin-bottom: 8px;
        }

        .menu-button {
            width: 100%;
            border: none;
            background: transparent;

            padding: 11px 13px;
            margin: 3px 0;

            border-radius: 14px;

            text-align: left;
            color: #666;
            font-size: 15px;
            font-weight: bold;

            cursor: pointer;
        }

        .menu-button:hover {
            background: #fff0f7;
            color: #e7549e;
        }

        .menu-button.active {
            background: #ff8fc4;
            color: white;
        }

        .main-content {
            min-width: 0;
        }

        .panel {
            display: none;
        }

        .panel.active {
            display: block;
        }

        .panel-title {
            text-align: center;
            color: #e7549e;
            font-size: 28px;
            margin: 0 0 25px;
        }

        .panel-description {
            text-align: center;
            color: #888;
            margin-bottom: 25px;
        }

        /* 切り替え後は各統計を大きめに表示 */
        .main-content .completion-box,
        .main-content .drop-box {
            max-width: 850px;
        }

        .main-content .stats-wrapper {
            max-width: 900px;
            grid-template-columns: 1fr;
        }

        .main-content .play-summary {
            max-width: 850px;
        }

        @media (max-width: 900px) {
            .app-shell {
                grid-template-columns: 1fr;
            }

            .sidebar {
                position: static;
            }

            .menu-group {
                margin-bottom: 14px;
            }
        }

        .view-switch {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-bottom: 20px;
        }

        .view-button {
            padding: 10px 20px;
            border: 2px solid #ffc6df;
            border-radius: 20px;
            background: white;
            color: #e7549e;
            font-weight: bold;
            cursor: pointer;
        }

        .view-button.active {
            background: #ff8fc4;
            color: white;
        }

        .view-button:hover {
            background: #fff0f7;
        }

        .view-button.active:hover {
            background: #e7549e;
        }


        /* ミニ一覧 */
        .card-list.compact-view {
            grid-template-columns: repeat(
                auto-fill,
                minmax(105px, 1fr)
            );

            gap: 10px;
        }

        .card-list.compact-view .card {
            padding: 7px;
            border-width: 2px;
            border-radius: 12px;
        }

        .card-list.compact-view .image-area {
            margin-bottom: 5px;
            border-radius: 8px;
        }

        .card-list.compact-view .card-image {
            border-radius: 8px;
        }

        .card-list.compact-view .card-name {
            margin: 4px 0;
            font-size: 11px;

            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

       /* ミニ表示の所持枚数 */
        .card-list.compact-view .quantity {
            display: block;
            margin-top: auto;
            padding: 5px 2px;
            font-size: 10px;
            border-radius: 8px;
        }

        /* ミニ表示の＋－ボタンの並び */
        .card-list.compact-view .button-row {
            gap: 5px;
            margin-top: 4px;
        }

        /* ミニ表示の＋ボタン */
        .card-list.compact-view .plus-button {
            width: 27px;
            height: 27px;
            margin-top: 0;
            font-size: 16px;
            padding: 0;
        }

        /* ミニ表示の－ボタン */
        .card-list.compact-view .minus-button {
            width: 27px;
            height: 27px;
            font-size: 16px;
            padding: 0;
        }

    </style>

</head>

<body>

<div class="app-shell">

    {{-- 左側メニュー --}}
    <aside class="sidebar">

        <div class="sidebar-title">
             アイカツ！アンコール 
        </div>

        <div class="menu-group">

            <div class="menu-group-title">
                カード
            </div>

            <button
                type="button"
                class="menu-button active"
                data-panel="cards-panel"
            >
                 カード一覧
            </button>

        </div>


        <div class="menu-group">

            <div class="menu-group-title">
                コンプリート状況
            </div>

            <button
                type="button"
                class="menu-button"
                data-panel="completion-panel"
            >
                 全体コンプリート率
            </button>

            <button
                type="button"
                class="menu-button"
                data-panel="type-panel"
            >
                 タイプ別
            </button>

            <button
                type="button"
                class="menu-button"
                data-panel="rarity-panel"
            >
                 レアリティ別
            </button>

        </div>


        <div class="menu-group">

            <div class="menu-group-title">
                プレイ記録
            </div>

            <button
                type="button"
                class="menu-button"
                data-panel="play-panel"
            >
                 回数・使用金額
            </button>

            <button
                type="button"
                class="menu-button"
                data-panel="drop-panel"
            >
                 自分の排出割合
            </button>

        </div>

    </aside>


    {{-- 右側の表示エリア --}}
    <main class="main-content">


        {{-- カード一覧 --}}
        <section
            id="cards-panel"
            class="panel active"
        >

            <h1 class="panel-title">
                ♡ カードコレクション ♡
            </h1>

            <p class="panel-description">
                カードを選んで所持状況を管理できます
            </p>

<div class="view-switch">

    <button
        type="button"
        class="view-button active"
        id="compact-view-button"
    >
         ミニ一覧
    </button>

    <button
        type="button"
        class="view-button"
        id="normal-view-button"
    >
         大きく見る
    </button>

</div>


            <form
                action="{{ route('cards.index') }}"
                method="GET"
                class="filter-box"
            >

                <div class="filter-item">

                    <label>タイプ</label>

                    <select name="type">

                        <option value="">
                            すべて
                        </option>

                        <option
                            value="キュート"
                            {{ request('type') == 'キュート' ? 'selected' : '' }}
                        >
                            キュート
                        </option>

                        <option
                            value="クール"
                            {{ request('type') == 'クール' ? 'selected' : '' }}
                        >
                            クール
                        </option>

                        <option
                            value="ポップ"
                            {{ request('type') == 'ポップ' ? 'selected' : '' }}
                        >
                            ポップ
                        </option>

                        <option
                            value="セクシー"
                            {{ request('type') == 'セクシー' ? 'selected' : '' }}
                        >
                            セクシー
                        </option>

                    </select>

                </div>

<div class="filter-item">

    <label>カテゴリ</label>

    <select name="category">

        <option value="">
            すべて
        </option>

        <option
            value="トップス"
            {{ request('category') == 'トップス' ? 'selected' : '' }}
        >
            トップス
        </option>

        <option
            value="ボトムス"
            {{ request('category') == 'ボトムス' ? 'selected' : '' }}
        >
            ボトムス
        </option>

        <option
            value="シューズ"
            {{ request('category') == 'シューズ' ? 'selected' : '' }}
        >
            シューズ
        </option>

        <option
            value="トップス&ボトムス"
            {{ request('category') == 'トップス&ボトムス' ? 'selected' : '' }}
        >
            トップス&ボトムス
        </option>

        <option
            value="フルコーデ"
            {{ request('category') == 'フルコーデ' ? 'selected' : '' }}
        >
            フルコーデ
        </option>

        <option
            value="アクセサリー"
            {{ request('category') == 'アクセサリー' ? 'selected' : '' }}
        >
            アクセサリー
        </option>

    </select>

</div>


                <div class="filter-item">

                    <label>レアリティ</label>

                    <select name="rarity">

                        <option value="">
                            すべて
                        </option>

                        <option
                            value="プレミアムレア"
                            {{ request('rarity') == 'プレミアムレア' ? 'selected' : '' }}
                        >
                            プレミアムレア
                        </option>

                        <option
                            value="レア"
                            {{ request('rarity') == 'レア' ? 'selected' : '' }}
                        >
                            レア
                        </option>

                        <option
                            value="ノーマル"
                            {{ request('rarity') == 'ノーマル' ? 'selected' : '' }}
                        >
                            ノーマル
                        </option>

                        <option
                            value="アンコールレア"
                            {{ request('rarity') == 'アンコールレア' ? 'selected' : '' }}
                        >
                            アンコールレア
                        </option>

                    </select>

                </div>


                <div class="filter-item">

                    <label>ブランド</label>

                    <select name="brand">

                        <option value="">
                            すべて
                        </option>

                        <option value="ノーブランド"
                            {{ request('brand') == 'ノーブランド' ? 'selected' : '' }}>
                            ノーブランド
                        </option>

                        <option value="エンジェリーシュガー"
                            {{ request('brand') == 'エンジェリーシュガー' ? 'selected' : '' }}>
                            エンジェリーシュガー
                        </option>

                        <option value="フューチャリングガール"
                            {{ request('brand') == 'フューチャリングガール' ? 'selected' : '' }}>
                            フューチャリングガール
                        </option>

                        <option value="スパイシーアゲハ"
                            {{ request('brand') == 'スパイシーアゲハ' ? 'selected' : '' }}>
                            スパイシーアゲハ
                        </option>

                        <option value="ドリーミークラウン"
                            {{ request('brand') == 'ドリーミークラウン' ? 'selected' : '' }}>
                            ドリーミークラウン
                        </option>

                        <option value="メープルリボン"
                            {{ request('brand') == 'メープルリボン' ? 'selected' : '' }}>
                            メープルリボン
                        </option>

                    </select>

                </div>


                <div class="filter-item">

                    <label>所持状況</label>

                    <select name="status">

                        <option value="">
                            すべて
                        </option>

                        <option
                            value="owned"
                            {{ request('status') == 'owned' ? 'selected' : '' }}
                        >
                            所持済み
                        </option>

                        <option
                            value="unowned"
                            {{ request('status') == 'unowned' ? 'selected' : '' }}
                        >
                            未所持
                        </option>

                    </select>

                </div>


                <div class="filter-buttons">

                    <button
                        type="submit"
                        class="search-button"
                    >
                        検索 
                    </button>

                    <a
                        href="{{ route('cards.index') }}"
                        class="reset-button"
                    >
                        リセット
                    </a>

                </div>

            </form>


            <div class="card-list compact-view" id="card-list">

                @foreach ($cards as $card)

                    <div
                        class="card {{ $card->quantity == 0 ? 'not-owned' : '' }}"
                    >

                        <a
                            href="{{ route('cards.show', $card->id) }}"
                            class="card-link"
                        >

                            <div class="image-area">

                                @if ($card->image)

                                    <img
                                        src="{{ asset('images/cards/' . $card->image) }}"
                                        alt="{{ $card->name }}"
                                        class="card-image"
                                    >

                                @else

                                    <span>NO IMAGE</span>

                                @endif

                            </div>


                            <div class="card-name">
                                {{ $card->name }}
                            </div>

                        </a>


                        <div class="quantity">

                            <div>
                                所持枚数：{{ $card->quantity }}枚
                            </div>


                            <div class="button-row">

                                <form
                                    action="{{ route('cards.decrement', $card->id) }}"
                                    method="POST"
                                >
                                    @csrf

                                    <button
                                        type="submit"
                                        class="minus-button"
                                    >
                                        －
                                    </button>

                                </form>


                                <form
                                    action="{{ route('cards.increment', $card->id) }}"
                                    method="POST"
                                >
                                    @csrf

                                    <button
                                        type="submit"
                                        class="plus-button"
                                    >
                                        ＋
                                    </button>

                                </form>

                            </div>

                        </div>

                    </div>

                @endforeach

            </div>

        </section>


        {{-- 全体コンプリート率 --}}
        <section
            id="completion-panel"
            class="panel"
        >

            <h1 class="panel-title">
                ✨ 全体コンプリート率 ✨
            </h1>

            <div class="completion-box">

                <div class="completion-rate">
                    {{ $completionRate }}%
                </div>

                <div class="completion-count">
                    {{ $ownedCards }} / {{ $totalCards }} 種類
                </div>

                <div class="progress">

                    <div
                        class="progress-bar"
                        style="width: {{ $completionRate }}%;"
                    >
                    </div>

                </div>

            </div>

        </section>


        {{-- タイプ別 --}}
        <section
            id="type-panel"
            class="panel"
        >

            <h1 class="panel-title">
                ♡ タイプ別コンプリート率 ♡
            </h1>

            <div class="stats-wrapper">

                <div class="stats-box">

                    @foreach ($typeStats as $type => $stat)

                        <div class="stat-item">

                            <div class="stat-header">

                                <span>
                                    {{ $type }}
                                </span>

                                <span>
                                    {{ $stat['owned'] }}
                                    /
                                    {{ $stat['total'] }}種類
                                    （{{ $stat['rate'] }}%）
                                </span>

                            </div>

                            <div class="mini-progress">

                                <div
                                    class="mini-progress-bar"
                                    style="width: {{ $stat['rate'] }}%;"
                                >
                                </div>

                            </div>

                        </div>

                    @endforeach

                </div>

            </div>

        </section>


        {{-- レアリティ別 --}}
        <section
            id="rarity-panel"
            class="panel"
        >

            <h1 class="panel-title">
                ✦ レアリティ別コンプリート率 ✦
            </h1>

            <div class="stats-wrapper">

                <div class="stats-box">

                    @foreach ($rarityStats as $rarity => $stat)

                        <div class="stat-item">

                            <div class="stat-header">

                                <span>
                                    {{ $rarity }}
                                </span>

                                <span>
                                    {{ $stat['owned'] }}
                                    /
                                    {{ $stat['total'] }}種類
                                    （{{ $stat['rate'] }}%）
                                </span>

                            </div>

                            <div class="mini-progress">

                                <div
                                    class="mini-progress-bar"
                                    style="width: {{ $stat['rate'] }}%;"
                                >
                                </div>

                            </div>

                        </div>

                    @endforeach

                </div>

            </div>

        </section>


        {{-- 総プレイ回数・使用金額 --}}
        <section
            id="play-panel"
            class="panel"
        >

            <h1 class="panel-title">
                🎮 プレイ記録 🎮
            </h1>

            <div class="play-summary">

                <div class="summary-item">

                    <div class="summary-icon">
                        🎮
                    </div>

                    <div class="summary-label">
                        総プレイ回数
                    </div>

                    <div class="summary-value">
                        {{ $totalPlays }}回
                    </div>

                </div>


                <div class="summary-item">

                    <div class="summary-icon">
                        💗
                    </div>

                    <div class="summary-label">
                        合計使用金額
                    </div>

                    <div class="summary-value">
                        {{ number_format($totalSpent) }}円
                    </div>

                </div>

            </div>

        </section>


        {{-- 排出割合 --}}
        <section
            id="drop-panel"
            class="panel"
        >

            <h1 class="panel-title">
                ✦ 自分の排出割合 ✦
            </h1>

            <div class="drop-box">

                @foreach ($dropStats as $rarity => $stat)

                    <div class="stat-item">

                        <div class="stat-header">

                            <span>
                                {{ $rarity }}
                            </span>

                            <span>
                                {{ $stat['count'] }}枚
                                （{{ $stat['rate'] }}%）
                            </span>

                        </div>

                        <div class="mini-progress">

                            <div
                                class="mini-progress-bar"
                                style="width: {{ $stat['rate'] }}%;"
                            >
                            </div>

                        </div>

                    </div>

                @endforeach

            </div>

        </section>

    </main>

</div>


<script>
    const menuButtons = document.querySelectorAll('.menu-button');
    const panels = document.querySelectorAll('.panel');

    menuButtons.forEach((button) => {

        button.addEventListener('click', () => {

            const targetPanel = button.dataset.panel;

            menuButtons.forEach((item) => {
                item.classList.remove('active');
            });

            panels.forEach((panel) => {
                panel.classList.remove('active');
            });

            button.classList.add('active');

            document
                .getElementById(targetPanel)
                .classList.add('active');
        });

    });

    const cardList = document.getElementById('card-list');

        const compactViewButton =
            document.getElementById('compact-view-button');

        const normalViewButton =
            document.getElementById('normal-view-button');


        compactViewButton.addEventListener('click', () => {

            cardList.classList.add('compact-view');

            compactViewButton.classList.add('active');
            normalViewButton.classList.remove('active');

        });


        normalViewButton.addEventListener('click', () => {

            cardList.classList.remove('compact-view');

            normalViewButton.classList.add('active');
            compactViewButton.classList.remove('active');

        });
</script>

</body>
</html>