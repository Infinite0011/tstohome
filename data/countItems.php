<?php
include "../include/config.php";

$sql = "SELECT (
    SELECT count(*) from items where category_id  ='1'
  ) as buildings,
   (
    SELECT count(*) from items where category_id ='2'
  ) as decorations,
   (
    SELECT count(*) from items where category_id ='3'
  ) as characters,
   (
    SELECT count(*) from items where category_id ='4'
  ) as skins";
$result = $connection->query($sql);

$datas = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data = array(
            'buildings' => $row["buildings"],
            'decorations' => $row["decorations"],
            'characters' => $row["characters"],
            'skins' => $row["skins"]
        );
        $datas[] = $data;
    }
}

$connection->close();

header('Content-Type: application/json');
echo json_encode($datas);
?>
