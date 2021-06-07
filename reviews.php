<?php
    $carousel_item = '';
    for($i=1;$i<=7;$i++) {
        $carousel_item .= '
        <div class="carousel-item">
            <img src="/img/reviews/'.$i.'.png" alt="">
        </div>
        ';
    }
    echo '
        <div id="js-carousel" class="owl-carousel owl-theme">
            '.$carousel_item.'
        </div>
    ';
?>