<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>
<p align="center"><img src="http://www.phprn.org/static/media/logo.bdd5be28.png"></p>

[Especificação da API](https://gist.github.com/davidcostadev/25f399176ca468ee20131a64ac8798ef)

## Primeiros passos

```bash
$ composer create-project todolist-backend
```

Adicionar as seguntes linhas no phpunit.xml após o `SESSION_DRIVER`

```xml
<server name="DB_CONNECTION" value="sqlite"/>
<server name="DB_DATABASE" value=":memory:"/>
```

## Executando os testes

```bash
php vendor/bin/phpunit
```

## Instalando o projeto

```bash
composer install --prefer-dist
cp .env.example .env
```

```bash
$ vim .env

DB_CONNECTION=sqlite
#DB_HOST=127.0.0.1
#DB_PORT=3306
#DB_DATABASE=laravel
#DB_USERNAME=root
#DB_PASSWORD=

#closevim
```

```bash
touch database/database.sqlite
```

## Executando o projeto
```bash
php artisan serve --port=8080
```

## No docker

Abrir o arquivo `dockerfiles/nginx/vhosts/todolist.conf` e configurar o path da pasta public do projeto