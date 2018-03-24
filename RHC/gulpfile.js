var gulp = require('gulp');
var sass = require('gulp-sass');
var auto = require('gulp-autoprefixer');
var plmb = require('gulp-plumber');

var i = 1;

gulp.task('default', [ 'watch', 'count' ]);

gulp.task('watch', function () {
  gulp.watch([
    '_scss/*.scss',
    '_scss/**/*.scss',
    '_scss/**/**/*.scss',
    '_scss/**/**/**/*.scss',
    '_scss/**/**/**/**/*.scss'
  ], ['scss', 'count' ]);
});

gulp.task('scss', function () {
  gulp.src('_scss/index.scss')
    .pipe(plmb())
    .pipe(sass({ outputStyle: 'compressed' }))
    .pipe(auto())
    .pipe(gulp.dest('assets/css'))
  ;
});

gulp.task('count', function () {
  console.log(' ');
  console.log('O número do processo atual é: ' + i + '.');
  console.log(' ');
  
  i++;
});
