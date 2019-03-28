const gulp = require('gulp');

// styles
const sass = require('gulp-sass');
const autoprefixer = require('gulp-autoprefixer');
const stylelint = require('gulp-stylelint');
const tildeImporter = require('node-sass-tilde-importer');

// scripts
const babel = require('gulp-babel');
const uglify = require('gulp-uglify');

// translations
const wpPot = require('gulp-wp-pot');
const sort = require('gulp-sort');

// other
const sourcemaps = require('gulp-sourcemaps');
const merge = require('gulp-merge');
const concat = require('gulp-concat');
const browserSync = require('browser-sync').create();
const reload = browserSync.reload;

function handleError(err) {
  console.error(err.toString());
  this.emit('end');
}

const project = 'skelvy';
const projectURL = 'localhost:8000';
const themePath = './wp-content/themes/' + project + '/';
const librariesPath = 'assets/libraries/';
const wordpressCSSPath = 'assets/styles/wordpress.css';
const text_domain = 'skelvy';
const translationFile = 'skelvy.pot';
const translationDestination = 'languages';
const packageName = 'skelvy';
const bugReport = 'https://rafalschmidt.com';
const lastTranslator = 'Rafał Schmidt <rafalschmidt97@gmail.com>';
const team = 'Skelvy <contact.skelvy@gmail.com>';

gulp.task('styles', () => {
  const wordpress = gulp.src(themePath + wordpressCSSPath);

  const app = gulp.src([
    themePath + 'assets/**/*.scss',
    themePath + 'template-parts/**/*.scss',
    themePath + 'views/**/*.scss'
  ])
      .pipe(stylelint({
        failAfterError: false,
        reporters: [
          {formatter: 'string', console: true},
        ],
      }))
      .pipe(sourcemaps.init({loadMaps: true}))
      .pipe(sass({
        outputStyle: 'compressed',
        importer: tildeImporter
      }))
      .on('error', sass.logError)
      .pipe(autoprefixer({
        browsers: ['last 2 version',
          '> 1%',
          'ie >= 9',
          'ie_mob >= 10',
          'ff >= 30',
          'chrome >= 34',
          'safari >= 7',
          'opera >= 23',
          'ios >= 7',
          'android >= 4',
          'bb >= 10'
        ],
      }));

  return merge(wordpress, app)
      .pipe(sourcemaps.init({loadMaps: true}))
      .pipe(concat('style.css'))
      .pipe(sourcemaps.write())
      .pipe(gulp.dest(themePath))
      .pipe(browserSync.stream());
});

gulp.task('scripts', () => {
  const jquery = gulp.src('./node_modules/jquery/dist/jquery.min.js');
  const popper = gulp.src('./node_modules/popper.js/dist/umd/popper.min.js');
  const bootstrap = gulp.src('./node_modules/bootstrap/dist/js/bootstrap.min.js');
  const photoswipe = gulp.src('./node_modules/photoswipe/dist/photoswipe.min.js');
  const photoswipeUI = gulp.src('./node_modules/photoswipe/dist/photoswipe-ui-default.min.js');
  const store = gulp.src('./node_modules/store/dist/store.everything.min.js');

  const app = gulp.src([
    themePath + 'assets/**/*.js',
    themePath + 'template-parts/**/*.js'
  ])
      .pipe(sourcemaps.init({loadMaps: true}))
      .pipe(babel({
        presets: ['env'],
      }))
      .on('error', handleError)
      .pipe(uglify())
      .on('error', handleError);

  return merge(jquery, popper, bootstrap, photoswipe, photoswipeUI, store, app)
      .pipe(sourcemaps.init({loadMaps: true}))
      .pipe(concat('scripts.js'))
      .pipe(sourcemaps.write())
      .pipe(gulp.dest(themePath));
});

gulp.task('sync', () => {
  browserSync.init({
    proxy: projectURL,
    open: false,
    injectChanges: true
  });
});

gulp.task('copy', function () {
  return gulp.src([
    './node_modules/@fortawesome/fontawesome-free/webfonts/*',
    './node_modules/photoswipe/src/css/default-skin/*'
  ])
      .pipe(gulp.dest(themePath + librariesPath))
});

gulp.task('translate', function () {
  return gulp.src([
    themePath + '**/*.php',
  ])
      .pipe(sort())
      .pipe(wpPot({
        domain: text_domain,
        package: packageName,
        bugReport: bugReport,
        lastTranslator: lastTranslator,
        team: team
      }))
      .pipe(gulp.dest(themePath + translationDestination + '/' + translationFile));
});

gulp.task('default', ['styles', 'scripts', 'sync'], () => {
  gulp.watch(themePath + '**/*.scss', ['styles']);
  gulp.watch(themePath + '**/*.js', ['scripts', reload]);
  gulp.watch(themePath + '**/*.php', reload);
  gulp.watch([
    themePath + '**/*.jpg',
    themePath + '**/*.png',
  ], reload);
});