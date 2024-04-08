<?php
include "../include/config.php";

$search = strtolower($_POST['search']);

$sql = "SELECT i.id ,i.item_id ,i.name , i.game_title , i.game_image , i.unique_code , ic2.content , im.menu , im.menu_image , ic.category, icw.name as comes_with  from items i 
left join item_categories ic on i.category_id = ic.id 
left join item_content ic2 on i.content_id = ic2.id 
left join item_menus im on i.menu_id = im.id 
left join item_comes_with icw on i.id = icw.item_id
where LOWER(game_title) like '%$search%' or i.item_id='$search'
order by i.game_title";
$result = $connection->query($sql);

// echo $sql; return;

$datas = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data = array(
            'id' => $row["id"],
            'item_id' => $row["item_id"],
            'name' => $row["name"],
            'game_title' => $row["game_title"],
            'game_image' => $row["game_image"],
            'unique_code' => $row["unique_code"],
            'content' => $row["content"],
            'menu' => $row["menu"],
            'menu_image' => $row["menu_image"],
            'category' => $row["category"],
            'comes_with' => $row["comes_with"]
        );
        $datas[] = $data;
    }
}

$connection->close();

header('Content-Type: application/json');
echo json_encode($datas);
?>
