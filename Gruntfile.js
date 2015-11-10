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
        imagemin: {
            dynamic: {
                files: [{
                    expand: true,
                    cwd: 'assets/img/',
                    src: ['**/*.{png,jpg,gif}'],
                    dest: 'public/img/'
                }]
            }
        },
        watch: {
            scripts: {
                files: ['assets/**/*'],
                tasks: ['concat', 'uglify', 'cssmin', 'htmlmin', 'imagemin', 'clean'],
                options: {
                    spawn: false
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
    grunt.loadNpmTasks('grunt-contrib-imagemin');
    grunt.loadNpmTasks('grunt-contrib-watch');

    grunt.registerTask('build', ['concat', 'uglify', 'cssmin', 'htmlmin', 'imgmin', 'clean']);

};
