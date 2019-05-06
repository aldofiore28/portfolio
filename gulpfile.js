var gulp = require('gulp')
var sass = require('gulp-sass')
var babel = require('gulp-babel')

gulp.task('sass', function () {
    return gulp.src('app/scss/**/*.scss')
        .pipe(sass())
        .pipe(gulp.dest('app/css'))
})

gulp.task ('babel', function () {
    return gulp.src('app/js/es6/*.js')
        .pipe(babel())
        .pipe(gulp.dest('app/js/es5'))

})

gulp.task('watch', function () {
    gulp.watch('app/scss/**/*.scss', gulp.series('sass'))
    gulp.watch('app/js/es6/*.js', gulp.series('babel'))
})