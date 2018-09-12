<?php
include ('class/class_gossip.php');
$app = new Application();
$app->checkIsLogin(FALSE);
?>
<html>
<head>
<link
	href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css"
	rel="stylesheet" id="bootstrap-css">
<link href="style.css" rel="stylesheet">
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script
	src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<link
	href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css"
	rel="stylesheet">
</head>
<body>
	<div id="login-overlay" class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
					<span aria-hidden="true">×</span><span class="sr-only">Close</span>
				</button>
				<h4 class="modal-title" id="myModalLabel">Login to gossip.com</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-xs-6">
						<div class="well">
							<form id="loginForm" method="POST" action="action.php">
								<div class="form-group">
									<label for="username" class="control-label">Username</label> <input
										type="text" class="form-control" id="username" name="username"
										required="yes" title="Please enter your username"
										placeholder="Please enter your username"> <span
										class="help-block"></span>
								</div>
								<div class="form-group">
									<label for="password" class="control-label">Password</label> <input
										type="password" class="form-control" id="password"
										name="password" required="yes"
										title="Please enter your password"
										placeholder="Please enter your password"> <span
										class="help-block"></span>
								</div>
								<div id="loginErrorMsg" class="alert alert-error hide">Wrong
									username og password</div>
								<div class="checkbox">
									<label> <input type="checkbox" name="remember" id="remember">
										Remember login
									</label>
									<p class="help-block">(if this is a private computer)</p>
								</div>
								<input type="hidden" name="action" value="login" />
								<button type="submit" class="btn btn-success btn-block">Login</button>
								<a href="#" class="btn btn-default btn-block">Go to website</a>
							</form>
						</div>
					</div>
					<div class="col-xs-6">
						<p class="lead">
							Login for write <span class="text-success">Articals</span>
						</p>
						<ul class="list-unstyled" style="line-height: 2">
							<li><span class="fa fa-check text-success"></span> List all
								Articals</li>
							<li><span class="fa fa-check text-success"></span> Edit Articals</li>
							<li><span class="fa fa-check text-success"></span> Post New
								Artical</li>
							<li><span class="fa fa-check text-success"></span> Post New
								Videos</li>
							<li><span class="fa fa-check text-success"></span> Read latest
								Articals <small>(For Viewers)</small></li>
							<li><a href="#"><u>Go to Website</u></a></li>
						</ul>
						<p>
							<a href="#" class="btn btn-danger btn-block"><?php if(isset($_SESSION['error'])){ echo $_SESSION['error']; unset($_SESSION['error']); }else{ echo "Sign Up for this website is disable now!"; } ?></a>
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>