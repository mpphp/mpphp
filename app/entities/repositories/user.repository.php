<?php

// We include our user model to have our simplified database
// calls available to us.
require MPPHP_ROOT . 'app/entities/models/user.model.php';

/**
 * Authenticate a user.
 *
 * @return void
 */
function authenticate_user(): void
{
    // Validate the data submitted by our user
    $result = _validation([
        'email' => 'required|string',
        'password' => 'required|string'
    ]);

    // Get the validated data from the result.
    $validated = $result['validated'];

    // Find the user on our database using the email they provided.
    $user = find_user_by_email($validated['email']);

    // If a user is not found we should redirect back with an error message
    _redirect_back_else($user, [
            'errors' => ['Please provide a valid email and password']
        ]
    );

    // Compare the password of the user returned from the data base 
    // with the password submitted by the user trying to login
    $compare_password = bcrypt_hasher_check($validated['password'], $user['password']);

    // If they dont match, redirect back with an error message.
    // In cases like this, it is a good idea not to let the user
    // know what exactly went wrong in case the are tyring to guess 
    // their way in so we use a message that does not really specify what the problem is.
    // As you can see the error message returned if the passwords dont
    // match is the same error message sent back if a user with the
    // provided email does not exist.
    _redirect_back_else($compare_password, [
            'errors' => ['Please provide a valid email and password']
        ]
    );

    // If all goes fine and well then we should log the user in.
    login_user($user);
}

/**
 * This function logs the user into our application
 *
 * @param array $user
 * @param string $redirect_to
 * @return void
 */
function login_user(array $user, string $redirect_to = '/home'): void
{
    $_SESSION['authenticated']['user'] = $user;

    _redirect($redirect_to, [
        'status' => 'You have logged in successfully.'
    ]);
}

/**
 * Log a user out of our application.
 *
 * @return void
 */
function logout_user(): void
{
    // Unset all session values 
    $_SESSION = array();
    
    // get session parameters 
    $params = session_get_cookie_params();
    
    // Delete the actual cookie. 
    setcookie(session_name(),'', time() - 42000, $params["path"], $params["domain"], 
        $params["secure"], $params["httponly"]);
    
    // Destroy session 
    session_destroy();

    // Redirect back to the index page.
    _redirect('/');
}

/**
 * Register a new user.
 *
 * @return mixed
 */
function register_new_user()
{
    // Validate the data submitted by our user
    $result = _validation([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|unique:users',
        'password' => 'required|string|equals:password_confirmation'
    ]);

    // Get the validated data.
    $validated = $result['validated'];

    // Create the user
    $user = create_new_user(
        $validated['name'],
        $validated['email'],
        bcrypt_hasher_make($validated['password']) // Warning! Always hash your users password.
    );

    // Redirect back if the user was not created.
    _redirect_back_if($user === false, ['errors' => [
        'Unable to register user at the moment.'
    ]]);

    // log the user in
    login_user($user);
}

