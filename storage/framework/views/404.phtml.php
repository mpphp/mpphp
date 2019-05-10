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

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html,
            body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links>a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>

    <body>
        <!--[if IE]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

        <!-- Add your site or application content here -->
        <div class="flex-center position-ref full-height">

            <div class="top-right links">
                <a href="<?php echo _e(_route('/home')) ?>">Home</a>

                <?php if (_auth_check()) { ?>
                    <a href="<?php echo _e(_route('/logout')) ?>"
                       onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                        Logout
                    </a>

                    <form id="logout-form" action="<?php echo _e(_route('/logout')) ?>" method="POST" style="display: none;">
                    </form>
                <?php } ?>

                <?php if (! _auth_check()) { ?>
                    <a href="<?php echo _e(_route('/login')) ?>">Login</a>

                    <a href="<?php echo _e(_route('/register')) ?>">Register</a>
                <?php } ?>
            </div>
            
            <div class="content">
                <div class="title m-b-md">
                    Page Not Found
                </div>
                <p>Sorry, but the page you were trying to view does not exist.</p>
            </div>
        </div>

    </body>

</html>