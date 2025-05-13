<?php

namespace Landing\Generator\ACF;

class RegisterFields
{
  public function register()
  {
    add_action('acf/init', function () {
      if (function_exists('acf_add_local_field_group')) {
        acf_add_local_field_group([
          'key' => 'group_landing_sections',
          'title' => __('Landing Sections', 'landing-generator'),
          'fields' => [
            [
              'key' => 'field_page_sections',
              'label' => __('Page Sections', 'landing-generator'),
              'name' => 'page_sections',
              'type' => 'flexible_content',
              'instructions' => __('Add and arrange sections for your page', 'landing-generator'),
              'required' => 0,
              'layouts' => [
                // Hero Section
                'layout_hero' => [
                  'key' => 'layout_hero',
                  'name' => 'hero',
                  'label' => __('Hero Section', 'landing-generator'),
                  'display' => 'block',
                  'sub_fields' => [
                    [
                      'key' => 'field_hero_style',
                      'label' => __('Style', 'landing-generator'),
                      'name' => 'style',
                      'type' => 'select',
                      'choices' => [
                        'centered' => __('Centered', 'landing-generator'),
                        'split' => __('Split', 'landing-generator'),
                        'fullscreen' => __('Fullscreen', 'landing-generator')
                      ],
                      'default_value' => 'centered'
                    ],
                    [
                      'key' => 'field_hero_title',
                      'label' => __('Title', 'landing-generator'),
                      'name' => 'title',
                      'type' => 'text'
                    ],
                    [
                      'key' => 'field_hero_subtitle',
                      'label' => __('Subtitle', 'landing-generator'),
                      'name' => 'subtitle',
                      'type' => 'textarea',
                      'rows' => 2
                    ],
                    [
                      'key' => 'field_hero_background',
                      'label' => __('Background', 'landing-generator'),
                      'name' => 'background',
                      'type' => 'image',
                      'return_format' => 'array'
                    ],
                    [
                      'key' => 'field_hero_cta',
                      'label' => __('Call to Action', 'landing-generator'),
                      'name' => 'cta',
                      'type' => 'group',
                      'sub_fields' => [
                        [
                          'key' => 'field_hero_cta_text',
                          'label' => __('Text', 'landing-generator'),
                          'name' => 'text',
                          'type' => 'text'
                        ],
                        [
                          'key' => 'field_hero_cta_link',
                          'label' => __('Link', 'landing-generator'),
                          'name' => 'link',
                          'type' => 'link'
                        ]
                      ]
                    ]
                  ]
                ],
                // Features Section
                'layout_features' => [
                  'key' => 'layout_features',
                  'name' => 'features',
                  'label' => __('Features Section', 'landing-generator'),
                  'display' => 'block',
                  'sub_fields' => [
                    [
                      'key' => 'field_features_title',
                      'label' => __('Section Title', 'landing-generator'),
                      'name' => 'title',
                      'type' => 'text'
                    ],
                    [
                      'key' => 'field_features_description',
                      'label' => __('Section Description', 'landing-generator'),
                      'name' => 'description',
                      'type' => 'textarea'
                    ],
                    [
                      'key' => 'field_features_items',
                      'label' => __('Features', 'landing-generator'),
                      'name' => 'items',
                      'type' => 'repeater',
                      'layout' => 'block',
                      'sub_fields' => [
                        [
                          'key' => 'field_feature_icon',
                          'label' => __('Icon', 'landing-generator'),
                          'name' => 'icon',
                          'type' => 'image'
                        ],
                        [
                          'key' => 'field_feature_title',
                          'label' => __('Title', 'landing-generator'),
                          'name' => 'title',
                          'type' => 'text'
                        ],
                        [
                          'key' => 'field_feature_description',
                          'label' => __('Description', 'landing-generator'),
                          'name' => 'description',
                          'type' => 'textarea'
                        ]
                      ]
                    ]
                  ]
                ],
                // About Section
                'layout_about' => [
                  'key' => 'layout_about',
                  'name' => 'about',
                  'label' => __('About Section', 'landing-generator'),
                  'display' => 'block',
                  'sub_fields' => [
                    [
                      'key' => 'field_about_title',
                      'label' => __('Title', 'landing-generator'),
                      'name' => 'title',
                      'type' => 'text'
                    ],
                    [
                      'key' => 'field_about_content',
                      'label' => __('Content', 'landing-generator'),
                      'name' => 'content',
                      'type' => 'wysiwyg'
                    ],
                    [
                      'key' => 'field_about_image',
                      'label' => __('Image', 'landing-generator'),
                      'name' => 'image',
                      'type' => 'image',
                      'return_format' => 'array'
                    ]
                  ]
                ],
                // Portfolio Section
                'layout_portfolio' => [
                  'key' => 'layout_portfolio',
                  'name' => 'portfolio',
                  'label' => __('Portfolio Section', 'landing-generator'),
                  'display' => 'block',
                  'sub_fields' => [
                    [
                      'key' => 'field_portfolio_title',
                      'label' => __('Section Title', 'landing-generator'),
                      'name' => 'title',
                      'type' => 'text'
                    ],
                    [
                      'key' => 'field_portfolio_description',
                      'label' => __('Section Description', 'landing-generator'),
                      'name' => 'description',
                      'type' => 'textarea'
                    ],
                    [
                      'key' => 'field_portfolio_items',
                      'label' => __('Portfolio Items', 'landing-generator'),
                      'name' => 'items',
                      'type' => 'repeater',
                      'layout' => 'block',
                      'sub_fields' => [
                        [
                          'key' => 'field_portfolio_item_image',
                          'label' => __('Image', 'landing-generator'),
                          'name' => 'image',
                          'type' => 'image',
                          'return_format' => 'array'
                        ],
                        [
                          'key' => 'field_portfolio_item_title',
                          'label' => __('Title', 'landing-generator'),
                          'name' => 'title',
                          'type' => 'text'
                        ],
                        [
                          'key' => 'field_portfolio_item_category',
                          'label' => __('Category', 'landing-generator'),
                          'name' => 'category',
                          'type' => 'text'
                        ],
                        [
                          'key' => 'field_portfolio_item_link',
                          'label' => __('Link', 'landing-generator'),
                          'name' => 'link',
                          'type' => 'url'
                        ]
                      ]
                    ]
                  ]
                ],
                // Testimonials Section
                'layout_testimonials' => [
                  'key' => 'layout_testimonials',
                  'name' => 'testimonials',
                  'label' => __('Testimonials Section', 'landing-generator'),
                  'display' => 'block',
                  'sub_fields' => [
                    [
                      'key' => 'field_testimonials_title',
                      'label' => __('Section Title', 'landing-generator'),
                      'name' => 'title',
                      'type' => 'text'
                    ],
                    [
                      'key' => 'field_testimonials_items',
                      'label' => __('Testimonials', 'landing-generator'),
                      'name' => 'items',
                      'type' => 'repeater',
                      'layout' => 'block',
                      'sub_fields' => [
                        [
                          'key' => 'field_testimonial_content',
                          'label' => __('Content', 'landing-generator'),
                          'name' => 'content',
                          'type' => 'textarea'
                        ],
                        [
                          'key' => 'field_testimonial_author',
                          'label' => __('Author', 'landing-generator'),
                          'name' => 'author',
                          'type' => 'text'
                        ],
                        [
                          'key' => 'field_testimonial_position',
                          'label' => __('Position', 'landing-generator'),
                          'name' => 'position',
                          'type' => 'text'
                        ],
                        [
                          'key' => 'field_testimonial_image',
                          'label' => __('Author Image', 'landing-generator'),
                          'name' => 'image',
                          'type' => 'image',
                          'return_format' => 'array'
                        ]
                      ]
                    ]
                  ]
                ],
                // Pricing Section
                'layout_pricing' => [
                  'key' => 'layout_pricing',
                  'name' => 'pricing',
                  'label' => __('Pricing Section', 'landing-generator'),
                  'display' => 'block',
                  'sub_fields' => [
                    [
                      'key' => 'field_pricing_title',
                      'label' => __('Section Title', 'landing-generator'),
                      'name' => 'title',
                      'type' => 'text'
                    ],
                    [
                      'key' => 'field_pricing_description',
                      'label' => __('Section Description', 'landing-generator'),
                      'name' => 'description',
                      'type' => 'textarea'
                    ],
                    [
                      'key' => 'field_pricing_plans',
                      'label' => __('Pricing Plans', 'landing-generator'),
                      'name' => 'plans',
                      'type' => 'repeater',
                      'layout' => 'block',
                      'sub_fields' => [
                        [
                          'key' => 'field_plan_name',
                          'label' => __('Plan Name', 'landing-generator'),
                          'name' => 'name',
                          'type' => 'text'
                        ],
                        [
                          'key' => 'field_plan_price',
                          'label' => __('Price', 'landing-generator'),
                          'name' => 'price',
                          'type' => 'text'
                        ],
                        [
                          'key' => 'field_plan_interval',
                          'label' => __('Interval', 'landing-generator'),
                          'name' => 'interval',
                          'type' => 'text'
                        ],
                        [
                          'key' => 'field_plan_features',
                          'label' => __('Features', 'landing-generator'),
                          'name' => 'features',
                          'type' => 'repeater',
                          'sub_fields' => [
                            [
                              'key' => 'field_feature_text',
                              'label' => __('Feature', 'landing-generator'),
                              'name' => 'text',
                              'type' => 'text'
                            ]
                          ]
                        ],
                        [
                          'key' => 'field_plan_button_text',
                          'label' => __('Button Text', 'landing-generator'),
                          'name' => 'button_text',
                          'type' => 'text'
                        ],
                        [
                          'key' => 'field_plan_button_link',
                          'label' => __('Button Link', 'landing-generator'),
                          'name' => 'button_link',
                          'type' => 'url'
                        ]
                      ]
                    ]
                  ]
                ],
                // Team Section
                'layout_team' => [
                  'key' => 'layout_team',
                  'name' => 'team',
                  'label' => __('Team Section', 'landing-generator'),
                  'display' => 'block',
                  'sub_fields' => [
                    [
                      'key' => 'field_team_title',
                      'label' => __('Section Title', 'landing-generator'),
                      'name' => 'title',
                      'type' => 'text'
                    ],
                    [
                      'key' => 'field_team_description',
                      'label' => __('Section Description', 'landing-generator'),
                      'name' => 'description',
                      'type' => 'textarea'
                    ],
                    [
                      'key' => 'field_team_members',
                      'label' => __('Team Members', 'landing-generator'),
                      'name' => 'members',
                      'type' => 'repeater',
                      'layout' => 'block',
                      'sub_fields' => [
                        [
                          'key' => 'field_member_image',
                          'label' => __('Photo', 'landing-generator'),
                          'name' => 'image',
                          'type' => 'image',
                          'return_format' => 'array'
                        ],
                        [
                          'key' => 'field_member_name',
                          'label' => __('Name', 'landing-generator'),
                          'name' => 'name',
                          'type' => 'text'
                        ],
                        [
                          'key' => 'field_member_position',
                          'label' => __('Position', 'landing-generator'),
                          'name' => 'position',
                          'type' => 'text'
                        ],
                        [
                          'key' => 'field_member_bio',
                          'label' => __('Bio', 'landing-generator'),
                          'name' => 'bio',
                          'type' => 'textarea'
                        ],
                        [
                          'key' => 'field_member_social',
                          'label' => __('Social Links', 'landing-generator'),
                          'name' => 'social',
                          'type' => 'repeater',
                          'sub_fields' => [
                            [
                              'key' => 'field_social_platform',
                              'label' => __('Platform', 'landing-generator'),
                              'name' => 'platform',
                              'type' => 'select',
                              'choices' => [
                                'linkedin' => 'LinkedIn',
                                'twitter' => 'Twitter',
                                'github' => 'GitHub'
                              ]
                            ],
                            [
                              'key' => 'field_social_url',
                              'label' => __('URL', 'landing-generator'),
                              'name' => 'url',
                              'type' => 'url'
                            ]
                          ]
                        ]
                      ]
                    ]
                  ]
                ],
                // Contact Section
                'layout_contact' => [
                  'key' => 'layout_contact',
                  'name' => 'contact',
                  'label' => __('Contact Section', 'landing-generator'),
                  'display' => 'block',
                  'sub_fields' => [
                    [
                      'key' => 'field_contact_title',
                      'label' => __('Section Title', 'landing-generator'),
                      'name' => 'title',
                      'type' => 'text'
                    ],
                    [
                      'key' => 'field_contact_description',
                      'label' => __('Section Description', 'landing-generator'),
                      'name' => 'description',
                      'type' => 'textarea'
                    ],
                    [
                      'key' => 'field_contact_form_shortcode',
                      'label' => __('Contact Form Shortcode', 'landing-generator'),
                      'name' => 'form_shortcode',
                      'type' => 'text',
                      'instructions' => __('Enter the shortcode for your contact form plugin', 'landing-generator')
                    ],
                    [
                      'key' => 'field_contact_info',
                      'label' => __('Contact Information', 'landing-generator'),
                      'name' => 'info',
                      'type' => 'group',
                      'sub_fields' => [
                        [
                          'key' => 'field_contact_address',
                          'label' => __('Address', 'landing-generator'),
                          'name' => 'address',
                          'type' => 'textarea'
                        ],
                        [
                          'key' => 'field_contact_email',
                          'label' => __('Email', 'landing-generator'),
                          'name' => 'email',
                          'type' => 'email'
                        ],
                        [
                          'key' => 'field_contact_phone',
                          'label' => __('Phone', 'landing-generator'),
                          'name' => 'phone',
                          'type' => 'text'
                        ]
                      ]
                    ]
                  ]
                ]
              ],
              'button_label' => __('Add Section', 'landing-generator'),
              'min' => 1,
              'max' => 0
            ]
          ],
          'location' => [
            [
              [
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'landing',
              ],
            ],
          ],
          'menu_order' => 0,
          'position' => 'normal',
          'style' => 'default',
          'label_placement' => 'top',
          'instruction_placement' => 'label',
          'hide_on_screen' => [
            'permalink',
            'the_content',
            'excerpt',
            'discussion',
            'comments',
            'revisions',
            'slug',
            'author',
            'format',
            'page_attributes',
            'featured_image',
            'categories',
            'tags',
            'send-trackbacks',
          ],
          'active' => true,
          'description' => __('Fields for Landing Page sections', 'landing-generator'),
        ]);
      }
    });
  }
}