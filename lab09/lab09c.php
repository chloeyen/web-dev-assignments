<?php include("dbconnect.php"); ?>

<div>
    <?php
        $sql = "SELECT subject, location, picture_url FROM photos WHERE location LIKE '%Ontario%' ";
        $result = mysqli_query($connect, $sql);

        if (mysqli_num_rows($result) > 0) {
            echo "<h2>Photos that were taken in Ontario: </h2>";
            echo '<div style="display: flex; flex-wrap: wrap; gap: 20px;" >';
            while ($row=mysqli_fetch_assoc($result)) {
                echo "<figure style='text-align: center; max-width: 400px' >";
                echo "<img style='max-width: 100%; height: auto;' src=\"{$row['picture_url']}\" alt='photo taken in Ontario' ";
                echo "<figcaption><p>{$row['subject']}<br>Location: {$row['location']}</p></figcaption>";
                echo "</figure>";
            }
            echo "</div>";
        } else {
            echo "<h3>No photos found.</h3>";
        }
    ?>
</div>

<style>
    body {
        background-color: seashell;
    }
</style>