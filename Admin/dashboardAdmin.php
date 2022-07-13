   <?php
include '../model/food.php';
$food_obj = new Food();
$order_list = $food_obj->dashboard_orders();
$total_orders = $food_obj->dashboard_order_total();
$total_sales = $food_obj->dashboard_order_sales();
$r = $total_sales->fetch_assoc();
$order_feedback = $food_obj->dashboard_order_feedback();
if (isset($_GET['id'])) {
    $food_obj->update_order($_GET['id']);
}
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <title>Dashboard - FOOD ORDER MANAGER</title>
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
            <div class="container">
               <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span
                  class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span> </a><a class="brand" href="index.html">Food Orders Managing System </a>
               <div class="nav-collapse">
                  <ul class="nav pull-right">
                     <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                           class="icon-cog"></i> Account <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                           <li><a href="index.php">Settings</a></li>
                           <li><a href="index.php">Help</a></li>
                        </ul>
                     </li>
                     <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
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
                  <li class="active"><a href="dashboardAdmin.php"><i class="icon-dashboard"></i><span>Dashboard</span> </a> </li>
                  <li><a href="menu.php"><i class="icon-list-alt"></i><span>Food Menu</span> </a> </li>
                  <li><a href="staffs.php"><i class="icon-user"></i><span>Staffs</span> </a></li>
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
                  <div class="span4">
                     <div class="widget widget-nopad">
                        <div class="widget-header">
                           <i class="icon-list-alt"></i>
                           <h3> Today's Stats</h3>
                        </div>
                        <!-- /widget-header -->
                        <div class="widget-content">
                           <div class="widget big-stats-container">
                              <div class="widget-content">
                                 <h6 class="bigstats">This is a Summary Report showing Total numbers of orders, Total numbers of food service Stations/tables, Total numbers postive feedback from customers, Total sales of food <a href="dashboard.php" >Restaurant Manager</a>. </h6>
                                 <div id="big_stats" class="cf">
                                    <!-- .stat -->
                                    <div class="stat"> <i class="icon-list-alt"></i> <label>Total Orders</label><span class="value"> </span> </div>
                                    <!-- .stat -->
                                    <div class="stat"> <i class="icon-twitter-sign"></i> <label>Total Feedback</label><span class="value"> </label></span></div>
                                    <!-- .stat -->
                                    <div class="stat"> <i class="icon-bullhorn"></i> <label>Total Stations</label><span class="value"><label name=Station id=Station> 1 </label></span> </div>
                                    <!-- .stat --> 
                                 </div>
                              </div>
                              <!-- /widget-content --> 
                           </div>
                        </div>
                     </div>
                     <!-- /widget -->
                     <div class="widget widget-nopad">
                        <div class="widget-header">
                           <i class="icon-list-alt"></i>
                           <h3> Daily Calender</h3>
                        </div>
                        <!-- /widget-header -->
                        <div class="widget-content">
                           <div id='calendar'>
                           </div>
                        </div>
                        <!-- /widget-content --> 
                     </div>
                     <!-- /widget -->
                     <div>
                        <!-- /widget-content --> 
                        <!-- /widget --> 
                     </div>
                  </div>
                  <!-- /maiN-->
                  <!-- /span6 -->
                  <div class="span8">
                     <!-- /widget -->
                     <div class="widget widget-table action-table">
                        <div class="widget-header">
                           <i class="icon-th-list"></i>
                           <h3>ORDERS LIST</h3>
                        </div>
                        <!-- /widget-header -->
                        <div class="widget-content">
                           <table class="table table-striped table-bordered">
                              <thead>
                                 <tr>
                                    <th> Oders Details</th>
                                    <th> Order Quantity</th>
                                    <th> Order Status</th>
                                    <th> Time</th>
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
                                    <td> <?php echo $row["Order_Details"] ?> </td>
                                    <td> <?php echo $row["Quantity"] ?> </td>
                                    <td> <?php echo $row["status"] ?> </td>
                                    <td> <?php echo $row["Time"] ?> </td>
                                    <td class="td-actions"><a href="<?php echo 'dashboardAdmin.php?id=' . $row["Order_Id"] ?>" class="btn btn-small btn-success"><i class="btn-icon-only icon-ok"> </i></a></td>
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
                     <!-- /widget -->
                     <div class="widget">
                        <div class="widget-header">
                           <i class="icon-bookmark"></i>
                           <h3>Important Shortcuts</h3>
                        </div>
                        <!-- /widget-header -->
                        <div class="widget-content">
                           <div class="shortcuts"> <a href="orders.php" class="shortcut"><i class="shortcut-icon icon-list-alt"></i><span
                              class="shortcut-label">Orders</span> </a><a href="dashboard.php" class="shortcut"><i
                              class="shortcut-icon icon-bookmark"></i><span class="shortcut-label">Bookmarks</span> </a><a href="dashboard.php" class="shortcut"><i class="shortcut-icon icon-signal"></i> <span class="shortcut-label">Reports</span> </a><a href="dashboardAdmin.php" class="shortcut"> <i class="shortcut-icon icon-comment"></i><span class="shortcut-label">Comments</span> </a><a href="staffs.php" class="shortcut"><i class="shortcut-icon icon-user"></i><span
                              class="shortcut-label">Staffs</span> </a><a href="orders.php" class="shortcut"><i
                              class="shortcut-icon icon-file"></i><span class="shortcut-label">Notes</span> </a><a href="orders.php" class="shortcut"><i class="shortcut-icon icon-picture"></i> <span class="shortcut-label">orders</span> </a><a href="dashboardAdmin.php" class="shortcut"> <i class="shortcut-icon icon-tag"></i><span class="shortcut-label">Tags</span> </a> </div>
                           <!-- /shortcuts --> 
                        </div>
                        <!-- /widget-content --> 
                     </div>
                     <!-- /widget --> 
                     <!-- /span6 --> 
                  </div>
                  <!-- /row --> 
               </div>
               <!-- /container --> 
            </div>
            <!-- /main-inner --> 
         </div>
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
      <script language="javascript" type="text/javascript" src="../js/full-calendar/fullcalendar.min.js"></script>
      <script src="../js/base.js"></script> 
      <script>     
         $(document).ready(function() {
         var date = new Date();
         var d = date.getDate();
         var m = date.getMonth();
         var y = date.getFullYear();
         var calendar = $('#calendar').fullCalendar({
           header: {
             left: 'prev,next today',
             center: 'title',
             right: 'month,agendaWeek,agendaDay'
           },
           selectable: true,
           selectHelper: true,
           select: function(start, end, allDay) {
             var title = prompt('Event Title:');
             if (title) {
               calendar.fullCalendar('renderEvent',
                 {
                   title: title,
                   start: start,
                   end: end,
                   allDay: allDay
                 },
                 true // make the event "stick"
               );
             }
             calendar.fullCalendar('unselect');
           },
           editable: true,
           events: [
             {
               title: 'Delivery to Mwenge',
               start: new Date(y, m, 1)
             },
             {
               title: 'Delivery to Magomeni',
               start: new Date(y, m, d+5),
               end: new Date(y, m, d+7)
             },
             {
               id: 999,
               title: 'Advertisment',
               start: new Date(y, m, d-3, 16, 0),
               allDay: false
             },
             {
               id: 999,
               title: 'Chuo kikuu customers',
               start: new Date(y, m, d+4, 16, 0),
               allDay: false
             },
             {
               title: 'Meeting',
               start: new Date(y, m, d, 10, 30),
               allDay: false
             },
             {
               title: 'Lunch',
               start: new Date(y, m, d, 12, 0),
               end: new Date(y, m, d, 14, 0),
               allDay: false
             },
             {
               title: 'Birthday Party',
               start: new Date(y, m, d+1, 19, 0),
               end: new Date(y, m, d+1, 22, 30),
               allDay: false
             },
             {
               title: 'Wedding meeting',
               start: new Date(y, m, 28),
               end: new Date(y, m, 29),
               url: 'dashboard.php'
             }
           ]
         });
         });
      </script><!-- /Calendar -->
   </body>
</html>
