<?php

namespace App\Utils;

class Response {

    public function setAjaxJson($status, $msg = '',$result = array()) {
        echo json_encode([
            'status' => $status,
            'msg' => $msg,
            'result' => $result
        ]);
        die;
    }

}
