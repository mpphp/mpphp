<?php

require MPPHP_ROOT . 'app/entities/repositories/user.repository.php';

/**
 * Show the form registering users.
 *
 * @return void
 */
function showRegistrationFormAction()
{
    _view('auth/register');
}

/**
 * Register a new.
 *
 * @return void
 */
function registerAction()
{   
    register_new_user();
}