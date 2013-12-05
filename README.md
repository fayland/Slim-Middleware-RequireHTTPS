Slim-Middleware-RequireHTTPS
============================

Slim middleware: redirect http to https

```
$app = new \Slim\Slim();
$app->add(new \Slim\Middleware\RequireHTTPS());
```