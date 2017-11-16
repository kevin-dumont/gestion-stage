// Configuration
var server = 'dev.projet-symfony.fr/app_dev.php/';
var srcDirectory = 'dist/';
var destDirectory = 'web/assets/';

// Dependencies
var gulp = require('gulp');
var watch = require('gulp-watch');
var sass = require('gulp-sass');
var browserSync = require('browser-sync').create();
var autoprefixer = require('gulp-autoprefixer');
var cleanCSS = require('gulp-clean-css');
var babelify = require('babelify');
var browserify = require('browserify');
var buffer = require('vinyl-buffer');
var source = require('vinyl-source-stream');
var uglify = require('gulp-uglify');
var sourcemaps = require('gulp-sourcemaps');

// Compile Js
gulp.task('js', function () {
    // ES6
    var bundler = browserify(srcDirectory + 'js/ES6/app.js');

    bundler.transform(babelify.configure({
        presets: ["env"]
    }));

    bundler.bundle()
        .on('error', function (err) {
            console.error(err);
            this.emit('end');
        })
        .pipe(source('app.js'))
        .pipe(buffer())
        .pipe(sourcemaps.init({loadMaps: true}))
        .pipe(uglify())
        .pipe(sourcemaps.write('./'))
        .pipe(gulp.dest(destDirectory + 'js/'))
        .pipe(browserSync.stream());

    // ES5
    gulp.src(srcDirectory + 'js/ES5/**')
        .pipe(uglify())
        .pipe(gulp.dest(destDirectory + 'js/'));
});

// Compile Sass
gulp.task('sass', function () {
    gulp.src(srcDirectory + 'sass/*.scss')
        .pipe(sass({style: 'compressed'}))
        .on('error', function (error) {
            console.log(error.toString());
            this.emit('end');
        })
        .pipe(autoprefixer({
            browsers: ['last 5 versions'],
            cascade: false
        }))
        .pipe(cleanCSS({compatibility: 'ie8'}))
        .pipe(gulp.dest(destDirectory + 'css/'))
        .pipe(browserSync.stream());
});

// Watching files
gulp.task('watch', ['sass'], function () {

    // Init browsersync
    browserSync.init({
        proxy: server
    });

    // Running tasks
    gulp.watch(srcDirectory + 'js/**', ['js']);
    gulp.watch(srcDirectory + 'sass/**', ['sass']);
    gulp.watch(srcDirectory + 'img/**', ['copyImages']);
    gulp.watch(srcDirectory + 'fonts/**', ['copyFonts']);

    // Reloading
    gulp.watch('app/Resources/views/**.twig').on('change', browserSync.reload);
    //gulp.watch(srcDirectory + 'js/**').on('change', browserSync.reload);
    //gulp.watch(srcDirectory + 'sass/**').on('change', browserSync.reload);
    gulp.watch(srcDirectory + 'img/**').on('change', browserSync.reload);
    gulp.watch(srcDirectory + 'fonts/**').on('change', browserSync.reload);
});

gulp.task('default', ['js', 'sass']);