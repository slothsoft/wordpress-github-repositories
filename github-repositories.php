<?php
/*
 * Plugin Name: github-repositories
 * Version: 1.0
 * Plugin URI: http://slothsoft.de/
 * Description: Lists all the repositories in your GitHub profile.
 * Author: Stef Schulz
 * Author URI: http://slothsoft.de/
 * Requires at least: 5.1
 * Tested up to: 5.1
 *
 * Text Domain: github-repositories
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
        $result = $result . '<b><a href="' . esc_url($repository->html_url) . '">' . $repository->name . '</a></b> - ' . $repository->description;
        $result = $result . '</li>';
    }
    $result = $result . '</ul>';

    return $result;
}

add_shortcode('list-github-repositories', 'listGitHubRepositories');

?>