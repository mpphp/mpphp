<?php

// We require our user repository to have our user logic available to us.
require MPPHP_ROOT . 'app/entities/repositories/user.repository.php';

/**
 * Show the application's login form.
 *
 * @return mixed
 */
function showLoginFormAction()
{
    _view('auth/login.phtml');
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