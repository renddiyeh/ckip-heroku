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

## Develop

```
php -S localhost:8000 -t web/
```

## Deploying

Remember to manually set Heroku ENV use

```
heroku config:set CKIP_SERVER=ServerAddr CKIP_PORT=PortNumer ...
```

[![Deploy to Heroku](https://www.herokucdn.com/deploy/button.png)](https://heroku.com/deploy)
