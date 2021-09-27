var gulp = require('gulp');
// var sass = require('gulp-sass');
var sass = require('gulp-sass')(require('sass'));
// var livereload = require('gulp-livereload');
var browserSync = require('browser-sync').create();

const scss_source = 'app/src/scss/*.scss';
const scss_dest = 'app/src/css/';

gulp.task('serve', ['sass'], function() {
	// browserSync.init({
	// 	server: './'
	// });
	browserSync({server: true}, function(err, bs) {
		console.log(bs.options.getIn(["urls", "local"]));
	});
	gulp.watch(scss_source, gulp.series('sass'));
	gulp.watch('./**/*.html').on('change', browserSync.reload)
});

//sass
gulp.task('sass', function () {
	return gulp.src([scss_source])
		.pipe(sass({outputStyle: 'compressed'}))
		.pipe(gulp.dest(scss_dest))
		.pipe(browserSync.stream())
		// .pipe(livereload())
	;
});

gulp.task('watch', function () {
	// livereload.listen();
	gulp.watch(scss_source, gulp.series('sass'));
});

// Default task
gulp.task('default', gulp.series('watch'));