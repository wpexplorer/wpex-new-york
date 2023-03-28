"use strict";

const themeName = 'wpex-new-york';
const url       = 'localhost/new-york';

const { series, parallel } = require( 'gulp' );

const gulp        = require( 'gulp' );
const del         = require( 'del' );
const concat      = require( 'gulp-concat' );
const uglify      = require( 'gulp-uglify' );
const watch       = require( 'gulp-watch' );
const zip         = require( 'gulp-zip' );
const rename      = require( 'gulp-rename' );
//const replace     = require( 'gulp-replace' );
//const browsersync = require( 'browser-sync' ).create();

var jsToCombine = [
	'./assets/js/lib/*.js',
	'./assets/js/functions.js',
];

// BrowserSync
function browserSync( done ) {
	browsersync.init( {
		proxy         : url,
		injectChanges : true
	} );
	done();
}

// BrowserSync Reload
function browserSyncReload( done ) {
	browsersync.reload( {
		stream: true
	} );
	done();
}

// JS functions
function js( done ) {
	combineJs();
	done();
}

// Combine Javascript
function combineJs( done ) {
	return gulp
	.src( jsToCombine )
	.pipe( concat( 'theme.min.js' ) )
	.pipe( uglify() )
	.pipe( gulp.dest( './assets/js/' ) );
	done();
}

// Watch for file changes and run tasks accordingly
function watchFiles( done ) {
	gulp.watch( jsToCombine, gulp.series( combineJs ) );
	done();
}

// Zip files
function zipTheme( done ) {
	return gulp
	.src( [
		'./**/*',
		'!./{node_modules,node_modules/**/*}',
		'!./{assets/sass,assets/sass/**/*}',
		'!./gulpfile.js',
		'!./package.json',
		'!./package-lock.json',
		'!./.gitignore',
		'!./.gist/**',
		'!./.DS_Store/**',
	] )
	.pipe( zip( themeName + '.zip' ) )
	.pipe( gulp.dest( './dist' ) );
	done();
}

// Tasks
gulp.task( 'js', js );
gulp.task( 'zip', zipTheme );

// Build
gulp.task( 'build', gulp.series( combineJs, zipTheme ) );

// Watch
gulp.task( 'watch', watchFiles );