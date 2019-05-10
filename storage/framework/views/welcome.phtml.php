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
                <a href="<?php echo _e('/home') ?>">Home</a>

                <?php if (_auth_check()) { ?>
                    <a href="<?php echo _e('/logout') ?>"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                        Logout
                    </a>

                    <form id="logout-form" action="<?php echo _e('/logout') ?>" method="POST" style="display: none;">
                    </form>
                <?php } ?>

                <?php if (! _auth_check()) { ?>
                    <a href="<?php echo _e('/login') ?>">Login</a>

                    <a href="<?php echo _e('/register') ?>">Register</a>
                <?php } ?>
            </div>

            <div class="content">
                <?php  $data = [1,2,3,4,5,6]  ?>

                <?php 
            $loop = [
                'index'       => 0, // The index of the current loop iteration (starts at 0).
                'iteration'   => 1, // The current loop iteration (starts at 1).
                'even'        => false, // Whether this is an even iteration through the loop.
                'odd'         => false  // Whether this is an odd iteration through the loop.
            ];

            foreach ($data as $number) : 
                if($loop["index"] % 2 == 0){
                    $loop["even"] = true;
                    $loop["odd"] = false; 
                } else{ 
                    $loop["even"] = false;
                    $loop["odd"] = true;  
                }?>
                    <?php if (is_bool($number === 3) && $number === 3) continue; ?>
                    <?php echo _e($number) ?>
                <?php 
                $loop['index'] += 1;
                $loop['iteration'] += 1;
            endforeach;
        ?>

                <div class="title m-b-md">
                    MPPHP
                </div>

                <div class="links">
                    <a href="https://mpphp.github.io/mpphp/">Docs</a>
                    <a href="#">News</a>
                    <a href="#">Blog</a>
                    <a href="https://mpphp.github.io/mpphp">GitHub</a>
                </div>
            </div>
        </div>

    </body>

</html>