module.exports = function(grunt) {
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        modernizr: {
          dist: {
            "crawl": false,  
            "customTests": [],
            "dest": "js/vendors/modernizr.js",
            "tests": [
                "input",
                "inputtypes",
                "svg",
                "backgroundblendmode"
            ],
            "options": [
                "setClasses"
            ],
            "uglify": true
          }
        },
        concat: {
            js: {
                src: ['js/dep/jquery.min.js', 'js/vendors/*.js'],
                dest: 'js/build/vendors.js',
            }
        },
        uglify: {
            app: {
                src: 'js/build/app.js',
                dest: 'js/build/app.min.js'
            },
            vendors: {
                src: 'js/build/vendors.js',
                dest: 'js/build/vendors.js'
            }
        },
        sass: {
            dist: {
                options: {
                    style: 'compressed'
                },
                files: {
                    'style.css': 'style.scss'
                }
            } 
        },
        watch: {
            options: {
                livereload: {
                    host: 'localhost',
                    port: 35729
                }
            },
            css: {
                files: ['*.scss'],
                tasks: ['sass'],
                options: {
                    spawn: false,
                }
            },
            scripts: {
                files: ['js/**/*.js'],
                tasks: ['concat', 'uglify'],
                options: {
                    spawn: false,
                },
            }
        }
    });
    grunt.loadNpmTasks("grunt-modernizr");
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.registerTask('default', ['watch']);
};