<?php
$dbHost = "localhost";
$dbDatabase = "gu";
$dbPass = "";
$dbUser = "root";
$conn = new mysqli($dbHost, $dbUser, $dbPass, $dbDatabase);
?>


<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
  <title>BIFGU</title>
  <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
  <!-- jQuery (necessary JavaScript plugins) -->
  <script src="js/bootstrap.js"></script>
  <script src="jquery-3.2.1.min.js" type="text/javascript"></script>
  <!-- Custom Theme files -->
  <link href="css/style.css" rel='stylesheet' type='text/css' />
  <!-- Custom Theme files -->
  <!--//theme-style-->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="keywords" content="University Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
  <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.js"></script>
    <link rel="icon" href="images/favicon.png" type="image/ico">
</head>
<body>
<!-- banner -->
<script src="js/responsiveslides.min.js"></script>
<script>
    $(function () {
        $("#slider").responsiveSlides({
            auto: true,
            nav: true,
            speed: 500,
            namespace: "callbacks",
            pager: true,
        });
    });
</script>
<div class="banner">


  <a href="index.php"><img src="images/logo.jpg" height="90px" alt=""/></a>

  <div class="top-menu">
    <span class="menu"></span>
    <ul class="navig">
      <li class="active"><a href="index.php">Home</a></li>
      <!-- <li><a href="about.html">About</a></li>
             <li><a href="program.html">Programs</a></li>
             <li><a href="blog.html">Blog</a></li>
             <li><a href="gallery.html">Gallery</a></li>
             <li><a href="contact.html">Contact</a></li>-->
      <li><a href="facilities.php">Facilities</a></li>
      <li><a href="database.php">Database</a></li>
      <li><a href="events.php" >Events</a></li>
      <li><a href="contact.php">Contact</a></li>

    </ul>
  </div>
  <!-- script-for-menu -->

  <script>
        $("span.menu").click(function(){
            $("ul.navig").slideToggle("slow" , function(){
            });
        });
  </script>
  <img src="images/banner.jpg" height="850px" width="1600px" class="img-responsive">

  <div id="scrolll" >
        <marquee scrollamount="7" loop="infinite" bgcolor="transparent"  onmouseover="this.stop()" onmouseout="this.start()";>
            <!--<a href="pdf/sl.pdf" target="_blank">- List of Selected Candidtes for the positions of Trainee & Studentship at BIFGU -</a>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="pdf/sl.pdf" target="_blank">- List of Selected Candidtes for the positions of Trainee & Studentship at BIFGU -</a>
            <a href="pdf/sl.pdf" target="_blank">- List of Selected Candidtes for the positions of Trainee & Studentship at BIFGU -</a>
            <a href="pdf/sl.pdf" target="_blank">- List of Selected Candidtes for the positions of Trainee & Studentship at BIFGU -</a>
            <a href="pdf/sl.pdf" target="_blank">- List of Selected Candidtes for the positions of Trainee & Studentship at BIFGU -</a>
            <a href="pdf/sl.pdf" target="_blank">- List of Selected Candidtes for the positions of Trainee & Studentship at BIFGU -</a>-->
            <?php
            $result = mysqli_query($conn, "SELECT * FROM notice ORDER BY id DESC LIMIT 1");
            while ($row = mysqli_fetch_array($result)) {
                if ($row['link']==''){
                    $link='#';
                }
                else
                    $link='upload/'.$row['link'];

                ?>

                <?php echo "<br><a href='".$link."'>".$row['subject']."</a><br>";?>
            <?php	}	?>

        </marquee>

    </div>

  <!-- script-for-menu -->
</div>
<div class="clearfix"></div>

<!-- <div class="slider">
     <div class="caption">
         <div class="container">
              <div class="callbacks_container">
                  <ul class="rslides" id="slider">
                        <li><h3>Nam eget erat condimentum, gravida felis vel feugiat nisi</h3></li>
                        <li><h3>Quisque egestas mi tellus porta bibendum dignissim euismod.</h3></li>
                        <li><h3>Aenean nec enim pharetra felis malesuada scelerisque eget at felis.</h3></li>
                  </ul>
                    <div class="clearfix"></div>
              </div>
          </div>
      </div>
  </div>-->


<div class="banner-grids">
  <div class="container">
    
    <div class="col-md-12 banner-grid">
            <h3>DOWNLOADS</h3>
           

                   <div class="table-responsive">
                            <table class="table">
                              <thead>
                                <tr style="color: #f3bc24;">
                                  
                                  <th>Volume</th>
                                  <th>File</th>
                                  
                                

                                  
                                </tr>
                              </thead>
                              <tbody>
                                <?php
                               $result = mysqli_query($conn, "SELECT * FROM magazine");
                               while ($row = mysqli_fetch_array($result)) {
    
                                 ?>
                                <tr >
                                  
                                  <?php echo "<td>" . $row['name'] . "</td>";?>
                                  
                                  
                                  <?php echo "<td style='text'><a href='upload/".$row['filename'] ."'><img width='32' height='32' class='img-thumbnail img-responsive' src='uploadImage/".$row['thumbnail']."'></a></td>";?>
                                  
                                  
                                  
                                </tr>
                                <?php 
                                }
                                ?>
                              </tbody>
                            </table>
                        </div>
               

      
  

    
    <div class="clearfix"></div>
  </div>
</div>
</div>

<!---->





    <!--** -->
  <br><br><br><br>
  <div class="copywrite">
    <div class="container">
      <p style="text-align: center;"> Copyright &copy; 2017 BIF Gauhati University.</p>
    </div>
  </div>
  <!---->
</body>
</html>