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

		<!--[if IE]>
            <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            You are using an <strong>outdated</strong> browser. Please <a target="_blank" href="http://browsehappy.com/">upgrade your browser</a> to view this site as intended.
            </div>
    	<![endif]-->
		
		<div class="jumbotron">
			<div class="tab-content">
				<div class="tab-pane fade in active" id="aboutMe">
  					<h2 class="text-center" style="margin-top:0px;"><span id="sayHello">Hi, my name is Matthew Lavine</span></h2>
  					<h2><small>Who I am</small></h2>					
					<div class="row">
						<div class="col-lg-6">
  							<div class="panel panel-default">
  								<div class="panel-heading"><p class="text-center smallTopMargin">Professional</p></div>
  								<div class="panel-body">
    								<p style="font-size:80%;">I am a sophomore Information Technology Major at the <a target="_blank" href="http://www.njit.edu/">New Jersey Institute of Technology</a>. I am currently employed at <a target="_blank" href="http://advancedgroup.net/">AdvancedGroup.net</a> doing web design and server maintenance.
									</p>
  								</div>
							</div>					
						</div>

						<div class="col-lg-6">
  							<div class="panel panel-default">
  								<div class="panel-heading"><p class="text-center smallTopMargin">Personal</p></div>
  								<div class="panel-body">
    								<p style="font-size:80%;">I am a saxophone player, computer enthusiast, and web designer. I am also the president of the NJIT Society of Musical Arts (SOMA), and the band leader for the SOMA jazz band.
									</p>
  								</div>
							</div>
						</div>
					</div>

  					<h2><small>What I do</small></h2>					
					<div class="row">
						<div class="col-lg-6">
							<div class="row">
								<div class="col-md-6">
									<div class="flip-container" ontouchstart="this.classList.toggle('hover');">
										<div class="flipper">
											<div class="front">
												<div class="thumbnail">
													<div class="caption">
														<i class="fa fa-code fa-2x"></i>
														<h3 class="smallTopMargin">Web Design</h3>
														<small>I am employed as a front and back end web developer and am skilled in many modern web languages and interactive frameworks.</small>
														<p class="card-directions"><a class="btn btn-primary" role="button">More...</a></p>
													</div>
												</div>
											</div>
											<div class="back">
												<div class="thumbnail">
													<div class="caption">
														<h3>Languages and Frameworks:</h3>
														<small>
															<ul class="list-unstyled">
																<li>HTML5 / CSS3</li>
																<li>ColdFusion</li>
																<li>PHP</li>
																<li>jQuery</li>
																<li>Bootstrap</li>
																<li>Node.js</li>
																<li>Joomla</li>
																<li>Wordpress</li>
															</ul>
														</small>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="flip-container" ontouchstart="this.classList.toggle('hover');">
										<div class="flipper">
											<div class="front">
												<div class="thumbnail">
													<div class="caption">
														<i class="fa fa-users fa-2x"></i>
														<h3 class="smallTopMargin">Administration</h3>
														<small>I have experience in Windows and Unix system administration including Active Directory and Group Policy.</small>
														<p class="card-directions"><a class="btn btn-primary" role="button">More...</a></p>
													</div>
												</div>
											</div>
											<div class="back">
												<div class="thumbnail">
													<div class="caption">
														<h3>Systems:</h3>
														<small>
															<ul class="list-unstyled">
																<br>
																<li>Unix User Management</li>
																<br>
																<li>Active Directory</li>
																<br>
																<li>Windows Group Policy</li>
																<br>
																<li>Windows Domains</li>
															</ul>
														</small>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="row">
								<div class="col-md-6">
									<div class="flip-container" ontouchstart="this.classList.toggle('hover');">
										<div class="flipper">
											<div class="front">
												<div class="thumbnail">
													<div class="caption">
														<i class="fa fa-code-fork fa-2x"></i>
														<h3 class="smallTopMargin">Networking</h3>
														<small>I have experience and formal education in network infrastructure, DNS, TCP/IP, routing, as well as hardware upgrades and maintenance.</small>
														<p class="card-directions"><a class="btn btn-primary" role="button">More...</a></p>
													</div>
												</div>
											</div>
											<div class="back">
												<div class="thumbnail">
													<div class="caption">
														<h3>Experience:</h3>
														<small>
															<ul class="list-unstyled">
																<li>Current IT Major at NJIT</li>
																<br>
																<li>2 years in the Kittatinny Regional High School IT Department</li>
																<br>
																<li>2 years at AdvancedGroup, maintining servers and networks</li>
															</ul>
														</small>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="flip-container" ontouchstart="this.classList.toggle('hover');">
										<div class="flipper">
											<div class="front">
												<div class="thumbnail">
													<div class="caption">
														<i class="fa fa-bar-chart-o fa-2x"></i>
														<h3 class="smallTopMargin">Data</h3>
														<small>I have experience designing and maintaining MySQL databases including data security and encryption methods.</small>
														<p class="card-directions"><a class="btn btn-primary" role="button">More...</a></p>
													</div>
												</div>
											</div>
											<div class="back">
												<div class="thumbnail">
													<div class="caption">
														<h3>Skills:</h3>
														<small>
															<ul class="list-unstyled">
																<li>Data Visualization</li>
																<li>Data Security</li>
																<li>Database Design</li>
																<br>
																<li>Using:</li>
																<li>Microsoft SQL</li>
																<li>MySQL</li>
																<li>PostgreSQL</li>
																<li>phpMyAdmin</li>
															</ul>
														</small>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>
			
				<div class="tab-pane fade" id="contact">
				<script src="js/validateContact.js"></script>
                                <form method="POST" action="submitContact.php" id="contactForm" name="contactForm" role="form">
                                        <fieldset>
                                                <legend><h3>Contact Me</h3></legend>
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
