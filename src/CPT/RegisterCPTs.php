<?php

namespace Landing\Generator\CPT;

class RegisterCPTs
{
  public function register()
  {
    add_action('init', function () {
       register_post_type('landing', [
            'labels' => [
                'name' => __('Landings', 'landing-generator'),
                'singular_name' => __('Landing', 'landing-generator'),
                'add_new' => __('Agregar nueva', 'landing-generator'),
                'edit_item' => __('Editar Landing', 'landing-generator'),
            ],
            'public' => true,
            'has_archive' => false,
            'show_in_rest' => true,
            'supports' => ['title', 'editor', 'thumbnail'],
            'menu_icon' => 'dashicons-welcome-widgets-menus',
            'rewrite' => [
                'slug' => 'landing',  
                'with_front' => false, 
            ],
        ]);
    });
  }
}
