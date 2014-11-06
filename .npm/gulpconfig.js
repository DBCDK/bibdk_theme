/**
 * @file
 * This is where we define parameters for our tasks
 */

var gulputil = require('gulp-util');
var path = require('path');

var cfg = {
  paths: {},
  settings: {}
};

cfg.paths.project = path.join(__dirname, '..');
cfg.paths.libs = cfg.paths.project + "/libs";
cfg.paths.build = cfg.paths.project + "/build";

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
  dest: cfg.paths.build + "/js"
};

cfg.settings.compass = {
  project: cfg.paths.project,
  sass: 'sass',
  css: 'build/css',
  image: 'img',
  generated_images_path: 'build/img',
  import_path: ['libs/foundation/scss']
};

cfg.settings.svgstore = {
  fileName: 'images.svg',
  prefix: 'svg-',
  inlineSvg: true
};

module.exports = cfg;
