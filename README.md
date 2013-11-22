# Theme for bibliotek.dk

Overall the theme is divided in the following parts:

- /design
- /sass
- /css
- /js
- /img
- /templates
- bibdk_theme.info
- template.php
- config.rb

Below is a short description of the different parts.
_Please read the README.md files inside the /sass, /js, and /templates folders._


## /design
The design folder is where external designers put design files for reference. They will typically be either .png or .psd files.

## /sass
The sass folder handles all our styling before it is compiled to css. Bibdk_theme uses the preprocessor Sass http://sass-lang.com/ and the sass framework Compass http://compass-style.org/.

## /css
The css folder is where our styling is compiled to. The files in this folder must never be edited, since the changes made will be overriden by sass.

## /js
The js folder contains our JavaScript. Drupal uses jQuery, and the JavaScript in the js folder should preferably be written as jQuery code.

## /templates
The templates foldes contains all the custom template files implemented by the theme (*.tpl.php) files. 

## bibdk_theme.info
This file is necessary to let Drupal identify the theme. The file is primarily used to import css/js files and register content regions.

## template.php
The template.php file contains the 'heavy' php logic of the theme.

## config.rb
The config.rb file is the configuration file for Sass.


_Please read the README.md files inside the /sass, /js, and /templates folders._

Happy theming!