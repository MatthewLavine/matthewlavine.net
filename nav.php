<div class="navbar navbar-default navbar-fixed-top" role="navigation">
<div class="container">

<div class="navbar-header">
    	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#nav1">
      		<span class="sr-only">Toggle navigation</span>
      		<span class="icon-bar"></span>
     	 	<span class="icon-bar"></span>
      		<span class="icon-bar"></span>
    	</button>
	<a class="navbar-brand" href="#">Matthew Lavine</a>
</div>

<div class="collapse navbar-collapse" id="nav1">
	<ul class="nav navbar-nav">
      		<li class="active"><a data-toggle="tab" href="#aboutMe">About Me</a></li>

      		<li class="dropdown">
        		<a href="#" class="dropdown-toggle" data-toggle="dropdown">Projects<b class="caret"></b></a>
			<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu2">
				<li role="presentation" class="dropdown-header">Class Projects</li>
          			<li><a href="#" data-toggle="modal" data-target="#it114">IT114</a></li>
          			<li class="disabled"><a href="#">IT201</a></li>
          			<li class="disabled"><a href="#">IT202</a></li>
          			<li><a target="_blank" href="http://wickr-dev.voltagenj.com/">IT310 (Wickr)</a></li>
				<li role="presentation" class="divider"></li>
				<li role="presentation" class="dropdown-header">Personal Projects</li>
          			<li><a href="http://web.njit.edu/~msl23/chris/">chris.harrsch.net</a></li>
          			<li><a href="http://web.njit.edu/~msl23/bootstrap/bootstrap.zip">Bootstrap Deploy Package</a></li>
                <li><a href="http://krhs.net/" target="_blank">Kittatinny Regional High School</a></li>


			</ul>
		</li>
      		<li><a data-toggle="tab" href="#contact">Contact Me</a></li>		
    	</ul>

    	<ul class="nav navbar-nav navbar-right">
          	<!--<li><a href="#">Facebook</a></li>-->
        	<!--<li><a href="#">Twitter</a></li>-->
		      <!--<li><a target="_blank" href="http://advancedgroup.net/">AdvancedGroup</a></li>-->
		      <li><a target="_blank" href="https://www.linkedin.com/in/lavine"><i class="fa fa-linkedin-square"></i> LinkedIn</a></li>
         	<li><a target="_blank" href="https://github.com/MatthewLavine/matthewlavine.net"><i class="fa fa-github"></i> GitHub</a></li>
	 </ul>
</div><!-- /.navbar-collapse -->

</div>
</div>


<br><br><br><br>


<!-- Modal Windows -->
<script>
$('.modal').on('show.bs.modal', function () {
        $('.modal').animate({ scrollTop: 0 }, 'slow');
});
$('.modal').on('hide.bs.modal', function () {
        $('.modal').animate({ scrollTop: 0 }, 'slow');
});
</script>

<?php include 'it114.php' ?>
<?php include 'signin.php' ?>

