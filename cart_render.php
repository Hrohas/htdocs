<?php
    include 'conect_db.php';
    $items_cart = $_POST['cart']['items'];
    $order_item = '';
    foreach($items_cart as $item) {
        if($item['id'] < 1000) {
            $sql_cart = '
                SELECT smells.id_smell, smells.smell_name, smells.price, brands.brand_name, smells.img_src
                FROM smells
                INNER JOIN brands ON brands.id_brand = smells.id_brand
                WHERE smells.id_smell = '.$item['id'];
            $sql_request = mysqli_query($link, $sql_cart) or die(mysqli_error($link));
            for($response = []; $row = mysqli_fetch_assoc($sql_request); $response[] = $row);
            $order_item .= '
            <div class="order-item" data-id="'.$item['id'].'">
                <div class="order-img">
                    <img src="/img/catalog/smells/'.$response[0]['img_src'].'" alt="">
                </div>
                <div class="order-text mrg central">'.$response[0]['brand_name'].' '.$response[0]['smell_name'].'</div>
                <div class="select-count mrg">
                    <div class="select-count-header">Сколько мл:</div>
                    <div class="input-count">
                        <i class="fa fa-minus-circle" data-count="minus" aria-hidden="true"></i>
                        <input type="number" name="count" value="'.$item['value'].'" min="5" step="5">
                        <i class="fa fa-plus-circle" data-count="plus" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="price mrg central"><span data-price="prc">'.$item['price'].'</span>₽</div>
                <input type="hidden" name="prc" value="'.$response[0]['price'].'">
                <div class="delete mrg central">
                    <i class="fa fa-times-circle-o" aria-hidden="true"></i>
                </div>
            </div>
        ';
        }
        else {
            $sql_cart = '
            SELECT id_box,box_name,box_value,box_price, min_value
            FROM boxes
            WHERE id_box = '.$item['id'];
            $sql_request = mysqli_query($link, $sql_cart) or die(mysqli_error($link));
            for($response = []; $row = mysqli_fetch_assoc($sql_request); $response[] = $row);
            $order_item .= '
            <div class="order-item" data-id="'.$item['id'].'">
                <div class="order-img"></div>
                <div class="order-text mrg central">Набор '.$response[0]['box_name'].'</div>
                <div class="select-count mrg">
                    <div class="select-count-header">Сколько мл:</div>
                    <div class="input-count">
                        <i class="fa fa-minus-circle" data-count="minus" aria-hidden="true"></i>
                        <input type="number" name="count" value="'.$item['value'].'" min="'.$response[0]['min_value'].'" step="5">
                        <i class="fa fa-plus-circle" data-count="plus" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="price mrg central"><span data-price="prc">'.$item['price'].'</span>₽</div>
                <input type="hidden" name="prc" value="'.$response[0]['box_price'].'">
                <input type="hidden" name="min" value="'.$response[0]['min_value'].'">
                <div class="delete mrg central">
                    <i class="fa fa-times-circle-o" aria-hidden="true"></i>
                </div>
            </div>
        ';
        }
    }
    echo '
        <div class="cart-body">
            <div class="cart-body-header">
                <div class="cart-body-header">ваш заказ</div>
                <div class="close"><i class="fa fa-times" aria-hidden="true"></i></div>
            </div>
            <div class="order">
                '.$order_item.'
            </div>
            <div class="summary">
                <div class="sum-text">Итого:</div>
                <div class="sum-result"></div>
            </div>
            <div class="personal-data">
                <div class="data">Реквизиты заказа</div>
                <input type="tel" placeholder="Телефон" name="number">
                <input type="text" placeholder="Имя" name="name">
                <a class="main-info-button color" style="display: inline-block; margin: 0 auto; border: 3px solid black" data-button="order">отправить</a>
            </div>
        </div>
    ';
?>