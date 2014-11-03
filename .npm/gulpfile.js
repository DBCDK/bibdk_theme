var cfg          = require('./gulpconfig.js');
var del          = require('del');
var gulp         = require('gulp');
var autoprefixer = require('gulp-autoprefixer');
var compass      = require('gulp-compass');
var concat       = require('gulp-concat');
var jshint       = require('gulp-jshint');
var plumber      = require('gulp-plumber');
var svgmin       = require('gulp-svgmin');
var svgstore     = require('gulp-svgstore');
var uglify       = require('gulp-uglify');
var gutil        = require('gulp-util');
var watch        = require('gulp-watch');
var runSequence  = require('run-sequence');





// Compile SVG files
gulp.task('svg', function () {
  return gulp.src(cfg.paths.svg.src)
    .pipe(plumber())
    .pipe(svgmin())
    .pipe(svgstore({
      fileName: 'images.svg',
      prefix: 'svg-',
      inlineSvg: true
    }))
    .pipe(gulp.dest(cfg.paths.svg.dest));
});




// Clean up the build directory
gulp.task('clean', function () {
  del([cfg.paths.build], {
    force: true
  });
})

// Watch
gulp.task('watch', ['build'], function () {
  gulp.watch(cfg.paths.svg.src, ['svg']);
});

// Build
gulp.task('build', function () {
  runSequence('clean', 'svg');
});

// Default
gulp.task('default', function () {
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
