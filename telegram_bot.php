<?php
    header('Content-type: text/html; charset=utf-8');

    $token = "1766192005:AAEvH42inMO6ljy1L4BVqMLsikINysUHOc0";
    $chat_id = "-543153997";

    $message = $_POST['status']."%0A".$_POST['text'];

    $sendTextToTelegram = file_get_contents("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$message}");
    $response = json_decode($sendTextToTelegram, true);
    echo $response["ok"];
?>