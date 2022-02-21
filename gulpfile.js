const { dest, src, series, watch: gulpWatch } = require('gulp');
const browserSync = require('browser-sync').create();
const postcss = require('gulp-postcss');
const postcssImport = require('postcss-import');
const tailwindcss = require('tailwindcss');
const autoprefixer = require('autoprefixer');
const sass = require('gulp-sass')(require('sass'));
const cssnano = require('cssnano');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');

function scss() {
  return src('./src/styles/scss.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(dest('./src/styles/'));
}

function tw() {
  var plugins = [postcssImport(), tailwindcss(), autoprefixer(), cssnano()];
  return src('./src/styles/style.css')
    .pipe(postcss(plugins))
    .pipe(dest('./theme/'));
}

function scripts() {
  return src(['./src/js/vendor/*.js', './src/js/custom/*.js'])
    .pipe(concat('main.js'))
    .pipe(uglify())
    .pipe(dest('./theme/'));
}

function serve(done) {
  browserSync.init({
    proxy: 'localhost:8888',
    open: true
  });
  done();
}

function reload(done) {
  browserSync.reload();
  done();
}

const watch = () => {
  gulpWatch('./theme/**/*.php', series(tw, reload));
  gulpWatch('./theme/**/*.js', series(tw, reload));
  gulpWatch('./src/js/**/*.js', series(scripts, reload));
  gulpWatch('./tailwind.config.js', series(tw, reload));
  gulpWatch('./src/styles/**/*.scss', series(scss));
  gulpWatch('./src/styles/**/*.css', series(tw, reload));
};

exports.default = series(scss, tw, scripts, serve, watch);
