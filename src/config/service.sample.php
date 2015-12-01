<?php
# サービスの設定ファイル
#
# Confg上ではservice.*
#
#
return [
    'all' => [
        # ロガーの設定
        'logger' => [
            # 使用クラス
            'class' => 'Nora\System\Logging\Logger\Logger',
            # 使用メソッド
            'method' => 'build',
            # コンフィグ
            # build(array)
            'config' => [
                'name' => 'NoraTest',
                'withPHPError' => true,
                'handlers' => [
                    [
                        'type'  => 'stream',
                        'level' => 'info',
                        'path' => __DIR__.'/../var/nora-%(user)-%(time|Y-m-d).log'
                    ]
                ]
            ]
        ],
        # クッキーの設定
        'cookie' => [
            'class' => 'Nora\Network\HTTP\Cookie',
            # パラメタ
            # __construct(0, '', '', false, false)
            'params' => [
                'expire' => 0,
                'path' => '',
                'domain' => '',
                'secure' => false,
                'httponly' => false
            ]
        ],
        # セッション保存用のストレージ作成
        'session_kvs' => [
            'class' => 'Nora\Data\KeyValueStore\FileStore',
            'params' => [
                'dir' => '/tmp/nora-session'
            ]
        ],
        # セッションサービスを作成
        'session' => [
            'class' => 'Nora\Network\HTTP\Session\Session',
            # @をつけるとサービスが代入される
            'params' => [
                'cookie' => '@cookie',
                'storage' => '@session_kvs',
                'key' => 'nora-session'
            ]
        ],
        # Webフレームワーク
        'web' => [
            'class' => 'Nora\System\Web\Web',
            'params' => [
                '@context'
            ]
        ]
    ],
    'devel' => [
        # 開発レベルの時はDebugConsoleをつける
        'debugConsole' => [
            'class' => 'Nora\Develop\Debug\Console'
        ],
        # 開発レベルの時はログレベルを変えるなど
        'logger' => [
            'class' => 'Nora\System\Logging\Logger\Logger',
            'method' => 'build',
            'autoStart' => true, # 自動起動
            'config' => [
                'name' => 'NoraTest',
                'withPHPError' => true,
                'asMainLogger' => true,
                'handlers' => [
                    [
                        'type'  => 'stream',
                        'path' => '/tmp/hoge',
                        'level' => 'debug',
                    ]
                ]
            ]
        ]
    ]
];
