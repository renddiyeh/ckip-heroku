# ckip-heroku

A simple json api service to connect with CKIP service.

This app makes use of the [Silex](http://silex.sensiolabs.org/) web framework, which can easily be deployed to Heroku.

## Setting

Must set CKIP client variables in `.env` before start.

```
CKIP_SERVER
CKIP_PORT
CKIP_USERNAME
CKIP_PASSWORD
```

You can copy from `.env.example`

## Usage

First start server locally.

```
php -S localhost:8000 -t web/
```

Then simply send GET request to `/` route with `?q=` parameter.

Example:

```
http://localhost:8000?q=獨立音樂需要大家一起來推廣，歡迎加入我們的行列！
```

## Deploying

```
heroku create
git push heroku master
heroku open
```

Remember to manually set Heroku ENV use

```
heroku config:set CKIP_SERVER=ServerAddr CKIP_PORT=PortNumer ...
```

[![Deploy to Heroku](https://www.herokucdn.com/deploy/button.png)](https://heroku.com/deploy)
