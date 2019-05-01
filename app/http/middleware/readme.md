# Middleware

## Introduction

Middleware provides a convenient mechanism for filtering HTTP requests entering your application. For example, MpPHP includes a middleware that verifies the user of your application is authenticated. If the user is not authenticated, the middleware will redirect the user to the login screen. However, if the user is authenticated, the middleware will allow the request to proceed further into the application.

Additional middleware can be written to perform a variety of tasks besides authentication. A CORS middleware might be responsible for adding the proper headers to all responses leaving your application. A logging middleware might log all incoming requests to your application.

There are several middleware included in the MpPHP framework, including middleware for authentication and Session and Database. All the middleware are located in the app/Http/Middleware directory.

## Let's examine MpPHP Middleware

### startSession

The first is the `startSession` middleware which boots up the session for the application.

```
<?php

// app/http/middleware/startSession.middleware.php

global $app;

// Start the session.
_session_start(
    $app['configs']['app']['session']['cookie'],
    $app['configs']['app']['session']['lifetime'],
    $app['configs']['app']['session']['path'],
    $app['configs']['app']['session']['domain'],
    $app['configs']['app']['session']['secure'],
    $app['configs']['app']['session']['http_only']
);
```

The `_session_start()` is a basic example on how to securly start a session.

### clearFlashData

The clearFlashData handles any information that is set in the session and is expected to only live for not more than one request cycle, an example of this would be a flash message or an old form input which are all stored in a `flash key` in our session.

So our middleware only needs to just set is to null as you would see in the `clearFlashData.middleware.php` file:

```
<?php

// app/http/middleware/clearFlashData.middleware.php

$_SESSION['flash'] = null;
```

### connectDatabase

At this point am sure you get the idea, a middleware as far as MpPHP is concerned does not limit you to any code pattern but with an exception of `printing`, `echoing` or `dumping` in it, except your doing this specifically for debug purposes.

The `connectDatabase` middleware opens a database connection if we have the need to make a database call in the controller being directed to.

```
<?php

// app/http/middleware/connectDatabase.middleware.php

db__open_connection();
```

### disconnectDatabase

As you would have guessed this closes the connection opened by `conneectDatabase`, and because this is expected to be done after we must have finished making use of our database resources, it should only be called after the request and not before.

```
<?php

// app/http/middleware/disconnectDatabase.middleware.php

db__close_connection();
```

### authentication

With the help of a few helper functions we are able to perform a quick authentication check in this middleware, redirecting non authenticated users to the `/login` page and letting them proceed if they are indeed logged in.

```
<?php

// app/http/middleware/authentication.middleware.php

// Check if the user is logged in
// Redirect to the login page if not logged in
_redirect_if(! _auth_check(), '/login', [
    'errors' => ['Please login to continue.']
]);
```

You can see how 10 to 15 lines of code is reduced to just 3? That is the beauty of PHP Frameworks. You can check out the `mpphp/support` library for more helper functions.

### guest

The guest middleware is the opposite of the authentication middleware. This is particularly useful when a logged in user tries to access the login page.

```
<?php

// app/http/middleware/guest.middleware.php

// Check if the user is a guest
// Redirect to the home page if logged in
_redirect_if(_auth_check(), '/home');
```

## Registering Middleware

### Globally registering middleware

There are time when you would want a middleware available in every request made by our users, an example of such is the `startSession` middleware and to do this we would need to register it with our `app/http/kernel.php` file:

```
<?php

return [
    'web' => [
        'beforeMiddleware' => [
            __DIR__ . '/middleware/startSession.middleware.php'
        ],

        'afterMiddleware' => [
            __DIR__ . '/middleware/clearFlashData.middleware.php'
        ]
    ]
];
```

If you have seen the `routes` quick doc, the `web` keyword would be familiar to you. The middleware applied inside of the `web` array would only apply to the routes registered under the `web` group.

Inside of the `web` array value are two important keys namely:

* beforeMiddleware
* afterMiddleware

Middleware registered with the `beforeMiddleware` will run before the `controller` hit. And the middleware registered with `afterMiddleware` will run right after the controller has been processed.

### Locally registering middleware

In some cases you just want to quickly use a middleware for specific route and not the entire application, take for example the `connectDatabase` middleware, this would be dead weight to carry on every request that does not need it (bear in mind that your gradually been introduced to the concept of `Separation of Concerns`).
 To achieve this we simply add it to our route as shown in the example below which was taken from our `web.php` file:

 ```
// Route "/login"
'login' => [
    ...
    
    'middleware'    => [
        'before' => [
            MPPHP_ROOT . 'app/http/middleware/guest.middleware.php',
            MPPHP_ROOT . 'app/http/middleware/connectDatabase.middleware.php'
        ],

        'after' => [
            MPPHP_ROOT . 'app/http/middleware/disconnectDatabase.middleware.php'
        ]
    ]
]
 ```

 Just like the `Global registration` you can see the `before` and `after` keywords and how they are being applied, the above example shows how we connect and disconnect from the database without a fuss and not have it available on ever database request.

## Contributions

Please feel free to edit this document and submit a pull request describing the changes you've made. Your contributions would be greately appreciated.