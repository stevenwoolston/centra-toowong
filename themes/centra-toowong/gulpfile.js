var gulp = require("gulp"),
    sass = require("gulp-sass"),
    uglify = require("gulp-uglify"),
    rename = require("gulp-rename"),
    sourcemaps = require("gulp-sourcemaps"),
    autoprefixer = require("gulp-autoprefixer"),
    livereload = require('gulp-livereload');

gulp.task('watch', function() {
    livereload.listen();
    gulp.watch( './**/*.php' ).on( 'change', function( file ) {
        livereload.changed( file );
      } );
    gulp.watch("js/**/*.js", gulp.series(['js']));
    gulp.watch("sass/**/*.scss", gulp.series(['sass']));
});

gulp.task("sass", function () {
    return gulp.src("sass/style.scss")
        .pipe(sourcemaps.init())
        .pipe(sass({
            outputStyle: 'compressed'
        }))
        // .pipe(sass())
        .pipe(rename({
            suffix: ".min"
        }))
        .pipe(sourcemaps.write())
        .pipe(gulp.dest("css/"))
        .pipe(livereload());
});

gulp.task("js", function () {

    return gulp.src(["js/core.js"])
        .pipe(sourcemaps.init())
        .pipe(uglify())
        .pipe(rename({
            suffix: ".min"
        }))
        .pipe(sourcemaps.write())
        .pipe(gulp.dest("./js/"))
        .pipe(livereload());
});