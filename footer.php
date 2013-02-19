  </div><!--end #container-->

	
      <footer id="footer" class="footer">
        <div class="container">
          <div class="grid_12">
            <ul>
              <li class="copyright">&copy;<?php echo date("Y"); echo " "; bloginfo('name'); ?></li>
              <li><a href="http://www.vccs.edu" target="_blank">Virginia's Community Colleges</a></li>
              <li><a href="https://docs.google.com/forms/d/1-SheRbMNaBJ0RDd_aL8Yijn76galpHyx5bgrrLre-Ik/viewform" target="_blank">Help us improve</a></li>
            </ul>
          </div>
        </div>
      </footer>
      <?php wp_footer(); ?>

<!-- scripts concatenated and minified via ant build script-->
  <script defer src="<?php bloginfo('template_url'); ?>/js/script.js"></script>
<!-- end scripts-->

  <script>
    var _gaq = _gaq || [];
    var pluginUrl = '//www.google-analytics.com/plugins/ga/inpage_linkid.js';
    _gaq.push(['_require', 'inpage_linkid', pluginUrl]);
    _gaq.push(['_setAccount', 'UA-38353255-1']);
    _gaq.push(['_trackPageview']);

    (function() {
      var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
      ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
      var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();

  </script>
</body>
</html>
