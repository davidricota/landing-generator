<?php

namespace Landing\Generator\Traits;

trait RestResponse {
    public function success($data, $code = 200) {
        return rest_ensure_response(['success' => true, 'data' => $data, 'code' => $code]);
    }

    public function error($message, $code = 400) {
        return new \WP_Error('custom_error', $message, ['status' => $code]);
    }
}
