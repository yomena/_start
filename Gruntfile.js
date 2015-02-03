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
      'assets/css/main.css': [
      'assets/less/main.less'
      ]
    }
  }
  },

//minify css
    cssmin: {


      target: {
    files: [{
      expand: true,
      cwd: 'assets/css',
      src: ['*.css', '!*.min.css'],
      dest: 'assets/css',
      ext: '.min.css'
    }]
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
        files: ['assets/less/*.less', '*.php', 'inc/*.php'],
        tasks: ['less',
        'cssmin'
        ],
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
