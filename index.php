<?php require_once 'application.php' ?>
<?php include 'header.php' ?>
</head>

<body>	
	<?php include 'nav.php' ?>

	<div class="container" id="wrapper">
		<?php /*
		if(isset($_GET['notfound'])){
			echo '<div style="width:300px;margin-left:auto;margin-right:auto;" class="alert alert-danger">';
			echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
			echo 'ERROR 404: That page was not found!';
			echo '</div>';
		} */ ?>

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
    								<p style="font-size:80%;">I am a Junior Information Technology Major at the <a target="_blank" href="http://www.njit.edu/">New Jersey Institute of Technology</a>. I am currently employed at <a target="_blank" href="http://advancedgroup.net/">AdvancedGroup.net</a> for web development and server maintenance.
									</p>
  								</div>
							</div>					
						</div>

						<div class="col-lg-6">
  							<div class="panel panel-default">
  								<div class="panel-heading"><p class="text-center smallTopMargin">Personal</p></div>
  								<div class="panel-body">
    								<p style="font-size:80%;">I am a jazz musician on alto saxophone, computer enthusiast, and aspiring pilot. I am also the president of the NJIT Society of Musical Arts (SOMA), and the band leader for the NJIT Jazz Band.
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
														<smallz>I am employed as a front and back end web developer and am skilled in many modern web languages and interactive frameworks.</small>
														<p class="card-directions"><a class="btn btn-primary" role="button">More...</a></p>
													</div>
												</div>
											</div>
											<div class="back">
												<div class="thumbnail">
													<div class="caption">
														<h3>Languages</h3>
														<small>
															<div class="row">
																<div class="col-xs-6" style="border-right: 1px solid #eee;">
																	<ul class="list-unstyled text-left">
																		<li><strong>Front End</strong></li>
																		<li>AngularJS</li>
																		<li>JavaScript</li>
																		<li>CSS3</li>
																		<li>HTML5</li>
																		<li>Foundation</li>
																		<li>Bootstrap</li>
																		<li>Joomla</li>
																		<li>Wordpress</li>
																	</ul>
																</div>
																<div class="col-xs-6">
																	<ul class="list-unstyled text-right">
																		<li><strong>Back End</strong></li>
																		<li>ColdFusion</li>
																		<li>PHP</li>
																		<li>Node.js</li>
																		<li>WebSockets</li>
																		<li>Git</li>
																		<li>Grunt</li>
																		<li>IIS</li>
																		<li>Apache</li>
																	</ul>
																</div>
															</div>
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
														<smallz>I have experience in Windows and Unix system administration including Active Directory and Group Policy.</small>
														<p class="card-directions"><a class="btn btn-primary" role="button">More...</a></p>
													</div>
												</div>
											</div>
											<div class="back">
												<div class="thumbnail">
													<div class="caption">
														<h3>Systems</h3>
														<small>
															<ul class="list-unstyled">
																<li><strong>*nix Derivatives</strong></li>
																<div class="row">
																	<div class="col-xs-6">
																		<li>CentOS</li>
																		<li>Ubuntu</li>
																	</div>
																	<div class="col-xs-6">
																		<li>Linux Mint</li>
																		<li>Arch</li>
																	</div>
																</div>
																<hr>
																<li><strong>Windows NT</strong></li>
																<li>Windows Server 2012 &amp; R2</li>
																<li>Windows Server 2008 &amp; R2</li>
																<li>Windows Server 2003 &amp; R2</li>
																<li>Windows XP, Vista, 7, 8, 8.1</li>
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
														<smallz>I have experience and formal education in network infrastructure, DNS, TCP/IP, routing, as well as hardware upgrades and maintenance.</small>
														<p class="card-directions"><a class="btn btn-primary" role="button">More...</a></p>
													</div>
												</div>
											</div>
											<div class="back">
												<div class="thumbnail">
													<div class="caption">
														<h3>Experience</h3>
														<small>
															<ul class="list-unstyled">
																<li><strong>Current</strong></li>
																<li>Junior IT Major at NJIT</li>
																<li>2 years at AdvancedGroup</li>
																<hr>
																<li><strong>Past</strong></li>
																<li>2 years in the Kittatinny Regional High School IT Department</li>
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
														<smallz>I have experience designing and maintaining MySQL databases including data security and encryption methods.</small>
														<p class="card-directions"><a class="btn btn-primary" role="button">More...</a></p>
													</div>
												</div>
											</div>
											<div class="back">
												<div class="thumbnail">
													<div class="caption">
														<h3>Tools</h3>
														<small>
															<ul class="list-unstyled">
																<hr>
																<li>Microsoft SQL</li>
																<li>MySQL</li>
																<li>Oracle SQL</li>
																<li>Microsoft Access</li>
																<li>Redis</li>
																<li>MongoDB</li>
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
                    <form id="contactForm" name="contactForm" role="form">
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

							<button type="button" id="resetButton" onClick="resetContact()" class="btn btn-default">Reset</button>
							<button type="button" id="submitButton" onClick="validateContact()" class="btn btn-primary" data-loading-text="Sending..." data-complete-text="Sent!">Submit</button>
							<div id="formStatus" class="pull-right"></div>
						</fieldset>
					</form>
				</div>
			</div>
		</div>
	</div>

<?php include 'footer.php' ?>
