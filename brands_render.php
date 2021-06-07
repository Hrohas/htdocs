<?php
include 'conect_db.php';
$sql_brand = '
  SELECT brand_name,id_brand
  FROM brands
   ';
$send_sql_brand = mysqli_query($link,$sql_brand) or die(mysqli_error($link));
for($brands = []; $row = mysqli_fetch_assoc($send_sql_brand); $brands[] = $row);
$brands_list_item = '';
foreach($brands as $elem){
    $brands_list_item .= '
        <div class="brands-list-item" data-brand="'.$elem['id_brand'].'">'.$elem['brand_name'].'</div>
    ';
}
echo $brands_list_item;