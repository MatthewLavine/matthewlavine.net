"use strict";

const gulp = require('gulp');
const del = require('del');
const rename = require('gulp-rename');
const uglify = require('gulp-uglify');
const cssmin = require('gulp-cssmin');
const imagemin = require('gulp-imagemin');
const htmlmin = require('gulp-htmlmin');

function cleancss() {
    return del([
        'public/css/*.css',
    ]);
};

function cleanjs() {
    return del([
        'public/js/*.js',
    ]);
};

function js() {
    return gulp.src('assets/js/*.js')
        .pipe(uglify())
        .pipe(rename({ suffix: '.min' }))
        .pipe(gulp.dest('public/js/'));
};

function css() {
    return gulp.src('assets/css/*.css')
        .pipe(cssmin())
        .pipe(rename({ suffix: '.min' }))
        .pipe(gulp.dest('public/css/'));
};

function img() {
    return gulp.src('assets/img/*')
        .pipe(imagemin())
        .pipe(gulp.dest('public/img/'));
};

function html() {
    return gulp.src('assets/html/*.html')
        .pipe(htmlmin({ collapseWhitespace: true }))
        .pipe(gulp.dest('public/'));
};

const clean = gulp.parallel(cleancss, cleanjs);
const build = gulp.series(clean, gulp.parallel(css, js, html, img));

function watch() {
    gulp.watch("./assets/**/*", build);
}

exports.images = img;
exports.css = css;
exports.js = js;
exports.html = html;
exports.clean = clean;
exports.build = build;
exports.watch = watch;
exports.default = build;