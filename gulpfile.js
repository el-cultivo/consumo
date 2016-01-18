var gulp = require('gulp');
var elixir = require('laravel-elixir');

/**
 * Copy any needed files.
 *
 * Do a 'gulp copyfiles' after bower updates
 */
gulp.task("copyfiles", function() {

  gulp.src("vendor/bower_dl/jquery/dist/jquery.js")
    .pipe(gulp.dest("resources/assets/js/"));

  gulp.src("vendor/bower_dl/bootstrap-sass/assets/stylesheets/**")
    .pipe(gulp.dest("resources/assets/sass/bootstrap"));

  gulp.src("vendor/bower_dl/bootstrap-sass/assets/javascripts/bootstrap.js")
    .pipe(gulp.dest("resources/assets/js/"));

  gulp.src("vendor/bower_dl/bootstrap-sass/assets/fonts/**")
    .pipe(gulp.dest("public/fonts"));

  gulp.src("vendor/bower_dl/font-awesome/scss/**")
      .pipe(gulp.dest("resources/assets/sass/font-awesome"));

  gulp.src("vendor/bower_dl/font-awesome/fonts/**")
      .pipe(gulp.dest("public/fonts"));

});

/**
 * Default gulp is to run this elixir stuff
 */
elixir(function(mix) {

  // Combine scripts
  mix.scripts([
      'js/jquery.js',
      'js/bootstrap.js'
    ],
    'public/assets/js/all-dependencies.js',
    'resources/assets'
  );

  // Compile Sass
  mix.sass('app.scss');
});