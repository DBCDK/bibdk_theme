var cfg = import('./gulpconfig.js');
import gulp from 'gulp';
import less from 'gulp-less';
import babel from 'gulp-babel';
import concat from 'gulp-concat';
import uglify from 'gulp-uglify';
import rename from 'gulp-rename';
import cleanCSS from 'gulp-clean-css';
import {deleteAsync} from 'del';

/*
 * For small tasks you can export arrow functions
 */
export const clean = () => deleteAsync([ 'assets' ]);

/*
 * You can also declare named functions and export them as tasks
 */
export function styles() {
  return gulp.src(cfg.styles.src)
    .pipe(less())
    .pipe(cleanCSS())
    // pass in options to the stream
    .pipe(rename({
      basename: 'main',
      suffix: '.min'
    }))
    .pipe(gulp.dest(cfg.styles.dest));
}

export function scripts() {
  return gulp.src(cfg.scripts.src, { sourcemaps: true })
    .pipe(babel())
    .pipe(uglify())
    .pipe(concat('main.min.js'))
    .pipe(gulp.dest(cfg.scripts.dest));
}

/*
 * You could even use `export as` to rename exported tasks
 */
function watchFiles() {
  gulp.watch(cfg.scripts.src, scripts);
  gulp.watch(cfg.styles.src, styles);
}
export { watchFiles as watch };

export function build() { gulp.series(clean, gulp.parallel(styles, scripts)); }
/*
 * Export a default task
 */
export default build;
