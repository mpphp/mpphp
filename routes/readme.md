# Routes

## Introduction

MpPHP handles routing a little differently from other conventional procedural routing giving it the ability to handle pretty urls similar to a real world application.
In this documentation we would be learning how to define our routes pointing each request to controller or simply return a view.

### Conventions

Before we start learning about routing here is a quick note on some conventions and how MpPHP would read a `url`. Take the following as an example:

```
// Url
http://localhost:4000/home/welcome/anitche/chisom

```

#### Controllers

The first segment of the above `url` which is `"/home"` will be used to search for a controller file named `"home.controller.php"`. The `".controller.php"` will be prefixed automatically by MpPHP before searching for the file.

#### Actions

On the ssecond segment which is `welcome` will be used to call a function (often refered to as actions) within the controller file, so the router would expect to find a function within the controller file that looks like the below example:

```
// Function

welcomeAction()
{
    //
}
```

Like the controller, `"Action"` will be prefixed automatically before calling the function and if the `index` key is not set then the router will default to look for a `indexAction` function (action) so if you're going to leave it out it is important for your controller to have an `indexAction` defined.

With the above examples it is clear that MpPHP has a convention or should I say ground rules for creating a controller file and function so try and abide by them at all time.


#### Arguments

Next is the third segment of the `url` which is `/anitche`, this would be passed into the controller function or action as the first argument like so:

```
// Function

welcomeAction($lastname)
{
    print "Hello {$lastname}!";
}

// Output in browser.
Hello anitche!
```

And the second segment as you may have guessed would be passed as the second argument in out controller function like so:

```
// Function

welcomeAction($lastname, $firstname)
{
    print "Hello {$lastname} {firstname}!";
}

// Output in browser.
Hello anitche chisom!
```

To sum it up, every other segment added after the second segment would be treated as an argument to be passed to the controller function (action).

## Route File

The `routes/web.php` file is where all the routes are registered, without doing so the MpPHP router will send any unknown request to a `404 page` exactly how a real world application would.

Let's start from an empty route file and build up to our current routes/web.php file content explaining each step for better understanding.

~~~
<?php

// routes/web.php

return [
    'web' => [
        // ...routes go here.
    ];
];
~~~

The `routes/web.php` returns an associative array with a `web` key pointing to an empty array. The `web` key is used to group the routes should in case we want to route them differently.

## Let's define our landing page route

In a restaurant the kitchen would be where we prepare food for our customers. But if all they want is a bottle of Coke, there is totally no need to go to the kitchen now is there? We can simply just get a bottle of Coke out of the fridge that is right in front of them.

The same could be said about an MpPHP, the controller is the kitchen of our application and if all a user wants is to view a static page that requires no logic, we can go ahead and just give that to them without hitting the controller.

To display a simple view that does not require any back end process we can skip the controller and just go straight to calling our view file like so:


```
// routes/web.php

return [
    'web' => [
        'index' => 'welcome',
    ];
];
```

It's important to note that the string `'welcome'` passed as a value to the index key would be translated to `welcome.phtml' so it is important to have it available in our view folder.

## Let's define our `/404` route

Now we know how to return a simple page let's talk about `404`, when you try to access a rout that is not registered the router will try to serve a `404 page` which mean the page was not found and like every other route in our application we have to define the route fo our 404 page:

```
// routes/web.php

return [
    'web' => [
        ...

        'page-not-found' => '404'
    ];
];
```

Since we are not running any backend logic for our 404 page we can simply return a static page to let the user know we could not find what they are looking for.

## Let's define our `/home` route

The MpPHP Router behaves differently depending on what the route key points to. If it points to a string (like we have seen previously) then the router will try to bypass the controller and serve the view template directly and when it's an array it will navigate through the application with the help of some specific keys namely:

* index
* controller
* middleware

### Index

To explicitly tell the router which function to call within the controller file we set the `index key` within the key value array of the route we registered to point to the function we wish to call.

```
// routes/web.php

return [
    'web' => [
        ...

        'home' => [
            'index' => 'index',
        ],
    ];
];
```


A `/home` route in the case of MpPHP is where we send our users after they login into our application and to define it we have to use a method a bit more complex than the ones we have seen previously.

```
// routes/web.php

return [
    'web' => [
        ...

        'home' => [
            'controller'    => 'home',
            'middleware'    => [
                'before' => [
                    MPPHP_ROOT . 'app/http/middleware/authentication.middleware.php'
                ]
            ]
        ],
    ];
];
```

In the above example we leave out the `index key` because we have an `indexAction` defined in our `home.controller.php` file but specify which controller we would like to use, and because this is a route reserved only for our logged in users we would apply a middleware which basically redirects a user who tries to gain access to this rout without login in. For more about Middleware a quick doc can be found in the `app/http/middleware` directory.

## Let's define our `/register` and `/ login` route

This is the most interesting of all the routing concepts mentioned so far and it's because it uses a bit of trickery to mimic a single page form processing.

```
// routes/web.php

return [
    'web' => [
        ...

        // Route "/register"
        'register' => [
            'controller' => 'auth/register',
            'action' => _request_action([
                'GET' => 'showRegistrationForm',
                'POST' => 'register'
            ]),

            'middleware'    => [
                'before' => [
                    MPPHP_ROOT . 'app/http/middleware/guest.middleware.php',
                    MPPHP_ROOT . 'app/http/middleware/connectDatabase.middleware.php'
                ],

                'after' => [
                    MPPHP_ROOT . 'app/http/middleware/disconnectDatabase.middleware.php'
                ]
            ]
        ],
    ];

    // Route "/login"
        'login' => [
            'controller' => 'auth/login',
            'action' => _request_action([
                'GET' => 'showLoginForm',
                'POST' => 'login'
            ]),
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
];
```
The first thing you will notice that is a bit different is the path to our controller, this should come as no surprise to you because our register controller resides in an `auth` sub-directory within the controller directory.

Next is the action which does not return a string but a function call with an array as it's argument.

```
...

    'action' => _request_action([
        'GET' => 'showRegistrationForm',
        'POST' => 'register'
    ]),
```

If your fairly new to PHP, I am guessing the form codes you write would look like this:

```
<?php
    if ($_POST['submit']) {
        // Do some stuff like validation
        // Do some other stuff with the input provided by the user
        // Probably redirect to another page
        // Or print some success message.
    }
?>

<form action="register.php" method="post">
    // Some inputs
</form>
```
And i preferred doing it this way back when i was learning because it was easier to print errors and retain old form input. Well in MpPHP old inputs and form errors are painless to work with and would be talked about more on another documentation.

But in MpPHP we would display our form in one controller action and process the form in another without changing the url, and that is where the `_request_action()` function comes in. It takes an array as its first argument and in that array is a `GET key` pointing to the function (action) that should be called when the user makes a `get` request to the `register` controller and a `POST` pointing to the function (action) that should be called when a user makes a `post` request to the `register` controller.

## Contributions

Please feel free to edit this document and submit a pull request describing the changes you've made. Your contributions would be greately appreciated.