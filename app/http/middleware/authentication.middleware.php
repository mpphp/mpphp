<?php

// Check if the user is logged in
// Redirect to the login page if not logged in
_redirect_if(! _auth_check(), '/login', [
    'errors' => ['Please login to continue.']
]);