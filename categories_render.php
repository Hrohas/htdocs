<?php 
include 'conect_db.php';
$sql_categories = '
 SELECT category_name,id_category
 FROM categories
';
$send_categories = mysqli_query($link,$sql_categories) or die(mysqli_error($link));
for($categories = []; $row = mysqli_fetch_assoc($send_categories); $categories[] = $row);
$category_item = '';
foreach($categories as $elem){
    $category_item .= '
        <div class="category-item" data-category="'.$elem['id_category'].'">'.$elem['category_name'].'</div>
    ';
};
echo $category_item ;