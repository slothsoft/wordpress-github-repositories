<?php
use slothsoft\RepositoryList;

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

require_once( 'slothsoft/RepositoryList.php' );

/**
 * Lists all GitHub repositories of a user in a simple unordered list.
 *
 * @author Stef Schulz
 * @since 1.0.0
 */
function listGitHubRepositories($atts) {
    $defaults = array(
        'user' => 'slothsoft'
    );
    $atts = shortcode_atts($defaults, $atts, 'github-repositories');

    $user = empty($atts['user']) ? $defaults['user'] : $atts['user'];

    $request = wp_remote_get('https://api.github.com/users/' . esc_attr($user) . '/repos');

    if (is_wp_error($request)) {
        return "Error connecting to repositories of user " . esc_attr($user) . ".";
    }
    $body = wp_remote_retrieve_body($request);
    $repositories = json_decode($body);

    $repositoryList = new RepositoryList();

    return $repositoryList->printRepositories($repositories);
}

add_shortcode('list-github-repositories', 'listGitHubRepositories');

?>