<?php

require_once('function.php');

if(!isUserLoggedIn())
    redirect('login.php');