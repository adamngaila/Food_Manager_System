   <?php
      include '../model/food.php';
      $food_obj = new Food();

      $order_list = $food_obj->dashboard_orders();
      $total_orders = $food_obj->dashboard_order_total();
    
      $total_sales = $food_obj->dashboard_order_sales();
      $order_feedback = $food_obj->dashboard_order_feedback();
      if(isset($_GET['Order_Id'])){
           $food_obj->delete_order($_GET['Order_Id']);
          }
           if(isset($_GET['id'])){
           $food_obj->update_order($_GET['id']);
          }
      
?>
<!DOCTYPE html>
<html lang="en">
  
<head>
  <meta charset="utf-8">
<title>Orders - FOOD ORDER MANAGER</title>
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
                            class="icon-user"></i>MPISHI <b class="caret"></b></a>
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
      
        <li class="active"><a href="orders.php"><i class="icon-bar-chart"></i><span>Orders</span> </a> </li>
        
        
      </ul>
    </div>
		</div> <!-- /container -->
	
	</div> <!-- /subnavbar-inner -->

</div> <!-- /subnavbar -->
    
    
<div class="main">
	
	<div class="main-inner">

	    <div class="container">
	<div class="row all-icons">
    
    <div class="widget">
                            <div class="widget-header">
                                <i class="icon-bar-chart"></i>
                                <h3>
                                    ORDERS LOGBOOK</h3>
                            </div>
                            <!-- /widget-header -->
                            
     <div class="widget-content">
              <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                     <th> Oders Id</th>
                    <th> Oders Details</th>
                    <th> Order Quantity</th>
                    <th> Order Cost</th>
                    <th> Order Status</th>
                     <th> Order Station</th>
                    <th> Time</th>
                    <th> Feedback</th>
                    <th class="td-actions">ACTION </th>
                  </tr>
                </thead>
                <tbody>
              <?php
      
      $order_list = $food_obj->dashboard_orders();

if ($order_list->num_rows > 0) {
  while ($row = $order_list->fetch_assoc()) {
     ?>
                  <tr>
                       <td> <?php echo $row["Order_Id"] ?> </td>
                    <td> <?php echo $row["Order_Details"] ?> </td>
                    <td> <?php echo $row["Quantity"] ?> </td>
                    <td> <?php echo $row["Total_Cost"] ?> </td>
                     <td> <?php echo $row["status"] ?> </td>
                     <td> <?php echo $row["Station"] ?> </td>
                    <td> <?php echo $row["Time"] ?> </td>
                    <td> <?php echo $row["remarks"] ?> </td>
                    <td class="td-actions"><a href="<?php echo 'orders.php?id='.$row["Order_Id"] ?>" class="btn btn-small btn-success"><i class="btn-icon-only icon-ok"> </i></a></td>
                  </tr>
                      <?php
    }
}
?>
                 
                 
                </tbody>
              </table>
            </div>
       
        
                            </div>
   
      
    
  </div> <!-- /row -->
	
	    </div> <!-- /container -->
    
	</div> <!-- /main-inner -->
	    
</div> <!-- /main -->
    



<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="../js/jquery-1.7.2.min.js"></script>

<script src="../js/bootstrap.js"></script>
<script src="../js/base.js"></script>
<script src="../js/faq.js"></script>

<script>

$(function () {
	
	$('.faq-list').goFaq ();

});

</script>
  </body>

</html>
