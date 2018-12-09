var gulp = require('gulp');

gulp.task('default', ['scripts', 'lint', 'styles'], function() {});

gulp.task('scripts', function() {
  var concat = require('gulp-concat');
  var stripDebug = require('gulp-strip-debug');
  var uglify = require('gulp-uglify');

  var files = [
    'js/src/jquery-3.3.1.min.js',
    'js/src/bootstrap.min.js',
    'js/src/global.js'
  ];

  gulp.src(files)
    .pipe(concat('flexy.js'))
    //.pipe(stripDebug())
    //.pipe(uglify())
    .pipe(gulp.dest('js/dist'));
});


gulp.task('styles', function() {
  var concat = require('gulp-concat');
  var autoprefix = require('gulp-autoprefixer');
  var minifyCSS = require('gulp-clean-css');

  var files = [
    'css/bootstrap.min.css',
    'css/open-iconic-bootstrap.min.css',
    'css/global.css'
  ];

  gulp.src(files)
    .pipe(concat('flexy.min.css'))
    .pipe(autoprefix('last 4 versions'))
    .pipe(minifyCSS())
    .pipe(gulp.dest('css/dist/'));
});

gulp.task('watch', function() {
  var watch = require('gulp-watch');

  gulp.watch('js/src/*.js', ['scripts']);
  gulp.watch('css/*.css', ['styles']);
});

