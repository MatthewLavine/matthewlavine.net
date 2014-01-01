        <div id="footer">
                <div class="container">
                  	<p class="text-muted credit">Designed by Matthew Lavine using <a target="_blank" href="http://getbootstrap.com/">Bootstrap</a>, <a target="_blank" href="http://jquery.com/">jQuery</a>, and <a target="_blank" href="http://html5boilerplate.com/">HTML5 Boilerplate</a>. &copy;<?php $copyYear = 2012; $curYear = date('Y');echo $copyYear . (($copyYear != $curYear) ? '-' . $curYear : ''); ?>
			<a href="#" class="pull-right" data-toggle="modal" data-target="#signin">Sign In <i class="fa fa-cog"></i></a></p>
	        </div>
        </div>

        <script async src="js/plugins.js"></script>
        <script async src="js/main.js"></script>
        <script async src="js/bootstrap.min.js"></script>
        <script src="js/typed.js"></script>
        <script>
            $(function(){
                 $("#sayHello").text('');
                 $("#sayHello").typed({
                    strings: ["","Hi.", "Welcome to my site!", "If you have any questions, feel free to use the contact form above.", "My name is Matthew Lavine."],
                    typeSpeed: 50,
                    backDelay: 1500,
                    callback: function(){
                        setTimeout(function() {
                            $("#typed-cursor").removeAttr('id').fadeTo("slow", 0);
                            return;
                        }, 1000);
                    }
                });
            });
        </script>

	<!--
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X');ga('send','pageview');
        </script>
	-->
</body>
</html>
