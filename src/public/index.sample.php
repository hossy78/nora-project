<?php
//die('a');
//echo 'a';
use Nora\Nora;

require_once realpath(__DIR__.'/../script/autoload.php');



// Webを起動する
Nora::getService('web')
    // ルーティング設定例1
    //
    // デフォルトモジュールのコントローラを使用する
    //
    // 注(1) 
    // Webコントローラは内部にルーターを保有していて
    // コントローラそのものをルーティング処理後に返却することで
    // ルーティング処理をコントローラへ移譲する
    ->route('/({controller:*}/)*', function ($context) {

        // バリデータを取得
        $v = $context->getService('validator');
            
        // マッチしたパターンを取得
        $matched = $context->getMatched(
            $v->offset('controller', $v->string('index', true))
        );

        return $context->getService('web')->getController(
            $ctrl_name = $matched['controller'],
            $url_mask = '/'.$matched['controller']
        );
    })
    ->start();
