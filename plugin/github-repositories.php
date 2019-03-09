<?php
/*
 * Plugin Name: @project.name@
 * Version: @project.version@
 * Plugin URI: http://slothsoft.de/
 * Description: Lists all the repositories in your GitHub profile.
 * Author: Stef Schulz
 * Author URI: http://slothsoft.de/
 * Requires at least: @PLUGIN_WORDPRESS_MIN@
 * Tested up to: @PLUGIN_WORDPRESS_MAX@
 *
 * Text Domain: @project.artifactId@
 */
defined('ABSPATH') or die("Good bye and thanks for all the fish!");

/*
 * Lists all GitHub repositories of a user in a simple unordered list.
 */
function listGitHubRepositories($atts) {
    $defaults = array(
        'user' => 'slothsoft'
    );
    $atts = shortcode_atts($defaults, $atts, 'github-repositories');

    $user = empty($atts['user']) ? $defaults['user'] : $atts['user'];

    $request = wp_remote_get('https://api.github.com/users/' . esc_attr($user) . '/repos');

    if (is_wp_error($request)) {
        return "Error connecting to repository.";
    }
    $body = wp_remote_retrieve_body($request);
    $repositories = json_decode($body);

    $result = '<ul>';
    foreach ($repositories as $repository) {
        $result = $result . '<li>';
        $result = $result . '<a href="' . esc_url($repository->html_url) . '"><b>' . $repository->name . '</b></a> - ' . $repository->description;
        $result = $result . '</li>';
    }
    $result = $result . '</ul>';

    return $result;
}

add_shortcode('list-github-repositories', 'listGitHubRepositories');

?>