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

function listGitHubRepositories() {
    $request = wp_remote_get('https://api.github.com/users/slothsoft/repos');

    if (is_wp_error($request)) {
        return "Error connecting to repository.";
    }
    $body = wp_remote_retrieve_body($request);
    $repositories = json_decode($body);

    echo '<ul>';
    foreach ($repositories as $repository) {
        echo '<li>';
        echo '<b><a href="' . esc_url($repository->html_url) . '">' . $repository->name . '</a></b> - ' . $repository->description;
        echo '</li>';
    }
    echo '</ul>';
}

add_shortcode('list-github-repositories', 'listGitHubRepositories');

?>