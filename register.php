<?php

require "vendor/autoload.php";

session_start();

// 2. Why do you think the session variable assignments are wrapped inside an if-else and try-catch statements?
//     - This is done in order to assess and ensure if the required information is fulfilled, as well as be able to unexpected errors properly.

try {
    if (isset($_POST['fullname'])) {
        $_SESSION['user_fullname'] = $_POST['fullname'];
        $_SESSION['user_email'] = $_POST['email'];
        $_SESSION['user_birthdate'] = $_POST['birthdate'];

        header('Location: quiz.php');
        exit;
    
    } else {
        throw new Exception('Missing the basic information.');
    }

} catch (Exception $e) {
    echo '<h1>An error occurred:</h1>';
    echo '<p>' . $e->getMessage() . '</p>';
}