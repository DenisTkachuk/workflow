var gulp = require('gulp');
var gutil = require('gulp-util');

var uglify = require('gulp-uglify');
var scss   = require('gulp-sass');

gulp.task('js', function() {
    return gulp.src('assets/vendor/modernizr/modernizr.js')
        .pipe(uglify())
        .pipe(gulp.dest('web/js/vendor'));
});

gulp.task('scss', function() {
    return gulp.src('assets/scss/*.scss')
        .pipe(scss())
        .pipe(gulp.dest('web/css'));
});

gulp.task('watch', function() {
    gulp.watch('assets/scss/**/*.scss', ['scss']);
});

gulp.task('default', ['js', 'scss']);
