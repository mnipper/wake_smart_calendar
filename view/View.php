<?php
class View
{

    public function header() {
?>
    <!DOCTYPE html>
    <html lang="en">
      <head>
        <meta charset="utf-8">
        <title>Wake Smart Calendar</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <link href="assets/css/bootstrap.css" rel="stylesheet">
        <script src="assets/js/jquery.min.js"></script>
        <style type="text/css">
          body {
            padding-top: 60px;
            padding-bottom: 40px;
          }
          .sidebar-nav {
            padding: 9px 0;
          }
        </style>
        <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
        <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <link rel="shortcut icon" href="../assets/ico/favicon.ico">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
      </head>

      <body>
        <div class="navbar navbar-fixed-top">
          <div class="navbar-inner">
            <div class="container-fluid">
              <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </a>
              <a class="brand" href="index.php">Wake Smart Calendar</a>
              <div class="nav-collapse">
                <ul class="nav">
              <?php
		    $category = $_GET['category'];
                    $header_categories = array("Home", "RSVPs", "Saves", "Friends");
                    for ($i = 0; $i < sizeof($header_categories); $i++) {
                        if (strcmp($category, $header_categories[$i]) == 0)
                            echo '<li class="active"><a href="?category='.$header_categories[$i].'">'.$header_categories[$i].'</a></li>';
                        else
                            echo '<li><a href="?category='.$header_categories[$i].'">'.$header_categories[$i].'</a></li>';
                    }
?>
                </ul>
                <p class="navbar-text pull-right">Logged in as <a href="#">username</a></p>
              </div><!--/.nav-collapse -->
            </div>
          </div>
         </div>

<?php
    }

    public function sidebar($active = 'Recommended') {
?>
    <div class="container-fluid">
      <div class="row-fluid">
        <div class="span3">
          <div class="well sidebar-nav">
            <ul class="nav nav-list">
              <li class="nav-header">Events</li>
              <?php
                    $events = array("Recommended", "Academic", "All", "Arts and Entertainment", "Athletics", "Exhibits", "International", "Lectures", "Major Events", "Professional Development", "Religious", "Other");
                    for ($i = 0; $i < sizeof($events); $i++) {
                        if (strcmp($active, $events[$i]) == 0)
                            echo '<li class="active"><a href="?active='.$events[$i].'">'.$events[$i].'</a></li>';
                        else
                            echo '<li><a href="?active='.$events[$i].'">'.$events[$i].'</a></li>';
                    }
?>
              <li class="nav-header">Time</li>
              <?php
                    $times = array("Today", "Tomorrow", "This Week", "Next Week", "This Month", "Next Month");
                    for ($i = 0; $i < sizeof($times); $i++) {
                        if (strcmp($active, $times[$i]) == 0)
                            echo '<li class="active"><a href="?active='.$times[$i].'">'.$times[$i].'</a></li>';
                        else
                            echo '<li><a href="?active='.$times[$i].'">'.$times[$i].'</a></li>';
                    }
?>
            </ul>
          </div><!--/.well -->
        </div><!--/span-->
        <div class="span9">
<?php
    }

    public function herobox() {
?>
          <div class="hero-unit">
            <h1>Hello, world!</h1>
            <p>Wake Smart Calendar more intuitively organizes the events at Wake Forest University.  You can also see what events your friends plan to attend, and even get recommended events based on your likes.</p>
            <p><a class="btn btn-primary btn-large">Register &raquo;</a></p>
          </div>
<?php
    }

    public function displayEvents($items=11, $activities='All') {
        echo '<div class="row-fluid">';
        for ($i = 0; $i < $items; $i++) {
            if ($i % 3 == 0 && $i != 0)
                echo '</div><br><div class="row-fluid">';
?>
          
            <div class="span4">
              <h2>Baseball at Virginia</h2>
              <p>Wake Forest and Virginia will be featured on ESPNU on Monday, April 9, at 7 p.m. in Charlottesville as part of the network spring ACC sports coverage.</p>
              <p>
             <span class="btn-group" data-toggle="buttons-checkbox">
  		  <button class="btn btn-mini">Like</button>
  		  <button class="btn btn-mini">Save</button>
  		  <button class="btn btn-mini">RSVP</button>
                  <button class="btn btn-mini btn-primary">More Details</button>
	        </span></p>
            </div><!--/span-->

<?php
        }
        echo '</div>';
    }

    public function footer() {
?>

      <hr>

      <footer>
        
      </footer>

    </div><!--/.fluid-container-->


  </body>
</html>

<?php
    }
}
?>
