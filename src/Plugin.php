<?php

namespace Landing\Generator;

use Landing\Generator\Api\LandingController;
use Landing\Generator\CPT\RegisterCPTs;
use Landing\Generator\ACF\RegisterFields;

class Plugin
{
  public function init()
  {
    (new RegisterCPTs())->register();
    (new RegisterFields())->register();
    // Solo instanciamos el controlador - no llamamos a register() aquí
    new LandingController();
  }
}