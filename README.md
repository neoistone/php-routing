Neoistone Routing - request router for Goframework PHP
=======================================

This library provides a Simple Routing system
Install
-------

To install with composer:

```
composer require neoistone/php-routing
```

Requires PHP 5.4 or newer.

Usage
-----

Here's a Get example:

```
<?php
  use neoistone\http\Request;
  
  include __DIR__.'/vendor/autoload.php';
 
  Request::get('/', function(){
     return 'hello World';
  });
  
  Request::run('/');
?>
```

Here's a Post example:
```
<?php
  use neoistone\http\Request;
  
  include __DIR__.'/vendor/autoload.php';

  Request::post('/', function(){
     return null;
  });
  
  Request::run('/');
?>
```

Here's a Regex example:
```
<?php
  use neoistone\http\Request;
  
  include __DIR__.'/vendor/autoload.php';

  Request::get('/(.*)', function($s1){
     return $s1;
  }); 
  
  Request::run('/');
?>
```


Accept only numbers as parameter. Other characters will result in a 404 error
```
<?php
  use neoistone\http\Request;
  
  include __DIR__.'/vendor/autoload.php';

  Request::get('/foo/([0-9]*)/bar',function($var1){
      return $var1;
  });
  
  Request::run('/');
?>
```

All copyright reserved by [Neoistone Technologies][neoistone]

[neoistone]: https://neoistone.com
