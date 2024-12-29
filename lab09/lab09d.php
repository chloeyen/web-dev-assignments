<?php include("dbconnect.php"); ?>

<div>
    <?php 
        $sqlLocation = "SELECT DISTINCT location FROM photos ORDER BY location";
        $locations = mysqli_query($connect, $sqlLocation);
        $sqlYears = "SELECT DISTINCT YEAR(date_taken) AS year FROM photos ORDER BY year";
        $years = mysqli_query($connect, $sqlYears);
    ?>
</div>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <style>
        body {
            background-color: seashell;
        }
        .label {
            color: blue;
        }
        .year {
            margin-right: 15px;
        }
        figcaption {
            word-wrap: break-word;
        }
        figure {
            max-width: 400px ;
            text-align: center;
        }
        img {
            max-width:100%; 
            height: auto;
        }

    </style>
</head>
<body>
    <h2>Photo Filter</h2>
    <h3>Select the boxes below and submit to filter criteria<br>All photos will be displayed if no box selected</h3>
    <form action="" method="post">
        <!-- pick location -->
        <p class='label'>Select Location:</p>
        <div id='checkbox'>
            <?php
            while ($row=mysqli_fetch_assoc($locations)) {
                echo "<label>";
                echo "<input type='checkbox' name='location[]' value='{$row['location']}'> {$row['location']}";
                echo "</label><br>";
            }
            ?>
        </div>
        <br><br>
        
        <!-- pick dates -->
        <span class='label'>Select Year:</span>
        <?php
        while ($row=mysqli_fetch_assoc($years)) {
            echo "<label>";
            echo "<input type='checkbox' name='year[]' value='{$row['year']}'> {$row['year']}";
            echo "</label>";
        }
        ?>
        <br><br>
        <button type="submit">Submit</button><br>
    </form>
</body>
</html>

<!-- process form -->
 <div class='container'>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        echo "<p style='color: green;'>Form submitted</p>";
        if (isset($_POST['location'])) {
            $selectedLocations = $_POST['location'];
            $delimiter = "', '";
            $strLocation = "'" . join($delimiter, $selectedLocations) . "'";
            $locationCondition = "location IN ({$strLocation})";
        } else {
            $selectedLocations = []; //empty if user don't select any location
            $locationCondition = 1; //true condition to show all locations if none is selected
        }

        if (isset($_POST['year'])) {
            $selectedYears = $_POST['year'];
            $delimiter = ", ";
            $strYear = join($delimiter, $selectedYears);
            $yearCondition = "YEAR(date_taken) IN ({$strYear})";

        } else {
            $selectedLocations = [];
            $yearCondition = 1;
        }

        $finalsql = "SELECT * FROM photos WHERE {$locationCondition} AND {$yearCondition} ";
        $result = mysqli_query($connect, $finalsql);

        if (mysqli_num_rows($result) > 0) {
            echo "<div style='display: flex; flex-wrap: wrap; gap: 20px;'>";
            while ($row=mysqli_fetch_assoc($result)) {
                echo "<figure>";
                echo "<img src='{$row['picture_url']}' alt='{$row['caption']}'>";
                echo "<figcaption><p>Photo of {$row['subject']} in {$row['location']} taken {$row['date_taken']}</p></figcaption>";
                echo "</figure>";
            }
            echo "</div>";
        } else {
            echo "<h3>No images found for the selected criteria.</h3>";
        }
    }
    ?>
 </div>


