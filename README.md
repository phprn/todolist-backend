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

