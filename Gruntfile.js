module.exports = function(grunt) {

  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    concat: {
      options: {
        separator: ';'
      },
      dist: {
        src: ['files/html5reset.css', 'files/primary.css', 'files/global-nav.css', 'files/wp-helper.css', 'files/front-page.css', 'files/page.css', 'files/responsive.css', 'files/print.css'],
        dest: 'dist/<%= pkg.name %>.css'
      }
    },
    cssmin: {
      minify: {
        expand: true,
        cwd: 'dist/',
        src: ['*.css', '!*.min.css'],
        dest: 'dist/',
        ext: '.min.css'
      }
    }
    
  });

  grunt.loadNpmTasks('grunt-contrib-cssmin');
  grunt.loadNpmTasks('grunt-contrib-concat');

  grunt.registerTask('test', ['concat']);

  grunt.registerTask('default', ['concat', 'cssmin']);

};