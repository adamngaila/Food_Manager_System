   <?php
      include '../model/food.php';
      $food_obj = new Food();

      $staff_list = $food_obj->list_staffs();
      
      if (isset($_POST["create_staff"])) {
          $food_obj->create_staff($_POST);
      }
      if(isset($_GET['id'])){
           $food_obj->delete_user($_GET['id']);
          }
      
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
<title>Staffs - FOOD ORDER MANAGER</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<link href="../css/bootstrap.min.css" rel="stylesheet">
<link href="../css/bootstrap-responsive.min.css" rel="stylesheet">
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600"
        rel="stylesheet">
<link href="../css/font-awesome.css" rel="stylesheet">
<link href="../css/style.css" rel="stylesheet">
<link href="../css/pages/dashboard.css" rel="stylesheet">
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
         <li><a href="dashboardAdmin.php"><i class="icon-dashboard"></i><span>Dashboard</span> </a> </li>
        <li><a href="menu.php"><i class="icon-list-alt"></i><span>Food Menu</span> </a> </li>
        <li class="active"><a href="staffs.php"><i class="icon-user"></i><span>Staffs</span> </a></li>
        <li><a href="orders.php"><i class="icon-bar-chart"></i><span>Orders</span> </a> </li>
        
        
      </ul>
    </div>
            <!-- /container -->
        </div>
        <!-- /subnavbar-inner -->
    </div>
    <!-- /subnavbar -->
    <div class="main">
        <div class="main-inner">
            <div class="container">
                <div class="row">
                    <div class="span5">
                        <div class="widget">
                            <div class="widget-header">
                                <i class=" icon-plus-sign"></i>
                                <h3>
                                    Add Staff member</h3>
                            </div>
                            <!-- /widget-header -->
                           	  <div class="widget-content">
								<form  method="post" class="form-horizontal">
								
										<div class="control-group">											
											<label class="control-label" for="firstname">Name</label>
											<div class="controls">
												<input type="text" class="span3" id="firstname" name ="firstname" value="">
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										
										
										<div class="control-group">											
											<label class="control-label" for="email">Email</label>
											<div class="controls">
												<input type="text" class="span3" id="email" name="email"  value="">
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										
										
										<div class="control-group">											
											<label class="control-label" for="password">Password</label>
											<div class="controls">
												<input type="text" class="span3" id="password" name= "password" value="">
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										
											<div class="control-group">											
											<label class="control-label" for="role">Role</label>
											<div class="controls">
												<input type="text" class="span3" id="role" name="role" value="">
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
									
					          
											
										<div class="form-actions">
											<button type="submit" class="btn btn-primary" name="create_staff" value="Submit">Save</button> 
											<button class="btn">Cancel</button>
										</div> <!-- /form-actions -->
								
								</form>
							</div>
                            <!-- /widget-content -->
                        </div>
                        <!-- /widget -->
                        
                        <!-- /widget -->
                     
                        <!-- /widget -->
                    </div>
                    <!-- /span6 -->
                    <div class="span7">
                        <div class="widget">
                            <div class="widget-header">
                                <i class="icon-bar-chart"></i>
                                <h3>
                                   Staff members list</h3>
                            </div>
                            <!-- /widget-header -->
                              <!-- /widget-header -->
            <div class="widget-content">
              <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th> Staff Id</th>
                    <th> Staff name (TZS)</th>
                    <th> Email</th>
                    <th> Role</th>
                    <th class="td-actions">ACTION </th>
                  </tr>
                </thead>
                <tbody>
              <?php
      

if ($staff_list->num_rows > 0) {
  while ($row = $staff_list->fetch_assoc()) {
     ?>
                  <tr>
                    <td> <?php echo $row["id"] ?> </td>
                    <td> <?php echo $row["name"] ?> </td>
                    <td> <?php echo $row["email"] ?> </td>
                    <td> <?php echo $row["role"] ?> </td>
                    <td class="td-actions"><a href="<?php echo 'staffs.php?id='.$row["id"] ?>" class="btn btn-danger btn-small"><i class="btn-icon-only icon-remove"> </i></a></td>
                  </tr>
                      <?php
    }
}
?>
                 
                 
                </tbody>
              </table>
            </div>
            <!-- /widget-content --> 
                            <!-- /widget-content -->
                        </div>
                        <!-- /widget -->
                        
                        <!-- /widget -->
                    </div>
                    <!-- /span6 -->
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /main-inner -->
    </div>
    <!-- /main -->
    
    <!-- /extra -->
   
    <!-- /footer -->
    <!-- Le javascript
================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../js/jquery-1.7.2.min.js"></script>
    <script src="../js/excanvas.min.js"></script>
    <script src="../js/chart.min.js" type="text/javascript"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/base.js"></script>
    <script>
        var doughnutData = [
				{
				    value: 30,
				    color: "#F7464A"
				},
				{
				    value: 50,
				    color: "#46BFBD"
				},
				{
				    value: 100,
				    color: "#FDB45C"
				},
				{
				    value: 40,
				    color: "#949FB1"
				},
				{
				    value: 120,
				    color: "#4D5360"
				}

			];

        var myDoughnut = new Chart(document.getElementById("donut-chart").getContext("2d")).Doughnut(doughnutData);


        var lineChartData = {
            labels: ["January", "February", "March", "April", "May", "June", "July"],
            datasets: [
				{
				    fillColor: "rgba(220,220,220,0.5)",
				    strokeColor: "rgba(220,220,220,1)",
				    pointColor: "rgba(220,220,220,1)",
				    pointStrokeColor: "#fff",
				    data: [65, 59, 90, 81, 56, 55, 40]
				},
				{
				    fillColor: "rgba(151,187,205,0.5)",
				    strokeColor: "rgba(151,187,205,1)",
				    pointColor: "rgba(151,187,205,1)",
				    pointStrokeColor: "#fff",
				    data: [28, 48, 40, 19, 96, 27, 100]
				}
			]

        }

        var myLine = new Chart(document.getElementById("area-chart").getContext("2d")).Line(lineChartData);


        var barChartData = {
            labels: ["January", "February", "March", "April", "May", "June", "July"],
            datasets: [
				{
				    fillColor: "rgba(220,220,220,0.5)",
				    strokeColor: "rgba(220,220,220,1)",
				    data: [65, 59, 90, 81, 56, 55, 40]
				},
				{
				    fillColor: "rgba(151,187,205,0.5)",
				    strokeColor: "rgba(151,187,205,1)",
				    data: [28, 48, 40, 19, 96, 27, 100]
				}
			]

        }

var myLine = new Chart(document.getElementById("bar-chart").getContext("2d")).Bar(barChartData);

var pieData = [
				{
				    value: 30,
				    color: "#F38630"
				},
				{
				    value: 50,
				    color: "#E0E4CC"
				},
				{
				    value: 100,
				    color: "#69D2E7"
				}

			];

				var myPie = new Chart(document.getElementById("pie-chart").getContext("2d")).Pie(pieData);

				var chartData = [
			{
			    value: Math.random(),
			    color: "#D97041"
			},
			{
			    value: Math.random(),
			    color: "#C7604C"
			},
			{
			    value: Math.random(),
			    color: "#21323D"
			},
			{
			    value: Math.random(),
			    color: "#9D9B7F"
			},
			{
			    value: Math.random(),
			    color: "#7D4F6D"
			},
			{
			    value: Math.random(),
			    color: "#584A5E"
			}
		];
				var myPolarArea = new Chart(document.getElementById("line-chart").getContext("2d")).PolarArea(chartData);
	</script>
</body>
</html>
