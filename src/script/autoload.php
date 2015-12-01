<?php
use Nora\Nora;

# NoraのAutoLoaderを呼び出す
require_once realpath(__DIR__.'/../../lib/nora/script/autoload.php');

# 環境名
$env = 'devel';
# ルートディレクトリ
$root = __DIR__.'/..';
# 起動オプション
$bootConfig = [
    # コンフィグキャッシュ置き場
    'cache' => 'tmp/cache',
    # コンフィグ置き場のディレクトリ名
    'config' => 'config',
    # デバッグフラグ
    'debug' => true
];

# 起動
Nora::Configure($root, $env, $bootConfig);
