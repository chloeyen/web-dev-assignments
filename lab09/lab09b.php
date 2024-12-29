<?php include("dbconnect.php"); ?>
<h2>Listed from Newest to Oldest</h2><br>
<div style="font-size:20px; color:Blue;">
    <?php
    $sql = "SELECT picture_number, subject, location, date_taken, picture_url FROM photos ORDER BY date_taken DESC";
    $result = mysqli_query($connect, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row=mysqli_fetch_assoc($result)) {
            echo '<div style="padding: 15px; border: 1px solid black; background-color: #f3e6de;">';
            echo "<h2>Picture Number " . $row['picture_number'] . "</h2>";
            echo "<p>Subject: " . $row['subject'] . "</p>";
            echo "<p>Location: " . $row['location'] . "</p>";
            echo "<p>Date: " . $row['date_taken'] . "</p>";
            echo "<p>Picture URL: " . $row['picture_url'] . "</p>";
            echo "</div><br>";
        }
    } else {
        echo "<h3>No record found.</h3>";
    }
    ?>
</div>

