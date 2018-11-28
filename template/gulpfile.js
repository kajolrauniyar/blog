'use strict';

var gulp = require('gulp');
var sass = require('gulp-sass');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var sourcemaps = require('gulp-sourcemaps');
var browserSync = require('browser-sync').create();
var reload = browserSync.reload;
var minifyCss = require('gulp-minify-css');
var rename = require('gulp-rename');
var stripCssComments = require('gulp-strip-css-comments')
var pump = require('pump');
var savefile = require('gulp-savefile');
gulp.task('sass', function () {
  return gulp.src('dist/sass/*.scss')
  .pipe(sourcemaps.init())
  .pipe(sass().on('error', sass.logError))
  .pipe(sourcemaps.write())
  .pipe(gulp.dest('assets/css'));
});

gulp.task('js', function (cb) {
  pump([
    gulp.src('dist/js/*.js'),    
    gulp.dest('assets/js/')
    ],
    cb
    );
});

gulp.task('compressCSS', function () {
  gulp.src('assets/css/*.css') 
  .pipe(stripCssComments())
  .pipe(minifyCss())
  .pipe(rename({
    suffix: '.min'
  }))
  .pipe(gulp.dest('assets/css/min'));
});

gulp.task('compressJS', function () {
  gulp.src('assets/js/*.js')
  .pipe(uglify())
  .pipe(rename({ suffix: '.min' }))
  .pipe(gulp.dest('assets/js/min/'))
});

gulp.task('serve', ['sass','compressCSS','js','compressJS'], function() {
  browserSync.init({
    server: "./assets"
  });
  gulp.watch('dist/sass/*.scss', ['sass']);
  gulp.watch('dist/sass/*.scss').on('change',browserSync.reload);
  gulp.watch('dist/js/*.js', ['js']);
  gulp.watch('dist/js/*.js').on('change',browserSync.reload);

  gulp.watch("assets/*.html").on('change', browserSync.reload);
});
gulp.task('default', ['serve']);

