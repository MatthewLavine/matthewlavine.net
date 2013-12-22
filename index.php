<?php include 'header.php' ?>
</head>

<body>
	<?php include 'nav.php' ?>

	<div class="container">
		<?php
		if(isset($_GET['notfound'])){
			echo '<div style="width:300px;margin-left:auto;margin-right:auto;" class="alert alert-danger">';
			echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
			echo 'ERROR 404: That page was not found!';
			echo '</div>';
		}

             	if(isset($_GET['contactSuccess'])){
                        echo '<div style="width:475px;margin-left:auto;margin-right:auto;" class="alert alert-success">';
                        echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
                        echo 'Thank-You! Your messaage has been sent.';
                        echo '</div>';
		}?>

		<!--[if lt IE 7]>
            		<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        	<![endif]-->
		
		<p class="text-primary">Notice: This website is under active construction!</p>
		<div class="progress progress-striped active">
			<div class="progress-bar"  role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
				<span class="sr-only">Website Progress: 80% Complete</span>
			</div>
		</div>

		<div class="jumbotron">
			<div class="tab-content">
				<div class="tab-pane fade in active" id="aboutMe">
					<h2>Hi.</h2>
					<p>My name is Matthew Lavine</p>
					<p style="font-size:80%;">I am a sophmore Information Technology Major at the <a target="_blank" href="http://www.njit.edu/">New Jersey Institute of Technology</a>. I currently work at AdvancedGroup.net doing web design and server maintenance. At work I program mainly in ColdFusion and Java, but my work extends into Javascript, AJAX, .NET, ASP, HTML5, CSS3, MYSQL, and PHP.
					</p>
					<p style="font-size:80%;">I am a saxophone player, computer enthusiast, and web designer. I am also the president of the NJIT Society of Musical Arts (SOMA), and the band leader for the SOMA jazz band.
					</p>
				<!--
					<br>
					<img style="display:block;margin-left:auto;margin-right:auto;" src="http://web.njit.edu/~msl23/images/Disney2.jpg" class="img-rounded img-responsive">
					<div style="text-align:center;"><i><h5>Disney World, May 2012</h5></i></div>
				-->
	
				</div>
			
				<div class="tab-pane fade" id="contact">
				<script src="js/validateContact.js"></script>
                                <form method="POST" action="submitContact.php" id="contactForm" name="contactForm" role="form">
                                        <fieldset>
                                                <legend>Contact Me</legend>
						<span class="help-block">You can contact me at <a href="mailto:msl23@njit.edu">msl23@njit.edu</a> or use the form below.</span>
                                                <div class="form-group">
                                                        <label for="name">Name</label>
                                                        <input type="text" class="form-control" name="name" id="name" placeholder="Enter name">
                                                </div>

                                                <div class="form-group">
                                                        <label for="email">Email address</label>
                                                        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                                                </div>
	
                                                <div class="form-group">
							<label for="message">Message / Request:</label>
                                                        <textarea rows="4" cols="3" name="message" class="form-control" id="message" placeholder="Enter a message or work request"></textarea>
                                                </div>
						<button type="button" onClick="resetContact()" class="btn btn-default">Reset</button>
						<button type="button" onClick="validateContact()" class="btn btn-primary">Submit</button>
					</fieldset>
				</form>
				</div>
			</div>
		</div>
	</div>

<?php include 'footer.php' ?>
