<?php
#
# Noraの基本の設定ファイル
#

# 第１改装はENV
#
# * all はすべてのENVで読み込まれる
#
return [
    'all' => [
        # ソースのルートディレクトリ
        'root' => realpath(__DIR__.'/..'),
        # デフォルトの言語
        'lang' => 'ja',
        # インターナルエンコーディング
        'encoding' => 'utf-8',
        # タイムゾーン
        'timezone' => 'Asia/Tokyo',
        # クラスマップ(オートローダに渡す設定)
        'map' => [
            // 'class' => [
            //     'App' => realpath(__DIR__.'/../../lib/app')
            // ]
        ]
    ],
    'devel' => [
        # 開発中はPHPのタイムアウトを1秒に設定する
        'time_limit' => 1
    ]
];
