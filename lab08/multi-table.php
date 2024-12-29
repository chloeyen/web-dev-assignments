<?php
$row = $_POST['row']; 
$col = $_POST['col'];

//validate numbers
if ($row < 3 || $row > 12 || $col < 3 || $col > 12) {
  echo json_encode([ "success" => false,
                     "message" => "The numbers must be between 3 and 12. Form will be reset in 3 seconds." ]);
  exit;
} else {
  $table = "<table><tr>";
  for ($i = 1; $i <= $col; $i++) {
    $table .= "<th>$i</th>";
  }
  $table .= "</tr>";

  for ($i = 2; $i <= $row; $i++) {
    $table .= "<tr> <th>$i</th>";
    for ($j = 2; $j <= $col; $j++) {
      $table.= "<td>".($i*$j)."</td>";
    }
    $table.= "</tr>";
  }
  $table .= "</table>";
  echo json_encode([ "success" => true,
                      "table" => $table ]);
  }
?>

