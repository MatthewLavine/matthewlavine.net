<!-- Sign In Modal -->
<!-- Under developement -->
<div class="modal fade" id="signin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">Sign In</h4>
			</div>
			<div class="modal-body">
				<form method="POST" action="login.php" id="signinForm" name="signinForm" role="form">
					<fieldset>
						<div class="form-group">
							<label for="name">Email</label>
							<input type="text" class="form-control" name="email" id="email" placeholder="Enter email">
						</div>

						<div class="form-group">
							<label for="address">Password</label>
    							<input type="password" class="form-control" name="password" id="password" placeholder="Enter password">
						</div>
					</fieldset>
				</form>
			</div>

			<div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        			<button type="button" class="btn btn-warning" onclick="document.forms['signinForm'].reset();">Reset</button>
        			<button type="button" class="btn btn-primary">Sign In</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
