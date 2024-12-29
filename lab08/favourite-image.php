<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['favouriteImage']) && !empty($_POST['favouriteImage'])) {
    //check if a cookie is set
    if (isset($_COOKIE['favouriteImage']) && ($_COOKIE['favouriteImage'] == $_POST['favouriteImage'])) {                     
        $favouriteImage = $_COOKIE['favouriteImage'];
        echo "<div style=\"display: flex; justify-content: flex-end; align-items: flex-start;\">";
        echo "<img style=\"opacity: 0.8; width:15%;\" src=\"thanksgiving-images/$favouriteImage\" alt=\"$favouriteImage\">";
        echo "</div>";
        echo "<p style=\"text-align: right; font-size: 30px; font-weight: bold;\">Current image: $favouriteImage </p>";
    } else {
    //set the cookie if doesn't exist
        $in24hrs = 60 * 60 * 24 + time();
        setcookie('favouriteImage', $_POST['favouriteImage'], $in24hrs);
        echo "<p style=\"text-align: right;\">Refresh page to see the chosen image!</p><br>";
    }
} else {
    echo "<p style=\"text-align: right; font-size: 30px;\">No image selected yet!</p><br>";
}

?>