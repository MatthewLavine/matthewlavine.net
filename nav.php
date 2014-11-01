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
          <li role="presentation" class="dropdown-header">Personal Projects</li>
          <li><a href="http://chat.hardorange.org/" target="_blank">NodeJS Chat</a></li>
          <li><a href="/interactive" target="_blank">Terminal Emulator</a></li>
          <li role="presentation" class="divider"></li>
          <li role="presentation" class="dropdown-header">Current Classes</li>
          <li class="disabled"><a href="#">MGMT 390</a></li>
          <li class="disabled"><a href="#">IT 340</a></li>
          <li class="disabled"><a href="#">IT 331</a></li>
          <li class="disabled"><a href="#">IS 331</a></li>
          <li class="disabled"><a href="#">IT 330</a></li>
          <li class="disabled"><a href="#">HIST 386</a></li>
        </ul>
      </li>
      <li><a target ="_blank" href="/Resume.pdf">Resume</a></li>
      <li><a data-toggle="tab" href="#contact">Contact Me</a></li>		
    </ul>
    <ul class="nav navbar-nav navbar-right">
     <li><a target="_blank" href="https://www.linkedin.com/in/lavine"><i class="fa fa-linkedin-square"></i> LinkedIn</a></li>
     <li><a target="_blank" href="https://github.com/MatthewLavine"><i class="fa fa-github"></i> GitHub</a></li>
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

