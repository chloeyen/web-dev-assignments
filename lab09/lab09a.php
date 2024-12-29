<?php include('dbconnect.php'); ?>

<?php
$sql = "INSERT IGNORE INTO photos (subject, location, date_taken, picture_url) 
VALUES ('Montreal', 'Quebec', '2024-05-14', './images/montreal.jpg'); ";
$sql .= "INSERT IGNORE INTO photos (subject, location, date_taken, picture_url) 
VALUES ('Burnt River Cottage', 'Ontario', '2024-08-10', './images/cottage.jpg'); ";
$sql .= "INSERT IGNORE INTO photos (subject, location, date_taken, picture_url) 
VALUES ('Church', 'Quebec', '2024-05-13', './images/montreal-church.jpg'); ";
$sql .= "INSERT IGNORE INTO photos (subject, location, date_taken, picture_url) 
VALUES ('Blue Mountain', 'Ontario', '2024-01-01', './images/blue-mountain.jpg'); ";
$sql .= "INSERT IGNORE INTO photos (subject, location, date_taken, picture_url) 
VALUES ('Da Lat', 'Da Lat', '2024-06-24', './images/dalat.jpg'); ";
$sql .= "INSERT IGNORE INTO photos (subject, location, date_taken, picture_url) 
VALUES ('Beach', 'Cancun', '2023-12-20', './images/cancun-beach.jpg'); ";
$sql .= "INSERT IGNORE INTO photos (subject, location, date_taken, picture_url) 
VALUES ('Chichen Itza', 'Cancun', '2023-12-18', './images/chichen-itza.jpg'); ";
$sql .= "INSERT IGNORE INTO photos (subject, location, date_taken, picture_url) 
VALUES ('Dundas Square', 'Ontario', '2023-06-20', './images/dundas-square.jpg'); ";
$sql .= "INSERT IGNORE INTO photos (subject, location, date_taken, picture_url) 
VALUES ('Cherry Blossom', 'Ontario', '2022-05-07', './images/cherry-blossom.jpg'); ";
$sql .= "INSERT IGNORE INTO photos (subject, location, date_taken, picture_url) 
VALUES ('Lion\'s Provincial Park', 'Ontario', '2021-06-18', './images/lionhead-lookout.jpg'); ";

if (mysqli_multi_query($connect, $sql)) {
    echo "<h3>10 new records added successfully.</h3>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($connect);
}
?>