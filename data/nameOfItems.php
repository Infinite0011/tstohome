<?php
include "../include/config.php";

$category = $_POST['category'];
$content = $_POST['content'];

$sql = "SELECT i.id, i.item_id, i.name, i.game_title, GROUP_CONCAT(gi.item_image) as game_image, i.unique_code, ic2.content, im.menu, im.menu_image, ic.category, icw.name as comes_with FROM items i
LEFT JOIN item_categories ic ON i.category_id = ic.id
LEFT JOIN item_content ic2 ON i.content_id = ic2.id
LEFT JOIN item_menus im ON i.menu_id = im.id
LEFT JOIN item_comes_with icw ON i.id = icw.item_id
LEFT JOIN game_images gi ON i.id = gi.item
WHERE category_id = '$category' AND content_id = '$content' 
GROUP BY
i.id, i.item_id, i.name, i.game_title, i.unique_code, ic2.content, im.menu, im.menu_image, ic.category, icw.name
ORDER BY
i.game_title;
";
$result = $connection->query($sql);

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
