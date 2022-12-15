const argv = require('yargs').argv;
const cfg = require('./gulpconfig.js');
const gulp = require('gulp');
const compass = require('gulp-compass');
const concat = require('gulp-concat');
const gulpif = require('gulp-if');
const plumber = require('gulp-plumber');
const sourcemaps = require('gulp-sourcemaps');
const svgmin = require('gulp-svgmin');
const svgstore = require('gulp-svgstore');
const uglify = require('gulp-uglify');
const rename = require('gulp-rename');
const fs = require('fs');

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
gulp.task('clean', async function() {
  return fs.rmSync(cfg.paths.build, { recursive: true, force: true });
});

gulp.task('build', gulp.series(
  'clean',
  gulp.parallel(
    'svg',
    'css',
    'imgcopy',
    'js'
  )
));
