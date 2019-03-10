<?php
/*
 * Cookies
 *
 * setcookie() - set a cookie
 *
 * Cookies will by default expire when the session is closed, to prevent this
 * the expiration date has to be explicitely set when the cookie is placed.
 */
session_start();


# save a complete story in a cookie if the save parameter is set
if (isset($_GET['save'])) {
  $name = urlencode($_SESSION['word'][2]) . time();
  setcookie(
      $name,
      implode(':', $_SESSION['word']),
      strtotime('+30 days'),   # expiration date set to 30 days
      '/'
  );

  # redirect to the welcome page, once the story is saved.
  header('location: /index.php');
  exit;
}
