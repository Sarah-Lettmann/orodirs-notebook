var gulp = require('gulp');
var sass = require('gulp-sass');
var browserSync = require('browser-sync').create();

gulp.task('sass', function(){
  return gulp.src('site/sass/styles.scss')
    .pipe(sass()) // Converts Sass to CSS with gulp-sass
    .pipe(gulp.dest('site/css'))
});

gulp.task('watch', function(){
  gulp.watch('site/sass/**/*.scss', gulp.series('sass'));
  // Other watchers
});
