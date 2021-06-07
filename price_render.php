<?php
include 'conect_db.php';
$where = '';
$order = '';
$engl_trans = [];
$post = '';
if(!empty($_POST['smells'])){
    $post = $_POST['smells'];
}
if($post == 'smells'){
    if(!empty($_POST['sort'])){
        if($_POST['sort'] == 'hi'){
            $order = ' ORDER BY smells.price';
        }
        if($_POST['sort'] == 'low'){
            $order = ' ORDER BY smells.price DESC';
        }
    }
    if(!empty($_POST['id_brand'])){
        $where = 'WHERE smells.id_brand  = '.$_POST['id_brand'];
    }
    if(!empty($_POST['id_category'])){
        $where = 'WHERE smells.id_category  = '.$_POST['id_category'];
        
    }
    if(!empty($_POST['id_category']) && !empty($_POST['id_brand'])){
        $where = 'WHERE smells.id_category  = '.$_POST['id_category'].' AND smells.id_brand  = '.$_POST['id_brand'];  
    }
    $sql_price = '
        SELECT smells.smell_name, smells.price, brands.brand_name, smells.id_smell, smells.img_src
        FROM smells
        INNER JOIN brands ON brands.id_brand = smells.id_brand '.$where.$order;
    $send_sql_price = mysqli_query($link,$sql_price) or die(mysqli_error($link));
    for($all_price = []; $row = mysqli_fetch_assoc($send_sql_price); $all_price[] = $row);
    $sort = [];
    if(!empty($_POST['search'])){
        foreach($all_price as $elem){
            $temp = $elem['brand_name'].' '.$elem['smell_name'];
            if(preg_match('#'.$_POST['search'].'#i',$temp) == 1){
                $sort[]= $elem;
            } 
        }
    }
    function arr_slice($arr){
        if(empty($_POST['calc_item'])){
            return array_slice($arr,0,8);
        }else{
            return array_slice($arr,($_POST['calc_item']),8);
        }
    }
    if(empty($sort)){
        $price_length = count($all_price);
     $slice = arr_slice($all_price);
    }else{
        $price_length = count($sort);
        $slice = arr_slice($sort);
    }
    $price = '';
    foreach($slice as $elem){
        $price .= '
            <div class="catalog-item">
                <div class="cat-image">
                    <img src="/img/catalog/smells/'.$elem['img_src'].'" alt="">
                </div>
                <div data-tracking="true">
                <div class="cat-name">'.$elem['brand_name'].'</div>
                <div class="cat-name">'.$elem['smell_name'].'</div></div>
                <div class="cat-price"><span>От 5мл за:</span> <span data-sp="price">'.$elem['price'].'</span>₽</div>
                <a  class="main-info-button cat-button" data-smell="'.$elem['id_smell'].'">Добавить в корзину</a>
            </div>
        
        ';
    }
    echo '<div class="catalog-body" data-length="'.$price_length.'" style="display: none">
              '.$price.'  
            </div>';
}
if($post == 'boxes'){
    if(!empty($_POST['sort'])){
        if($_POST['sort'] == 'hi'){
            $order = ' ORDER BY box_price';
        }
        if($_POST['sort'] == 'low'){
            $order = ' ORDER BY box_price DESC';
        }
    }
    $sql_box = '
        SELECT id_box,box_name,box_value,box_price, min_value
        FROM boxes'.$order;
    $send_sql_box = mysqli_query($link,$sql_box) or die(mysqli_error($link));
    for($boxes = []; $row = mysqli_fetch_assoc($send_sql_box); $boxes[] = $row);
    $box = '';
    $sort = [];
    if(!empty($_POST['search'])){
        foreach($boxes as $elem){
            $temp = $elem['box_value'];
            if(preg_match('#'.$_POST['search'].'#i',$temp) == 1){
                $sort[]= $elem;
            } 
        }
    }
    if(!empty($sort)){
        $boxes = $sort;
    }
    foreach($boxes as $elem){
        $box .= '  
            <div class="catalog-item">
                <div class="cat-image">
                    <img src="/img/set.png" alt="">
                </div>
                <div data-tracking="true">
                <div class="cat-name">'.$elem['box_name'].'</div>
                <div class="cat-value">'.$elem['box_value'].'</div></div>
                <div class="cat-price"><span>От '.$elem['min_value'].'мл за:</span><span data-sp="price">'.$elem['box_price'].'</span>₽</div>
                <a class="main-info-button cat-button" data-smell="'.$elem['id_box'].'">Добавить в корзину</a>
                <input type="hidden" value="'.$elem['min_value'].'">
             </div>
            ';
    }
    echo '<div class="catalog-body" style="display: none">
    '.$box.'  
  </div>';
}