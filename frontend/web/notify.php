<?php

// 支付宝的异步响应接口返回给的订单处理是notify.php，我们再将数据转发给我们自己
    $url = "http://www.yuncms.com/index.php?r=pay/notify";
    $postData = $_POST; // 拿到支付宝返回的数据，提交给payController::notify

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFILEDS, $postData);
    $out = curl_exec($ch);

    curl_close($ch);
    echo $out;