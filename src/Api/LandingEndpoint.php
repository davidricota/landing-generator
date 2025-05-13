<?php

namespace Landing\Generator\Api;

use WP_Query;
use WP_REST_Request;
use Landing\Generator\Traits\HttpResponse;

class LandingEndpoint
{
  use HttpResponse;

  public function register()
  {
    add_action('rest_api_init', function () {
      register_rest_route('generator/v1', '/landing', [
        'methods' => 'GET',
        'callback' => [$this, 'handle'],
        'permission_callback' => '__return_true',
      ]);
    });
  }

  public function handle(WP_REST_Request $request)
  {
    $page = get_page_by_path('cruzdiablo-landing');
    $acf_fields = $page ? get_fields($page->ID) : [];

    $resources_query = new WP_Query([
      'post_type' => 'resources',
      'posts_per_page' => 4,
      'tax_query' => [[
        'taxonomy' => 'category',
        'field' => 'slug',
        'terms' => 'discovery-services',
      ]],
    ]);

    $resources_data = [];
    while ($resources_query->have_posts()) {
      $resources_query->the_post();
      $resources_data[] = [
        'id' => get_the_ID(),
        'title' => get_the_title(),
        'type' => get_field('select_resource_type'),
        'image' => get_field('add_image'),
        'date' => get_the_date('M Y'),
        'categories' => implode(', ', wp_list_pluck(get_the_category(), 'name')),
        'excerpt' => wp_trim_words(get_the_excerpt(), 20, '...'),
        'permalink' => get_permalink(),
      ];
    }
    wp_reset_postdata();

    $today = date('Ymd');
    $events_query = new WP_Query([
      'post_type' => 'events',
      'posts_per_page' => 2,
      'meta_key' => 'start_date',
      'orderby' => 'meta_value',
      'order' => 'ASC',
      'meta_query' => [
        'relation' => 'AND',
        [
          'key' => 'start_date',
          'value' => $today,
          'compare' => '>=',
          'type' => 'DATE',
        ],
        [
          'key' => 'region',
          'value' => 'europe',
          'compare' => '=',
        ],
      ],
    ]);

    $events_data = [];
    while ($events_query->have_posts()) {
      $events_query->the_post();
      $start_date = get_field('start_date');
      $timestamp = strtotime($start_date);
      $location = get_field('location');
      $region = get_field('region');

      $events_data[] = [
        'id' => get_the_ID(),
        'title' => get_the_title(),
        'start_date' => $start_date,
        'day' => date('j', $timestamp),
        'month' => date('M', $timestamp),
        'featured_img_url' => get_the_post_thumbnail_url(null, 'large') ?: get_template_directory_uri() . '/img/event.jpg',
        'permalink' => get_permalink(),
        'location_label' => $region === 'virtual' ? 'Virtual' : ($location ?: 'Virtual'),
      ];
    }
    wp_reset_postdata();

    $latest_post = new WP_Query([
      'post_type' => 'post',
      'posts_per_page' => 1,
      'tax_query' => [[
        'taxonomy' => 'category',
        'field' => 'slug',
        'terms' => 'discovery-services',
      ]],
    ]);

    $latest = [];
    if ($latest_post->have_posts()) {
      $latest_post->the_post();
      $latest = [
        'id' => get_the_ID(),
        'title' => get_the_title(),
        'content' => get_the_excerpt(),
        'image' => get_the_post_thumbnail_url(null, 'large'),
        'date' => get_the_date('F j, Y'),
        'permalink' => get_permalink(),
      ];
      wp_reset_postdata();
    }

    return $this->respond([
      'acf_fields' => $acf_fields,
      'resources' => $resources_data,
      'events' => $events_data,
      'latest_discovery_post' => $latest,
    ]);
  }
}
