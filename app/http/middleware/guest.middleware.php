<?php

// Check if the user is a guest
// Redirect to the home page if logged in
_redirect_if(_auth_check(), '/home');