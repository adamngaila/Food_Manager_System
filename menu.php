   <?php
      include './model/food.php';
      $food_obj = new Food();

      $menu_list = $food_obj->list_menu();
      
      if (isset($_POST["create_menu"])) {
          $food_obj->create_menu($_POST);
      }
      
?>

<!DOCTYPE html>
<html lang="en">
  
<head>
   <meta charset="utf-8">
<title>Food Menu - FOOD ORDER MANAGER</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/bootstrap-responsive.min.css" rel="stylesheet">
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600"
        rel="stylesheet">
<link href="css/font-awesome.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link href="css/pages/dashboard.css" rel="stylesheet">
<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>
<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container"> <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span
                    class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span> </a><a class="brand" href="index.html">Food Orders Managing System </a>
      <div class="nav-collapse">
        <ul class="nav pull-right">
          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                            class="icon-cog"></i> Account <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="index.php">Settings</a></li>
              <li><a href="index.php">Help</a></li>
            </ul>
          </li>
          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                            class="icon-user"></i> Restaurant Manager <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="index.php">Profile</a></li>
              <li><a href="logout.php">Logout</a></li>
            </ul>
          </li>
        </ul>
        <form class="navbar-search pull-right">
          <input type="text" class="search-query" placeholder="Search">
        </form>
      </div>
      <!--/.nav-collapse --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /navbar-inner --> 
</div>
<!-- /navbar -->
<div class="subnavbar">
  <div class="subnavbar-inner">
    <div class="container">
      <ul class="mainnav">
          <li class="active"><a href="dashboard.php"><i class="icon-dashboard"></i><span>Dashboard</span> </a> </li>
        <li><a href="menu.php"><i class="icon-list-alt"></i><span>Food Menu</span> </a> </li>
        <li><a href="orders.php"><i class="icon-bar-chart"></i><span>Orders</span> </a> </li>
        
      </ul>
    </div>
		</div> <!-- /container -->
	
	</div> <!-- /subnavbar-inner -->

</div> <!-- /subnavbar -->
    
    

<div class="main">
	
	<div class="main-inner">

	    <div class="container">
	
	      <div class="row">
	      	
	      	<div class="span12">      		
	      		
	      		<div class="widget ">
	      			
	      			<div class="widget-header">
	      				<i class=" icon-glass"></i>
	      				<h3>FOOD MENU PORTAL</h3>
	  				</div> <!-- /widget-header -->
					
					<div class="widget-content">
						
						
						
						<div class="tabbable">
						<ul class="nav nav-tabs">
						  <li>
						    <a href="#formcontrols" data-toggle="tab">REGISTER MENU</a>
						  </li>
						  <li  class="active"><a href="#jscontrols" data-toggle="tab">MENU LIST</a></li>
						</ul>
						
						<br>
						
							<div class="tab-content">
								<div class="tab-pane" id="formcontrols">
								<form method ="post" class="form-horizontal">
									<fieldset>
										
								
										
										<div class="control-group">											
											<label class="control-label" for="food_details">Menu Details</label>
											<div class="controls">
												<input type="text" class="span6" id="food_details" name="food_details" value="" placeholder = "pilau kuku"  disabled>
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										
										
										<div class="control-group">											
											<label class="control-label" for="bun">Base Unit</label>
											<div class="controls">
												<input type="text" class="span6" id="bun" name="bun" value="" placeholder="Plate/bottle/pcs" disabled>
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										
										
										<div class="control-group">											
											<label class="control-label" for="price">Price</label>
											<div class="controls">
												<input type="text" class="span4" id="price" name="price" value="" placeholder = "2500" disabled>
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										
										
										<br /><br />
					          
											
										<div class="form-actions">
											<button type="submit" class="btn btn-primary" name="create_menu" value ="Submit" disabled>Save</button> 
											<button class="btn">Cancel</button>
										</div> <!-- /form-actions -->
									</fieldset>
								</form>
								</div>
								
								<div class="tab-pane active" id="jscontrols">
									<form id="edit-profile2" class="form-vertical">
										<fieldset>
										    <div class="widget widget-table action-table">
            <div class="widget-header"> <i class="icon-th-list"></i>
              <h3>MENU LIST</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th> Menu detail</th>
                    <th> Menu Price (TZS)</th>
                    <th> Menu base unit</th>
                   
                  </tr>
                </thead>
                <tbody>
              <?php
      

if ($menu_list->num_rows > 0) {
  while ($row = $menu_list->fetch_assoc()) {
     ?>
                  <tr>
                    <td> <?php echo $row["Food_details"] ?> </td>
                    <td> <?php echo $row["Price"] ?> </td>
                    <td> <?php echo $row["BUN"] ?> </td>
                   
                  </tr>
                      <?php
    }
}
?>
                 
                 
                </tbody>
              </table>
            </div>
            <!-- /widget-content --> 
          </div>
											<div class="form-actions">
											<button type="submit" class="btn btn-primary">Share</button> 
										
										</div>
										</fieldset>
									</form>
								</div>
								
							</div>
						  
						  
						</div>
						
						
						
						
						
					</div> <!-- /widget-content -->
						
				</div> <!-- /widget -->
	      		
		    </div> <!-- /span8 -->
	      	
	      	
	      	
	      	
	      </div> <!-- /row -->
	
	    </div> <!-- /container -->
	    
	</div> <!-- /main-inner -->
    
</div> <!-- /main -->
    
    
    
 



    
    

    


<script src="js/jquery-1.7.2.min.js"></script>
	
<script src="js/bootstrap.js"></script>
<script src="js/base.js"></script>


  </body>

</html>
