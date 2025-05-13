<?php

namespace Landing\Generator\Traits;

use WP_REST_Response;

trait HttpResponse
{
  protected function respond($data, $status = 200)
  {
    return new WP_REST_Response($data, $status);
  }
}
