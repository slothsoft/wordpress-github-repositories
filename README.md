#  GitHub Repositories (for Wordpress)

- **Author:** [Stef Schulz](mailto:s.schulz@slothsoft.de)
- **Repository:** <https://github.com/slothsoft/wordpress-github-repositories>
- **Open Issues:** <https://github.com/slothsoft/wordpress-github-repositories/issues>
- **Wiki:** none

Just a silly project to see if I can create WordPress plug-ins.  Note that I have no idea about PHP and what I'm doing, so this project should not be used as reference on how to do _anything_.



## Getting Started

### Prerequisites

You need at least WordPress 5.1, or at least that is the version I tested against.




### Installing

Installing "GitHub Repositories" can be done either by searching for "GitHub Repositories" via the "Plugins > Add New" screen in your WordPress dashboard, or by using the following steps:

1. Download the plugin via [this repository](https://raw.githubusercontent.com/slothsoft/wordpress-github-repositories/master/release/github-repositories-1.0.0.zip)
1. Upload the ZIP file through the 'Plugins > Add New > Upload' screen in your WordPress dashboard
1. Activate the plugin through the 'Plugins' menu in WordPress



### Using the Plug-in

You define the plug-in with the shortcut `list-github-repositories`. Don't forget to define the user whose plug-ins you want to display, else you'll get mine.

![List GitHub Repositories in Editor](https://raw.githubusercontent.com/slothsoft/wordpress-github-repositories/master/readme/list-repositories-edit.png)

Afterwards you get a nice list with your repositories.

![List GitHub Repositories in Action](https://raw.githubusercontent.com/slothsoft/wordpress-github-repositories/master/readme/list-repositories-result.png)

Similarly you can use a shortcode like `[show-github-repository user="slothsoft" repository="wordpress-github-repositories"]` to show a single repository's HTML. GitHub parses the HTML itself, so you don't need to fear unsupported markup.
     
     

##  Features


**[1.0](https://github.com/slothsoft/wordpress-github-repositories/milestone/1?closed=1)**

* Initial release



## License

This project is licensed under the GNU General Public License - see the [license file](https://github.com/slothsoft/wordpress-github-repositories/blob/master/LICENSE) for details.
