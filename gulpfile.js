var gulp = require("gulp");
var sass = require("gulp-sass");
var compass = require('gulp-compass');
// var cssmin = require('gulp-cssmin');
// var rename = require('gulp-rename');
var autoprefixer = require("gulp-autoprefixer");
var frontnote = require("gulp-frontnote");
var uglify = require("gulp-uglify");
var browser = require("browser-sync");
var plumber = require("gulp-plumber");
var pleeease = require("gulp-pleeease");
var coffee = require("gulp-coffee");

// gulp.task("server", function(){
// 	browser({
// 		server: {
// 			baseDir: "./",
// 			directory: true
// 		}
// 	});
// });



function js(done){
	gulp.src(["js/**/*.js","!js/min/**/*.js"])
		.pipe(plumber())
		.pipe(uglify())
		.pipe(gulp.dest("./js/min"));
	done();
}
function run_compass(done){
    gulp.src('sass/**/*.scss')
    .pipe(plumber())
    .pipe(compass({
        config_file: 'config.rb',
        comments: false,
        css: 'css/',
        sass: 'sass/'
    }));
    done();
}
function run_coffee(done){
	gulp.src('coffee/**/*.coffee')
		.pipe(coffee())
		.pipe(gulp.dest('js/'));	
	done();
}
function ple(done){
	gulp.src('css/*.css')
    .pipe(pleeease({
        autoprefixer: ['last 4 versions'], //ベンダープレフィックス
        minifier: false //圧縮の有無 true/false
    }))
    .pipe(gulp.dest('css/'));
    done();
}

gulp.task("js", js);
// gulp.task("sass", sass);
gulp.task("compass", run_compass);
gulp.task("ple", ple);
gulp.task("coffee", run_coffee);

function watch_files(){
	gulp.watch(["js/**/*.js","!js/min/**/*.js"], js);
	gulp.watch("sass/**/*.scss", gulp.series('compass','ple'));
	gulp.watch("coffee/**/*.coffee", run_coffee);
}
gulp.task("watch", watch_files);

gulp.task("default", watch_files);
