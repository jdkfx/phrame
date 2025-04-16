# jdkfx/phrame

自作MVCフレームワーク

## 環境について

### Docker
Docker version 28.0.1

### PHP
PHP 8.4.5 (cli)

## 環境構築

### リポジトリをクローン
```
$ git clone
```

### .env の複製
```
$ cp .env.sample .env
```

`.env`に以下のような値を設定

```
DATABASE_HOST=mysql
DATABASE_NAME=phrame
USERNAME=user
PASSWORD=password
ROOT_PASSWORD=password
```

### makeコマンドでコンテナの立ち上げ、停止
```
$ make build
$ make up
$ make down
```

### Composerでライブラリをインストール
```
$ make composer
```

### データベースの初期化、削除
```
$ make migrate
$ make rollback
```