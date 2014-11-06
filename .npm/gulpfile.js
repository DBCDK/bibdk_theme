/**
 * @file
 * This is where we define our gulp tasks
 */

var cfg = require('./gulpconfig.js');
var del = require('del');
var gulp = require('gulp');
var compass = require('gulp-compass');
var concat = require('gulp-concat');
var gulpif = require('gulp-if');
var jshint = require('gulp-jshint');
var plumber = require('gulp-plumber');
var sourcemaps = require('gulp-sourcemaps');
var svgmin = require('gulp-svgmin');
var svgstore = require('gulp-svgstore');
var uglify = require('gulp-uglify');
var gutil = require('gulp-util');
var watch = require('gulp-watch');
var path = require('path');
var runSequence = require('run-sequence');

// Build CSS with compass
gulp.task('css', function() {
  return gulp.src(cfg.paths.css.src)
    .pipe(plumber())
    .pipe(compass(cfg.settings.compass));
});

// Compile SVG files
gulp.task('svg', function() {
  return gulp.src(cfg.paths.svg.src)
    .pipe(plumber())
    .pipe(svgmin())
    .pipe(svgstore(cfg.settings.svgstore))
    .pipe(gulp.dest(cfg.paths.svg.dest));
});

// Copy images
gulp.task('imgcopy', function() {
  return gulp.src("../img/in_use/**/*")
    .pipe(gulp.dest("../build/img/in_use"));
});

// Clean up the build directory
gulp.task('clean', function (cb) {
  del([cfg.paths.build], {
    force: true
  }, cb);
})
// Concatenate JavaScript files
gulp.task('concat-js', function(){
  //concatenating footer
  gulp.src(cfg.paths.js.footer_src)
  .pipe(concat('footer.js'))
  .pipe(gulp.dest(cfg.paths.js.dest));
});

// Clean up the build directory
gulp.task('clean', function() {
  del([cfg.paths.build], {
    force: true
  });
});

// Watch
gulp.task('watch', ['build'], function() {
  gulp.watch(cfg.paths.css.src, ['css']);
  gulp.watch(cfg.paths.svg.src, ['svg']);
});

// Build
gulp.task('build', ['clean'], function () {
  gulp.start('svg');
  gulp.start('css');
  gulp.start('imgcopy');
});

// Default
gulp.task('default', function() {
  console.log("#########################################");
  console.log(" ");
  console.log("  To start developing:");
  console.log("  'gulp watch'");
  console.log(" ");
  console.log("  To build a package:");
  console.log("  'grunt build'");
  console.log(" ");
  console.log("#########################################");
});
