<?php include("dbconnect.php"); ?>

<h2 style='text-align: center;'>Random image display</h2>
<?php
$sql = "SELECT * FROM photos ORDER BY RAND() LIMIT 1";
$countsql = "SELECT COUNT(*) AS total FROM photos";
$result = mysqli_query($connect, $sql);
$rowCount = mysqli_query($connect, $countsql);
$totalImages = mysqli_fetch_assoc($rowCount)['total'];

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $url = $row['picture_url'];
    echo "<div style='display: flex; justify-content: center;'>";
    echo "<figure style='max-width: 400px; text-align: center;'>";
    echo "<img src='{$url}' alt='A random image from database' style='max-width: 100%; height: auto;' >";
    echo "<figcaption><p>A photo of {$row['subject']} in {$row['location']}</p></figcaption>";
    echo "</figure>";
    echo "</div>";
} else {
    echo "No photo found.";
}
echo "<p style='text-align: center;'>The total number of images currently in the database is <strong>{$totalImages}</strong>.</p>";
?>

<style>
    body {
        background-color: seashell;
    }
</style>