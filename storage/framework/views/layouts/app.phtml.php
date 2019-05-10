<!doctype html>
    <html class="no-js" lang="">

    <head>
        <meta charset="utf-8">
        <title><?php echo _e($app['configs']['app']['name']) ?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="manifest" href="site.webmanifest">
        <link rel="apple-touch-icon" href="icon.png">
        <!-- Place favicon.ico in the root directory -->

        <!-- Scripts -->
        <script src="<?php echo _asset('js/app.js') ?>" defer></script>


        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <link rel="stylesheet" href="<?php echo _asset('css/app.css') ?>">

    </head>

    <body>
        <!--[if IE]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please
            <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="<?php echo _e('/') ?>">
                    <?php echo _e($app['configs']['app']['name']) ?>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo _e('/home') ?>">Home</a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <?php if (_auth_check()) { ?>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <?php echo _e( _auth_user()['name']) ?> <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="<?php echo _e('/logout') ?>"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="<?php echo _e('/logout') ?>" method="POST" style="display: none;">
                                       
                                    </form>
                                </div>
                            </li>
                        <?php } ?>

                        <?php if (! _auth_check()) { ?>
                            <!-- Authentication Links -->
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo _e('/login') ?>">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo _e('/register') ?>">Register</a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </nav>

        <?php if ($errors) { ?>
            <div class="alert alert-danger" role="alert">
                <div class="container">
                    <ol>
                        <?php  foreach($errors as $error) :  ?>
                            <li><?php echo _e($error) ?></li>
                        <?php  endforeach;  ?>
                    </ol>
                </div>
            </div>
        <?php } ?>

        <main class="py-4">
            <?php call_user_func('content', $vars); ?>
        </main>

    </body>

</html>