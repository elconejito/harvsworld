### HEAD
* Update asset-builder 1.0.1 to fix Windows compatibility
* Fixes broken wiredep imports with main.scss.example ([original issue](https://discourse.roots.io/t/issue-with-sage-sass-version/2962))
* Change theme name from Roots to Sage
* Bump required PHP version to >=5.4
* Add coding standards based on PSR-2
* Add Travis CI
* Add namespace
* Use short array syntax
* Use short echo syntax
* Switch from Grunt to gulp, new front-end development workflow
* Switch from Livereload to [BrowserSync](http://www.browsersync.io/)
* Use wiredep for Sass and Less injection
* Implement JSON file based asset pipeline with [asset-builder](https://github.com/austinpray/asset-builder)
* Re-organize asset file structure
* Re-organize stylesheet file structure
* Add main.scss.example and instructions for using Sass
* Use the primary theme stylesheet for the editor stylesheet
* Remove theme activation, move to [wp-cli-theme-activation](https://github.com/roots/wp-cli-theme-activation)
* Simplify 404 page
* Convert Sidebar to ConditionalTagCheck
* Update to jQuery 1.11.2
* Use new core navigation template tag
* Update sidebar to fix default template check
* Update nav walker to correctly assign `active` classes for custom post types
* Better support for CPT templates
