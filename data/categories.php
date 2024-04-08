<?php
include "../include/config.php";

$item_id = $_POST['item_id'];

$sql = "SELECT ic.id , ic.category  from items i 
left join item_categories ic on i.category_id = ic.id 
where content_id ='$item_id'
group by ic.id , ic.category";

$result = $connection->query($sql);

$datas = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data = array(
            'id' => $row["id"],
            'category' => $row["category"]
        );
        $datas[] = $data;
    }
}

$connection->close();

header('Content-Type: application/json');
echo json_encode($datas);
?>
