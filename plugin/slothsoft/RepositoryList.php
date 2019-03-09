<?php
namespace slothsoft;

defined('ABSPATH') or die("Good bye and thanks for all the fish!");

/**
 * This bundles everything surrounding the repository list.
 * Or table. Or whatever it might be in the future.
 *
 * @author Stef Schulz
 * @since 1.0.0
 */

class RepositoryList {

    public function printRepositories($repositories): string {
        $result = '<ul>';
        foreach ($repositories as $repository) {
            $result .= '<li>';
            $result .= '<a href="' . $repository->html_url . '"><b>' . $repository->name . '</b></a> - ' . $repository->description;
            $result .= '</li>';
        }
        $result .= '</ul>';
        return $result;
    }
}


