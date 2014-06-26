/*global module:false*/
module.exports = function (grunt) {

    // Project configuration.
    grunt.initConfig({
        // Task configuration.
        concat: {
            options: {
                stripBanners: true
            },
            main: {
                src: ['js/src/main.js'],
                dest: 'js/build/main.js'
            }
        },
        uglify: {
            gallery: {
                src: '<%= concat.main.dest %>',
                dest: 'js/main.min.js'
            }
        },
        jshint: {
            options: {
                curly: true,
                eqeqeq: true,
                immed: true,
                latedef: true,
                newcap: true,
                noarg: true,
                sub: true,
                undef: true,
                unused: true,
                boss: true,
                eqnull: true,
                browser: true,
                globals: {
                    jQuery: true,
                    Modernizr: true
                }
            },
            gruntfile: {
                src: 'Gruntfile.js'
            },
            lib_test: {
                src: ['js/src/*.js']
            }
        },
        sass: {
            main: {
                options: {
                    style: 'compressed',
                    sourcemap: true
                },
                files: {
                    'style.css': 'style.scss'
                }
            }
        },
        autoprefixer: {
            options: {
                browsers: ['last 2 version', '> 1%', 'Explorer 9']
            },
            css: {
                src: 'style.css'
            }
        },
        watch: {
            sass: {
                files: ['*.scss', '**/*.scss'],
                tasks: ['styles']
            },
            js: {
                files: ['js/src/*.js'],
                tasks: ['concat', 'uglify']
            }
        }
    });

    // These plugins provide necessary tasks.
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-jshint');
    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-autoprefixer');

    // Default task.
    grunt.registerTask('default', ['build']);
    grunt.registerTask('styles', ['sass', 'autoprefixer']);
    grunt.registerTask('build', ['styles', 'jshint', 'concat', 'uglify']);
};
