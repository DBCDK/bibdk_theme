/**
 * @file
 * This is where we define our gulp tasks
 * Configuration os found in gulpconfig.js
 *
 * @see gulpconfig.js
 */

var cfg = import('./gulpconfig.js');

import {deleteAsync} from 'del';
import argv from "yargs";
import gulp from "gulp";
import compass from "gulp-compass";
import concat from "gulp-concat";
import gulpif from "gulp-if";
import plumber from "gulp-plumber";
import sourcemaps from "gulp-sourcemaps";
import svgmin from "gulp-svgmin";
import svgstore from "gulp-svgstore";
import uglify from "gulp-uglify";
import rename from "gulp-rename";

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
  return deleteAsync([cfg.paths.build], {
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
