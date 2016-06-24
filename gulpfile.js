var gulp = require('gulp');
var del = require('del');
var rename = require('gulp-rename');
var uglify = require('gulp-uglify');
var cssmin = require('gulp-cssmin');
var imagemin = require('gulp-imagemin');
var htmlmin = require('gulp-htmlmin');

gulp.task('clean:js', function () {
    del([
        'public/js/*.js'
    ]);
});

gulp.task('clean:css', function () {
    del([
        'public/css/*.css'
    ]);
});

gulp.task('js', function() {
    gulp.src('assets/js/*.js')
        .pipe(uglify())
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest('public/js/'));
});

gulp.task('css', function () {
    gulp.src('assets/css/*.css')
        .pipe(cssmin())
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest('public/css/'));
});

gulp.task('optimize', function() {
        gulp.src('assets/img/*')
            .pipe(imagemin())
            .pipe(gulp.dest('public/img/'))
    }
);

gulp.task('html', function() {
    gulp.src('assets/html/*.html')
        .pipe(htmlmin({collapseWhitespace: true}))
        .pipe(gulp.dest('public/'))
});

gulp.task('watch', function () {
    gulp.watch('assets/js/*.js', ['clean:js', 'js']);
    gulp.watch('assets/css/*.css', ['clean:css', 'css']);
    gulp.watch('assets/html/*.html', ['html']);
    gulp.watch('assets/img/*.jpg', ['img']);
});

gulp.task('default', ['clean:js', 'clean:css', 'js', 'css', 'html']);

gulp.task('img', ['optimize']);