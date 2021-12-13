<?php

namespace App;

use Roots\Sage\Container;

/**
 * Get the sage container.
 *
 * @param string $abstract
 * @param array  $parameters
 * @param Container $container
 * @return Container|mixed
 */
function sage($abstract = null, $parameters = [], Container $container = null)
{
    $container = $container ?: Container::getInstance();
    if (!$abstract) {
        return $container;
    }
    return $container->bound($abstract)
        ? $container->makeWith($abstract, $parameters)
        : $container->makeWith("sage.{$abstract}", $parameters);
}

/**
 * Get / set the specified configuration value.
 *
 * If an array is passed as the key, we will assume you want to set an array of values.
 *
 * @param array|string $key
 * @param mixed $default
 * @return mixed|\Roots\Sage\Config
 * @copyright Taylor Otwell
 * @link https://github.com/laravel/framework/blob/c0970285/src/Illuminate/Foundation/helpers.php#L254-L265
 */
function config($key = null, $default = null)
{
    if (is_null($key)) {
        return sage('config');
    }
    if (is_array($key)) {
        return sage('config')->set($key);
    }
    return sage('config')->get($key, $default);
}

/**
 * @param string $file
 * @param array $data
 * @return string
 */
function template($file, $data = [])
{
    return sage('blade')->render($file, $data);
}

/**
 * Retrieve path to a compiled blade view
 * @param $file
 * @param array $data
 * @return string
 */
function template_path($file, $data = [])
{
    return sage('blade')->compiledPath($file, $data);
}

/**
 * @param $asset
 * @return string
 */
function asset_path($asset)
{
    return sage('assets')->getUri($asset);
}

/**
 * @param string|string[] $templates Possible template files
 * @return array
 */
function filter_templates($templates)
{
    $paths = apply_filters('sage/filter_templates/paths', [
        'views',
        'resources/views'
    ]);
    $paths_pattern = "#^(" . implode('|', $paths) . ")/#";

    return collect($templates)
        ->map(function ($template) use ($paths_pattern) {
            /** Remove .blade.php/.blade/.php from template names */
            $template = preg_replace('#\.(blade\.?)?(php)?$#', '', ltrim($template));

            /** Remove partial $paths from the beginning of template names */
            if (strpos($template, '/')) {
                $template = preg_replace($paths_pattern, '', $template);
            }

            return $template;
        })
        ->flatMap(function ($template) use ($paths) {
            return collect($paths)
                ->flatMap(function ($path) use ($template) {
                    return [
                        "{$path}/{$template}.blade.php",
                        "{$path}/{$template}.php",
                    ];
                })
                ->concat([
                    "{$template}.blade.php",
                    "{$template}.php",
                ]);
        })
        ->filter()
        ->unique()
        ->all();
}

/**
 * @param string|string[] $templates Relative path to possible template files
 * @return string Location of the template
 */
function locate_template($templates)
{
    return \locate_template(filter_templates($templates));
}

/**
 * Determine whether to show the sidebar
 * @return bool
 */
function display_sidebar()
{
    static $display;
    isset($display) || $display = apply_filters('sage/display_sidebar', false);
    return $display;
}

/**
 * Add favicon
 * @return void
 */
function add_favicon()
{  
    $favicon =  get_field('favicon', 'option');
    if ($favicon) {
        echo "<link rel='icon' type='image/x-icon' href='$favicon'>";
    }
}

function get_primary_menu_items($key)
{
    if ($key) {
        $primary_menu_items = wp_get_nav_menu_items($key);
        if (!$primary_menu_items) $primary_menu_items = [];

        $lv1_items = [];
        $lv2_items = [];

        foreach ($primary_menu_items as $item) {
            if ($item->menu_item_parent) {
                $lv2_items[] = $item;
            } else {
                $item->child_items = [];
                $lv1_items[$item->ID] = $item;
            }
        }

        foreach ($lv2_items as $item) {
            if (isset($lv1_items[$item->menu_item_parent])) {
                $lv1_items[$item->menu_item_parent]->child_items[] = $item;
            }
        }
        return $lv1_items;
    }
}

function get_latest_posts($post_type, $posts_per_page)
{
    if ($posts_per_page) {
        $args = array(
            'numberposts' => $posts_per_page,
            'post_type' => $post_type,
            'order' => 'DES',
            'orderby' => 'post_date'
        );
        $posts = get_posts($args);
        return $posts;
    }
}

function get_total_by_category_slug($cat_slug, $posts_per_page)
{
    $posts_per_page = $posts_per_page ? $posts_per_page : -1;
    $total = 0;
    if (is_string($cat_slug) && $cat_slug != '') {
        $query = new \WP_Query(array(
            'posts_per_page' => $posts_per_page,
            'category_name'  => $cat_slug,
        ));
        $total = $query->max_num_pages;
    } else {
        $query = new \WP_Query(array(
            'posts_per_page' => $posts_per_page,
            'post_status'    => 'publish',
        ));
        $total = $query->max_num_pages;
    }

    return $total;
}

function get_post_list()
{
    $post_guidance_block = (array) get_field('new_and_resources_block');
    $post_grid = $post_guidance_block;
    $no_posts_found_message = $post_grid['no_posts_found_message'];
    $posts_per_page = $post_grid['post_per_page'];
    $posts_per_page = $posts_per_page ? $posts_per_page : 6;
    $page = get_query_var('paged') ? get_query_var('paged') : 1;
    $categories = get_terms([
        'taxonomy' => 'category',
        'hide_empty' => true,
    ]);

    $get_posts_args = array(
        'posts_per_page' => $posts_per_page,
        'paged'         => $page,
        'post_status'    => 'publish',
    );

    $cat_query = $_GET['cat'];
    if ($cat_query) {
        $category_slug = $cat_query == 'all' ? null : $cat_query;
    }

    if($category_slug) {
        $get_posts_args['tax_query'][] = array(
            'taxonomy' => 'category',
            'field'    => 'slug',
            'terms'    => $category_slug
        );
    }
    $posts = get_posts($get_posts_args);
    return compact(
        'categories',
        'posts',
        'page',
        'posts_per_page',
        'no_posts_found_message'
    );
}

function handle_submit_newsletter_form() {
    $result = null;

    try {
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $portal_id = isset($_POST['portalId']) ? $_POST['portalId'] : '';
        $form_guid = isset($_POST['formGuid']) ? $_POST['formGuid'] : '';
        $api_url = "https://api.hsforms.com/submissions/v3/integration/submit/$portal_id/$form_guid";
        $email_in_base64 = base64_encode($email);
        $subscribed = get_option("subscribed_$email_in_base64");

        if (!$subscribed) {
            global $wp;
            $current_url = home_url( add_query_arg( array(), $wp->request ) );
            $form_data = array(
                'fields' => array(
                    array('name' => 'email', 'value' => $email)
                ),
                'context' => array(
                    'pageUri' => $current_url
                )
            );
    
            $args = array(
                'headers' => array( 'Content-type' => 'application/json' ),
                'body' => json_encode($form_data)
            );
    
            $res = wp_remote_post($api_url, $args);
            $result = json_decode($res['body'], true);

            if (empty($result['errors'])) {
                update_option("subscribed_$email_in_base64", true);
            }
        } else {
            $result = array('inlineMessage' => "You're Already Subscribed!");
        }
    } catch (\Exception $e) {
        //throw $e;
    }

    wp_send_json($result);
}
