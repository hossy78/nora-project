# Noraサンプルプロジェクト

## インストール

```sh
make
make env dev # 環境名を入れる
make install
```

## ブランチの構成
master:
基本的に最低限のファイルしか置かない

website:
ウェブサイトサンプル


## テスト方法

phpunit のインストール

$make phpunit

cd ./tests
phpunit case/SampleTest.php
