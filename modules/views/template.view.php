<?php
$page = (isset($_GET['page']) && $_GET['page']) ? $_GET['page'] : '';

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Title Aplikasi</title>
	
	<!-- jQuery -->
    <script src="<?php echo PATH; ?>resources/jquery/jquery.min.js"></script>
	<!-- Custom Theme JavaScript -->
    <script src="<?php echo PATH; ?>resources/sb-admin-2/js/sb-admin-2.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo PATH; ?>resources/bootstrap/js/bootstrap.min.js"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo PATH; ?>resources/metisMenu/metisMenu.min.js"></script>
   
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo PATH; ?>resources/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- MetisMenu CSS -->
    <link href="<?php echo PATH; ?>resources/metisMenu/metisMenu.min.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="<?php echo PATH; ?>resources/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	
	<?php echo $additional; ?>
	
	<!-- Custom CSS -->
    <link href="<?php echo PATH; ?>resources/sb-admin-2/css/sb-admin-2.css" rel="stylesheet">
</head>

<body>

<div id="wrapper">

     <!-- Navigation -->
	<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="<?php PATH ?>">Nama Aplikasi</a>
		</div>
		<!-- /.navbar-header -->
		
        <!-- Top Menu Items -->
         <ul class="nav navbar-top-links navbar-right">
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
					<i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
				</a>
                <ul class="dropdown-menu">
                    <li>
						<a href="<?php echo PATH; ?>index.php?page=login&action=logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>                        
                    </li>
                </ul>
            </li>
        </ul>
		
		<div class="navbar-default sidebar" role="navigation">
			<div class="sidebar-nav navbar-collapse">
				<ul class="nav" id="side-menu">
					<!--<li <?php if($page=="" || $page=="home") echo 'class="active"'; ?>>
						<a href="<?php echo PATH; ?>?page=home"><i class="fa fa-fw fa-dashboard"></i> Home</a>
					</li>-->
					<?php 					
						foreach($menuparent as $valuemenuparent){								
							if(array_search("view",$valuemenuparent['priv']) !== False){
								if(is_null($valuemenuparent['page'])){
									echo '<li>';
									echo '<a>'. $valuemenuparent['nama'] .' '.($valuemenuparent['c'] > 0 ? '<span class="fa arrow"></span>' : '').'</a>';
									echo ($valuemenuparent['c'] > 0 ? '<ul class="nav nav-second-level">' : '');
									foreach($submenu as $valuesubmenu){												
										if(array_search("view",$valuesubmenu['priv']) !== False) {
											if($valuemenuparent['id'] == $valuesubmenu['parent']){
												echo '<li '. ($page==$valuesubmenu['page'] ? 'class="active"' : '') .'><a href="'. PATH .'?page='. $valuesubmenu['page'] .'">'.$valuesubmenu['nama'] .'</a></li>';							
											}
										}
									}
									echo ($valuemenuparent['c'] > 0 ? '</ul>' : '');
									echo '</li>';
								}else{
									echo '<li ';
									echo ($page==$valuemenuparent['page'] ? 'class="active"' : '') .'><a href="'. PATH .'?page='. $valuemenuparent['page'] .'">'.$valuemenuparent['nama'].'</a>';
									echo '</li>';			
								}							
							}
						}
					?>
					<li>
						<a href="../" target="_blank"><i class="fa fa-fw fa-paper-plane"></i> Lihat Website</a>
					</li>               
				</ul>
			</div>
		</div>        
    </nav>

    <div id="page-wrapper">
		<div class="container-fluid">			
			<?php
				$view = new View($viewName);				
				foreach($data as $key => $value){	
					$view->bind($key, $value);
				}				
				$view->forceRender();
			?>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->
</body>

</html>
