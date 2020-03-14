<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

<head>
    <meta charset="utf-8" />
    <title>Title Aplikasi</title>

    <!-- CSS -->
    <link href="resources/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="resources/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet" />
	
	 <!-- MetisMenu CSS -->
    <link href="resources/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="resources/sb-admin-2/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="resources/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>

<body>      
	<div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
				<?php
					if(count($message)) {
				?>					
						<div class="alert <?php if($message["success"] == false) echo "alert-danger"; else echo "alert-success"; ?>"><?php echo $message["message"]; ?></div>
				<?php
					}
					
					if((count($message) && $message["success"] == false) || (count($message)==0)){
				?>
					
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <form class="form-signin" method="post">
                            <fieldset>
                                <div class="form-group">						
									<input type="text" id="input-username" name="username" class="form-control" placeholder="ex : artolia" required autofocus>
                                  
                                </div>
                                <div class="form-group">
									<input type="password" name="password" id="input-password" class="form-control" required>                                
                                </div>                                                            
                                <button class="btn btn-primary btn-block" type="submit">Sign in</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
				<?php } ?>
            </div>
        </div>
    </div>
</div> <!-- /container -->

<!-- jQuery -->
<script src="resources/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="resources/bootstrap/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="resources/metisMenu/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="resources/sb-admin-2/js/sb-admin-2.js"></script>

</body>
</html>