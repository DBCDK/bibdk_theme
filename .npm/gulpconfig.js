var gulputil = require('gulp-util');

var cfg = {};

cfg.paths = {
  libs: "../libs",
  app: "../app",
  build: "../build"
};

cfg.paths.svg = {
  src: "../img/svg/*.svg",
  dest: cfg.paths.build + "/img"
};



module.exports = cfg;
