module.exports = function(grunt) {
  "use strict";
  require("matchdep").filterDev("grunt-*").forEach(grunt.loadNpmTasks);
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),

//concat javascript
    concat: {
      dist: {
        src: [
          'bower_components/jquery/dist/jquery.min.js',
          'bower_components/bootstrap/dist/js/bootstrap.min.js',
        ],
        dest: 'assets/js/main.js',
      }
    },

//minify javascript
    uglify: {
      build: {
        src: 'assets/js/main.js',
        dest: 'assets/js/main.min.js'
      }
    },

//less to css
less: {
  dist: {
    options: {
      paths: ['assets/css']
    },
    files: {
      'assets/css/vendor.css': [
      'bower_components/bootstrap/less/bootstrap.less',
      'bower_components/fontawesome/less/font-awesome.less'
      ]
    }
  }
  },

//combine and minify css
    cssmin: {
      combine: {
        files: {
          'assets/css/main.css': [
          'assets/css/vendor.css',
          'assets/css/fixes.css'
          ]
        }
      },
      minify: {
        src: 'assets/css/main.css',
        dest: 'assets/css/main.min.css'
      }
    },


//compress images
    imagemin: {
      dynamic: {
        files: [{
          expand: true,
          cwd: 'assets/img/',
          src: ['**/*.{png,jpg,gif}'],
          dest: 'assets/img/'
        }]
      }
    },

//copy files
    copy: {
      main: {
        files: [
          // includes files within path
          {
            expand: true,
            flatten: true,
            src: [
            'bower_components/fontawesome/fonts/*'
            ],
            dest: 'assets/fonts/',
            filter: 'isFile'
          },

          {
            expand: true,
            flatten: true,
            src: [
            'bower_components/wp-bootstrap-navwalker/wp_bootstrap_navwalker.php'
            ],
            dest: 'inc/',
            filter: 'isFile'
          },

        ],
      },
    },

//watch changes
    watch: {
      options: {
        livereload: true,
      },
      scripts: {
        files: ['assets/css/*.css', '*.p'],
        tasks: [],
        options: {
          spawn: false,
        },
      }
    }

  });

//register tasks
    grunt.registerTask('default', [
      'concat',
      'uglify',
      'less',
      'cssmin',
      'imagemin',
      'copy'
  ]);

};
