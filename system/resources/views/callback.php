<?php

if (isset($_POST['transaction_id'])) {

    file_put_contents('result.txt', json_encode($_POST));

    echo 'Done';
} else if (isset($_REQUEST['t']) && $_REQUEST['t'] == 'cancel') {

    file_put_contents('result.txt', json_encode(['response_message' => 'Payment canceled']));
} else {
    echo '0';
}