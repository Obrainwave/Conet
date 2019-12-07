<?php

/**
 * Conet - A PHP Mini Framework for Simple Website and Blog Developement
 *
 * @package  Conet
 * @author   Olaiwola Akeem <ola@m3tech.com.ng>
 */

/*
|--------------------------------------------------------------------------
| Application Landing Page
|--------------------------------------------------------------------------
|
|  All your app url's redirect to this page.
|  This file is inaccessible to all user viewing or
|  using your application.
|
*/

/*
|--------------------------------------------------------------------------
| We require all our package tools here so that we 
| can use them conveniently.
|--------------------------------------------------------------------------
*/
require __DIR__.'/../bootstrap/app.php';


/*
|--------------------------------------------------------------------------
| We call the function that renders our requested pages to the users.
| Make sure you define your index page path in the constant file,
| (constant/system/app.php). Do not edit this line.
|--------------------------------------------------------------------------
*/
  getFolder(LANDPAGE);

