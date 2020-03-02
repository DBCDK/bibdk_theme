/**
 * @file
 * This is where we define our gulp tasks
 * Configuration os found in gulpconfig.js
 *
 * @see gulpconfig.js
 */

var argv = require('yargs').argv;
var cfg = require('./gulpconfig.js');
var del = require('del');
var gulp = require('gulp');
var compass = require('gulp-compass');
var concat = require('gulp-concat');
var gulpif = require('gulp-if');
var plumber = require('gulp-plumber');
var sourcemaps = require('gulp-sourcemaps');
var svgmin = require('gulp-svgmin');
var svgstore = require('gulp-svgstore');
var uglify = require('gulp-uglify');
var rename = require('gulp-rename');
var svgo = require('svgo');

// Build CSS with compass
gulp.task('css', function() {
  return gulp.src(cfg.paths.css.src)
    .pipe(plumber())
    .pipe(compass(cfg.settings.compass));
});

// Compile SVG files
gulp.task('svg', function () {
  return gulp.src(cfg.paths.svg.src)
    .pipe(rename({prefix: 'svg-'}))
    .pipe(svgmin(function () {
      return {
        plugins: [
          {cleanupIDs: false},                  // don't remove  ids
          {removeViewBox: false},               // don't remove the viewbox atribute from the SVG
          {removeUselessStrokeAndFill: false},  // don't remove Useless Strokes and Fills
          {removeEmptyAttrs: false}             // don't remove Empty Attributes from the SVG
        ],
        js2svg: {
          pretty: true
        }
      };
    }))
    .pipe(svgstore({ inlineSvg: true }))
    .pipe(rename("images.svg"))
    .pipe(gulp.dest(cfg.paths.svg.dest));
});

// Copy images
gulp.task('imgcopy', function() {
  return gulp.src(cfg.paths.imgcopy.src)
    .pipe(gulp.dest(cfg.paths.imgcopy.dest));
});

// Concatenate JavaScript files
gulp.task('js', function(callback) {
  //concatenating header
  gulp.src(cfg.paths.js.header_src)
    .pipe(concat('header.js'))
    .pipe(sourcemaps.init())
    .pipe(gulpif(argv.production, uglify()))
    .pipe(gulpif(!argv.production, sourcemaps.write('./')))
    .pipe(gulp.dest(cfg.paths.js.dest));

  //concatenating footer
  gulp.src(cfg.paths.js.footer_src)
    .pipe(concat('footer.js'))
    .pipe(sourcemaps.init())
    .pipe(gulpif(argv.production, uglify()))
    .pipe(gulpif(!argv.production, sourcemaps.write('./')))
    .pipe(gulp.dest(cfg.paths.js.dest));

  //concatenating libs
  gulp.src(cfg.paths.js.lib_src)
    .pipe(concat('libs.js'))
    .pipe(sourcemaps.init())
    .pipe(gulpif(argv.production, uglify()))
    .pipe(gulpif(!argv.production, sourcemaps.write('./')))
    .pipe(gulp.dest(cfg.paths.js.dest));

  //concatenating foundation
  gulp.src(cfg.paths.foundation.js)
    .pipe(concat('foundation-concatenated.js'))
    .pipe(sourcemaps.init())
    .pipe(gulpif(argv.production, uglify()))
    .pipe(gulpif(!argv.production, sourcemaps.write('./')))
    .pipe(gulp.dest(cfg.paths.js.dest));

  callback();
});

// Clean up the build directory
gulp.task('clean', function() {
  return del([cfg.paths.build], {
    force: true
  });
});

// Build
gulp.task('build', gulp.series(
  'clean',
  'svg',
  'css',
  'imgcopy',
  'js'
));
