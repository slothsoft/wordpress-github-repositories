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
	return "Hello World!"; 
}

add_shortcode( 'list-github-repositories', 'listGitHubRepositories' );

?>