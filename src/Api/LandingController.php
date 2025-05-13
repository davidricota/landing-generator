<?php

namespace Landing\Generator\Api;

use WP_REST_Server;
use WP_Error;

class LandingController {
    public function __construct() {
        // Conectar el método register al hook rest_api_init
        add_action('rest_api_init', [$this, 'register']);
    }

    public function register() {
        register_rest_route('landing-generator/v1', '/landing/(?P<slug>[a-zA-Z0-9-_]+)', [
            'methods' => WP_REST_Server::READABLE,
            'callback' => [$this, 'get_landing_by_slug'],
            'permission_callback' => '__return_true',
        ]);
    }

    public function get_landing_by_slug($request) {
        $slug = $request['slug'];
        
        // Buscar el post por slug - reemplazando get_page_by_path con get_posts para mejor rendimiento
        $args = array(
            'name' => $slug,
            'post_type' => 'landing',
            'post_status' => 'publish',
            'numberposts' => 1
        );
        
        $posts = get_posts($args);
        
        if (empty($posts)) {
            return new WP_Error('not_found', __('Landing not found.', 'landing-generator'), ['status' => 404]);
        }
        
        $landing = $posts[0];
        
        // Preparar respuesta con más información
        $response = [
            'id' => $landing->ID,
            'title' => get_the_title($landing->ID),
            'content' => apply_filters('the_content', $landing->post_content),
            'slug' => $slug,
            'date' => $landing->post_date,
            'acf' => []
        ];
        
        // Comprobar si ACF está activo y obtener los fields
        if (function_exists('get_fields')) {
            $acf_fields = get_fields($landing->ID);
            
            if ($acf_fields) {
                $response['acf'] = $acf_fields;
            }
        }
        
        return rest_ensure_response($response);
    }
}