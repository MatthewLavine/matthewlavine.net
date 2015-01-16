module.exports = function (grunt) {

    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        concat: {
            css: {
                src: 'assets/css/main.css',
                dest: 'public/css/main.css'
            },
            js: {
                src: ['bower_components/jquery/dist/jquery.js', 'assets/js/main.js'],
                dest: 'public/js/main.js'
            }
        },
        uglify: {
            dist: {
                files: {
                    'public/js/main.min.js': ['public/js/main.js']
                }
            }
        },
        cssmin: {
            dist: {
                files: {
                    'public/css/main.min.css': ['public/css/main.css']
                }
            }
        },
        htmlmin: {
            options: {
                removeComments: true,
                collapseWhitespace: true
            },
            dist: {
                files: {
                    'public/index.html': 'assets/html/index.html'
                }
            }
        },
        clean: {
            css: ['public/css/*.css', '!public/css/*.min.css'],
            js: ['public/js/*.js', '!public/js/*.min.js' ]
        }
    });

    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-contrib-htmlmin');
    grunt.loadNpmTasks('grunt-contrib-clean');

    grunt.registerTask('build', ['concat', 'uglify', 'cssmin', 'htmlmin', 'clean']);

};
