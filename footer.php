        <div id="footer">
                <div class="container">
                  	<p class="text-muted credit">Designed by Matthew Lavine using <a target="_blank" href="http://getbootstrap.com/">Bootstrap</a>, <a target="_blank" href="http://jquery.com/">jQuery</a>, and <a target="_blank" href="http://html5boilerplate.com/">HTML5 Boilerplate</a>. &copy;<?php $copyYear = 2012; $curYear = date('Y');echo $copyYear . (($copyYear != $curYear) ? '-' . $curYear : ''); ?>
			<a href="#" class="pull-right" data-toggle="modal" data-target="#signin">Sign In <i class="fa fa-cog"></i></a></p>
	        </div>
        </div>

        <script async src="js/plugins.js"></script>
        <script async src="js/main.js"></script>
        <script src="js/alertify.min.js"></script>
        <script async src="js/bootstrap.min.js"></script>
        <script src="js/typed.js"></script>
        <script>
            $(function(){
                 <?php if(isset($_GET['notfound'])){echo 'alertify.error("Error 404: That page was not found!");';}?>
                 $("#sayHello").text('');
                 $("#sayHello").typed({
                    strings: ["","Hi.", "Welcome to my site!", "My name is Matthew Lavine."],
                    typeSpeed: 50,
                    backDelay: 1500,
                    callback: function(){
                        setTimeout(function() {
                            $("#typed-cursor").css("color", "green").removeAttr('id').fadeTo("slow", 0);
                            return;
                        }, 1000);
                    }
                });
            });
        </script>

        <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
              (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
              m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
          ga('create', 'UA-51459611-1', 'matthewlavine.net');
          ga('send', 'pageview');
        </script>
    </body>
</html>
