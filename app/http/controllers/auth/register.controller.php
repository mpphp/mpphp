<?php

require MPPHP_ROOT . 'app/entities/repositories/user.repository.php';

function showRegistrationFormAction()
{
    return _view('auth/register');
}

function registerAction()
{   
    $user = register_new_user();
}