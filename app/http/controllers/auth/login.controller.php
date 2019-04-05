<?php

// We include our user model to have our simplified database
// calls available to us.
require MPPHP_ROOT . 'app/entities/repositories/user.repository.php';

/**
 * Show the application's login form.
 *
 * @return mixed
 */
function showLoginFormAction()
{
    return __view('auth/login');
}

/**
 * Log user into our application
 *
 * @return mixed
 */
function loginAction()
{
    authenticate_user();
}

/**
 * Log users out of our application
*
 * @return mixed
 */
function logoutAction()
{
    logout_user();
}