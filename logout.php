<?php
// Copyright (c) Microsoft. All rights reserved. Licensed under the MIT license. See full license at the bottom of this file. 
session_start(); 
require('o365/Office365Service.php');
// Clear user info from the session.
unset($_SESSION['userName']);
unset($_SESSION['accessToken']);
unset($_SESSION['refreshToken']);

// Build a URL back to the homepage.
$redirectUri = "http".(($_SERVER["HTTPS"] == "on") ? "s://" : "://").$_SERVER["HTTP_HOST"]."/um_invoices_new/utilities/php-calendar/home.php";
// Redirect the user to the Azure logout URL, which will then redirect back to the homepage.
header("Location: ".Office365Service::getLogoutUrl($redirectUri));
?>