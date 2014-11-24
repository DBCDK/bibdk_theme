/**
 * @file
 * This is where we define parameters for our tasks
 * Tasks is found in gulpfile.js
 *
 * @see gulpfile.js
 */

var argv = require('yargs').argv;
var path = require('path');

var cfg = {
  paths: {},
  settings: {}
};

cfg.paths.project = path.join(__dirname, '..');
cfg.paths.libs = cfg.paths.project + "/libs";
cfg.paths.build = cfg.paths.project + "/build";
cfg.paths.foundation_js = cfg.paths.project + "/libs/foundation/js";

cfg.paths.svg = {
  src: cfg.paths.project + "/img/svg/*.svg",
  dest: cfg.paths.build + "/img"
};

cfg.paths.css = {
  src: cfg.paths.project + "/sass/**/*.scss",
  dest: cfg.paths.build + "/css"
};

cfg.paths.imgcopy = {
  src: cfg.paths.project + "/img/in_use/**/*",
  dest: cfg.paths.build + "/img/in_use"
};

cfg.paths.js = {
  footer_src: cfg.paths.project + "/js/bibdk/footer/*.js",
  header_src: cfg.paths.project + "/js/bibdk/header/*.js",
  lib_src: cfg.paths.project + "/js/lib/*.js",
  js_root: cfg.paths.project + "/js/**/*.js",
  dest: cfg.paths.build + "/js"
};

//Foundation JS libraries should be included below
cfg.paths.foundation = {
  js: [
    cfg.paths.foundation_js + "/foundation.js",
    cfg.paths.foundation_js + "/foundation/foundation.offcanvas.js",
    cfg.paths.foundation_js + "/vendor/fastclick.js"
  ]
};

cfg.settings.compass = {
  project: cfg.paths.project,
  sass: 'sass',
  css: 'build/css',
  image: 'img',
  sourcemap: (argv.production) ? false : true,
  comments: (argv.production) ? false : true,
  style: (argv.production) ? 'compressed' : 'expanded',
  generated_images_path: 'build/img',
  import_path: ['libs/foundation/scss']
};

cfg.settings.svgstore = {
  fileName: 'images.svg',
  prefix: 'svg-',
  inlineSvg: true
};

module.exports = cfg;
