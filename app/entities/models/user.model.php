<?php

/**
 * Find a user on by mail
 *
 * @param string $email <p> The email address that should match the user's email.
 * </p>
 * @return mixed
 */
function find_user_by_email(string $email)
{
    /*
     * Call the db__read function to lessen the amount of code 
     * we need to write just to make a database call.
     * This function with the argument passed will run a mysql (assuming its a mysql database we are using) 
     * statement that looks like this: "SELECT * FROM users WHERE email = {$email}
     */
    $user = db__read('users', // Read from the 'users' table.
        [ // The outer array houses as many clauses that is required.
            // So a mysql's "WHERE email = {$email}
            // will be writen like so
            ['email', '=', $email] // Simply find the user with a matching email.
        ]
    ); // Asign the result to a $user variable.

    // Return $user
    return $user;
}

/**
 * Create a new user
 *
 * @param string $name <p> The name of the user we want to add to our database
 * </p>
 * @param string $email <p> A unique email address of the user we want to 
 * add to our database </p>
 * @param string $password <p> The users password which should be hashed 
 * before saving it to the database.</p>
 * 
 * @return mixed
 */
function create_new_user(string $name, string $email, string $password)
{
    /*
     * Call the db__create function to lessen the amount of code we need to write 
     * just to make a database call. his function with the argument passed will 
     * run a mysql (assuming its a mysql database we are using) statement that 
     * looks like: this  INSERT INTO users (name, email, password) VALUE('{$name}', '{$email}', '{$password}')
     */
    $user = db__create([ // The first argument passed to the function is an associative 
                         // array that contains a KEY VALUE pair, the KEY being the 
                         // name of the database column where the data should be 
                         // inserted and the VALUE eing the data that should be inserted.
                         // And the second argument is the the table we wish to insert the data into.
        'name' => $name, 
        'email' => $email, 
        'password' => $password
    ], 'users'); // Asign the result to a $user variable.

    // Return $user;
    return $user;
}