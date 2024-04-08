<?php
include "../include/config.php";

$sql = "SELECT id, content FROM item_content order by id desc";
$result = $connection->query($sql);

$datas = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data = array(
            'id' => $row["id"],
            'content' => $row["content"]
        );
        $datas[] = $data;
    }
}

$connection->close();

header('Content-Type: application/json');
echo json_encode($datas);
?>
