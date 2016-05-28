module.exports = function (grunt) {

    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        clean: {
            css: ['public/css/*.css'],
            js: ['public/js/*.js']
        },
        concat: {
            css: {
                src: 'assets/css/main.css',
                dest: 'public/css/main.css'
            },
            js: {
                src: 'assets/js/main.js',
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
        copy: {
            main: {
                expand: true,
                flatten: true,
                src: 'assets/html/index.html',
                dest: 'public/'
            }
        },
        cacheBust: {
            options: {
                baseDir: 'public/',
                assets: ['js/main.min.js', 'css/main.min.css'],
                deleteOriginals: true
            },
            src: ['public/index.html']
        },
        htmlmin: {
            options: {
                removeComments: true,
                collapseWhitespace: true
            },
            dist: {
                files: {
                    'public/index.html': 'public/index.html'
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
                tasks: ['clean', 'concat', 'uglify', 'cssmin', 'copy', 'cacheBust', 'htmlmin', 'imagemin'],
                options: {
                    spawn: false
                }
            }
        }
    });

    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-cache-bust');
    grunt.loadNpmTasks('grunt-contrib-htmlmin');
    grunt.loadNpmTasks('grunt-contrib-clean');
    grunt.loadNpmTasks('grunt-contrib-imagemin');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-copy');

    grunt.registerTask('build', ['clean', 'concat', 'uglify', 'cssmin', 'copy', 'cacheBust', 'htmlmin', 'imagemin']);

};
