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
			<li><a href="index.php">Home</a></li>
			<!-- <li><a href="about.html">About</a></li>
             <li><a href="program.html">Programs</a></li>
             <li><a href="blog.html">Blog</a></li>
             <li><a href="gallery.html">Gallery</a></li>
             <li><a href="contact.html">Contact</a></li>-->
			<li class="active"><a href="facilities.php">Facilities</a></li>
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
		<div class="col-md-3 banner-grid">
			<h3>Notice</h3>
			<div class="banner-grid-sec" style="height: 250px !important;">
				<!--<div class="grid_info">
                    <div class="blg-pic">
                        <img src="images/m1.jpg" class="img-responsive" alt="">
                    </div>
                    <div class="blg-pic-info">
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="grid_info">
                    <div class="blg-pic">
                        <img src="images/m2.jpg" class="img-responsive" alt="">
                    </div>
                    <div class="blg-pic-info">
                        <h4><a href="#">Vivamus tempus ligula</a></h4>
                        <p>Aliquam sem velit, rhoncus sed arcu at curabitur et erat eu viverra.</p>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="more">
                    <a href="blog.html">See more from the Blog ></a>
                </div>-->
                <?php
                $result = mysqli_query($conn, "SELECT * FROM notice ORDER BY id DESC");
                while ($row = mysqli_fetch_array($result)) {
                    if ($row['link']==''){
                        $link='#';
                    }
                    else
                        $link='upload/'.$row['link'];

                    ?>

                    <?php echo "<br><a href='".$link."'>".$row['subject']."</a><br>";?>
                <?php	}	?>
			</div>
		</div>
		<div class="col-md-6 banner-grid">
            <h3>Facilities</h3>
            <div class="banner-grid-sec" style="overflow: hidden">
                <div class="news-grid">


                    <?php
                    $result = mysqli_query($conn, "SELECT * FROM facilities ");
                    while ($row = mysqli_fetch_array($result)) {

                        ?>

                        <?php echo "<br><h5>".$row['facilities']."</h5>";?>
                    <?php	}	?>
                    <p style="text-align: justify"></p>
                </div>

            </div>

			<!--<div class="banner-grid-sec">
                <div class="news-grid">
                    <h4><a href="#">Vivamus tempus ligula</a></h4>
                    <p>Aliquam sem velit, rhoncus sed arcu eu viverra.</p>
                </div>
                <div class="news-grid">
                    <h4><a href="#">Vivamus tempus ligula</a></h4>
                    <p>Aliquam sem velit, rhoncus sed arcu eu viverra.</p>
                </div>
                <div class="news-grid">
                    <h4><a href="#">Vivamus tempus ligula</a></h4>
                    <p>Aliquam sem velit, rhoncus sed arcu eu viverra.</p>
                </div>
                <div class="news-grid">
                    <h4><a href="#">Vivamus tempus ligula</a></h4>
                    <p>Aliquam sem velit, rhoncus sed arcu eu viverra.</p>
                </div>
            </div>-->
		</div>
		<div class="col-md-3 banner-grid">
			<h3>E-Magazine</h3>
			<div class="banner-grid-sec news_sec" style="height: 250px !important; overflow: hidden">
				<?php
						       $result = mysqli_query($conn, "SELECT * FROM magazine ORDER BY id DESC LIMIT 1");
						       while ($row = mysqli_fetch_array($result)) {

						         ?>

				<div id='imgg'></div>
				<?php echo "<a href='magazine.php' target='_blank'><div id='mag'><img class='img-responsive img-rounded' src='uploadImage/".$row['thumbnail']."'></div></a>";?>
				<?php }?>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>

<!---->



<div class="banner-grids">
	<div class="container">
		<div class="col-md-3 banner-grid">
			<h3>Research</h3>
			<div class="banner-grid-sec" style="height: 250px !important;">
				<!--<div class="grid_info">
					<div class="blg-pic">
						<img src="images/m1.jpg" class="img-responsive" alt="">
					</div>
					<div class="blg-pic-info">
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="grid_info">
					<div class="blg-pic">
						<img src="images/m2.jpg" class="img-responsive" alt="">
					</div>
					<div class="blg-pic-info">
						<h4><a href="#">Vivamus tempus ligula</a></h4>
						<p>Aliquam sem velit, rhoncus sed arcu at curabitur et erat eu viverra.</p>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="more">
					<a href="blog.html">See more from the Blog ></a>
				</div>-->
                <?php
                $result = mysqli_query($conn, "SELECT * FROM research");
                while ($row = mysqli_fetch_array($result)) {

                    ?>


<?php echo "<h5 style='color:white;'>*".$row['subject']."</h5><br>";?>
    <?php   }   ?>
            
			</div>
		</div>
		<div class="col-md-6 banner-grid">

		</div>
		<div class="col-md-3 banner-grid">
			<h3>Publications</h3>
			<div class="banner-grid-sec news_sec" style="height: 250px !important;">
				<?php
						       $result = mysqli_query($conn, "SELECT * FROM publication");
						       while ($row = mysqli_fetch_array($result)) {

						         ?>


				<?php echo "<br><h5><a href='".$row['link']."'>".$row['name']."</a></h5>";?>
    <?php   }   ?>
			</div>
		</div>

	</div>
</div>

<div class="banner-grids">
	<div class="container">
		<div class="col-md-3 banner-grid">
			<h3>Find Us</h3>
			<div class="banner-grid-sec" style="height: 250px !important;overflow: hidden;">


				<iframe width="100%" height="100%" frameborder="1" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=place_id:ChIJZyrxYsdEWjcREXZFAwVqOJU&key=AIzaSyDl5wYe4eMKnFSspALAnOvw4A79mAeLUso" allowfullscreen></iframe>




			</div>
		</div>
		<div class="col-md-6 banner-grid">
			<!--<h3>About</h3>
			<div class="banner-grid-sec">
				<div class="news-grid">
					<h4><a href="#">Vivamus tempus ligula</a></h4>
					<p>Aliquam sem velit, rhoncus sed arcu eu viverra.</p>
				</div>
				<div class="news-grid">
					<h4><a href="#">Vivamus tempus ligula</a></h4>
					<p>Aliquam sem velit, rhoncus sed arcu eu viverra.</p>
				</div>
				<div class="news-grid">
					<h4><a href="#">Vivamus tempus ligula</a></h4>
					<p>Aliquam sem velit, rhoncus sed arcu eu viverra.</p>
				</div>
				<div class="news-grid">
					<h4><a href="#">Vivamus tempus ligula</a></h4>
					<p>Aliquam sem velit, rhoncus sed arcu eu viverra.</p>
				</div>
			</div>-->
		</div>
		<div class="col-md-3 banner-grid">
			<h3>Important Links</h3>
			<div class="banner-grid-sec news_sec" style="height: 250px !important;padding: 1em">
            <!--<a href="http://www.dbtindia.nic.in/">DBT INDIA</a>
            <p><a href="http://delcon.gov.in/">DELCON</p>
            <p><a href="http://shodhganga.inflibnet.ac.in/">SODHGANGA</p>
            <p><a href="http://www.btisnet.gov.in/index.asp">BTISNET</p>
            <p><a href="http://www.ugc.ac.in/">UGC</p>
            <p><a href="https://www.sciencedaily.com/news/plants_animals/life_sciences/">SCIENCE DAILY</p>-->



                <?php
                $result = mysqli_query($conn, "SELECT * FROM link ");
                while ($row = mysqli_fetch_array($result)) {

                    ?>
                    <?php echo "<br><h5><a href='".$row['address']."'>".$row['name']."</a></h5>";?>
                <?php	}	?>


        </div>
			<div class="clearfix"></div>
		</div>
	</div>
	<!---->
	<!--<div class="welcome">
         <div class="container">
             <h2></h2>
             <div class="welcm_sec">
                 <div class="col-md-9 campus">
                     <div class="campus_head">
                         <h3>Welcome</h3>
                         <p>Nunc justo sapien, cursus at urna at, placerat porttitor tellus. Aliquam vehicula tellus nunc,
                         id pretium lacus placerat dignissim. Donec quis dui sed lacus vulputate scelerisque a sit amet neque.</p>
                     </div>
                     <div class="col-md-3 wel_grid">
                         <img src="images/w1.jpg" class="img-responsive" alt=""/>
                         <h5><a href="#">Aliquam sit amet</a></h5>
                         <p>Morbi molestie nec ante ultrices. Cum sociis natoque penatibus et magnis dis parturient</p>
                     </div>
                     <div class="col-md-3 wel_grid">
                         <img src="images/w3.jpg" class="img-responsive" alt=""/>
                         <h5><a href="#">Aliquam sit amet</a></h5>
                         <p>Morbi molestie nec ante ultrices. Cum sociis natoque penatibus et magnis dis parturient</p>
                     </div>
                     <div class="col-md-3 wel_grid">
                         <img src="images/w2.jpg" class="img-responsive" alt=""/>
                         <h5><a href="#">Aliquam sit amet</a></h5>
                         <p>Morbi molestie nec ante ultrices. Cum sociis natoque penatibus et magnis dis parturient</p>
                     </div>
                     <div class="col-md-3 wel_grid">
                         <img src="images/w4.jpg" class="img-responsive" alt=""/>
                         <h5><a href="#">Aliquam sit amet</a></h5>
                         <p>Morbi molestie nec ante ultrices. Cum sociis natoque penatibus et magnis dis parturient</p>
                     </div>
                     <div class="clearfix"></div>
                     <div class="more_info">
                             <a href="blog.html">More Info....</a>
                     </div>
                 </div>
                 <div class="col-md-3 testimonal">
                        <h3>Testimonials</h3>
                        <div class="testimnl-grid">
                             <a href="#"><p>Aenean ultrices commodo risus, id sollicitudin nunc commodo at. Sed sagittis, lacus id viverra eleifend, enim magna.</p></a>
                             <h5>John.Mr</h5>
                        </div>
                        <div class="testimnl-grid">
                             <a href="#"><p>Aenean ultrices commodo risus, id sollicitudin nunc commodo at. Sed sagittis, lacus id viverra eleifend, enim magna.</p></a>
                             <h5>John.Mr</h5>
                        </div>
                        <div class="testimnl-grid">
                             <a href="#"><p>Aenean ultrices commodo risus, id sollicitudin nunc commodo at. Sed sagittis, lacus id viverra eleifend, enim magna.</p></a>
                             <h5>John.Mr</h5>
                        </div>
                 </div>
                 <div class="clearfix"></div>
             </div>
         </div>
    </div>
    <!---->
	<!--<div class="news">
         <div class="container">
             <h3>Top News</h3>
              <div class="event-grids">
                 <div class="col-md-4 event-grid">
                     <div class="date">
                         <h4>26</h4>
                         <span>08/2012</span>
                     </div>
                     <div class="event-info">
                          <h5><a href="#">Etiam malesuada feugiat rutrum purus quis vulputate.</a></h5>
                            <p>Praesent sagittis in enim vel cursus. Aenean velit ante, maximus ac placerat at,
                            volutpat et orci. Aliquam eu tellus orci.</p>
                     </div>
                     <div class="clearfix"></div>
                 </div>
                 <div class="col-md-4 event-grid">
                     <div class="date">
                         <h4>24</h4>
                         <span>06/2012</span>
                     </div>
                     <div class="event-info">
                          <h5><a href="#">Etiam malesuada feugiat rutrum purus quis vulputate.</a></h5>
                            <p>Praesent sagittis in enim vel cursus. Aenean velit ante, maximus ac placerat at,
                            volutpat et orci. Aliquam eu tellus orci.</p>
                     </div>
                     <div class="clearfix"></div>
                 </div>
                 <div class="col-md-4 event-grid">
                     <div class="date">
                         <h4>20</h4>
                         <span>04/2012</span>
                     </div>
                     <div class="event-info">
                          <h5><a href="#">Etiam malesuada feugiat rutrum purus quis vulputate.</a></h5>
                            <p>Praesent sagittis in enim vel cursus. Aenean velit ante, maximus ac placerat at,
                            volutpat et orci. Aliquam eu tellus orci.</p>
                     </div>
                     <div class="clearfix"></div>
                 </div>
                 <div class="clearfix"></div>
             </div>
         </div>
    </div>
    <!--****-->
	<!--<div class="footer">
         <div class="container">
             <div class="ftr-sec">
                 <div class="col-md-4 ftr-grid">
                     <h3>Text Module</h3>
                     <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam ut odio ut quam convallis ultricies. Morbi rutrum lectus tortor. Cras vitae semper mi, et feugiat dolor.</p>
                     <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam ut odio ut quam convallis ultricies. Morbi rutrum lectus tortor. Cras vitae semper mi, et feugiat dolor.</p>
                 </div>
                 <div class="col-md-4 ftr-grid2">
                     <h3>Pages</h3>
                     <ul>
                         <li><a href="index.html"><span></span>Home</a></li>
                         <li><a href="about.html"><span></span>About</a></li>
                         <li><a href="program.html"><span></span>Programs</a></li>
                         <li><a href="blog.html"><span></span>Blog</a></li>
                         <li><a href="gallery.html"><span></span>Gallery</a></li>
                         <li><a href="contact.html"><span></span>Contact</a></li>
                     </ul>
                 </div>
                 <div class="col-md-4 ftr-grid3">
                     <h3>Quick links</h3>
                     <ul>
                         <li><a href="about.html"><span></span>History</a></li>
                         <li><a href="about.html"><span></span>Departments</a></li>
                         <li><a href="gallery.html"><span></span>Services</a></li>
                         <li><a href="blog.html"><span></span>Guidancs</a></li>
                         <li><a href="about.html"><span></span>Team</a></li>
                         <li><a href="contact.html"><span></span>Contact</a></li>
                     </ul>
                 </div>
                 <div class="clearfix"></div>
             </div>
         </div>
    </div>
    <!--** -->
	<br><br><br><br>
	<div class="copywrite">
		<div class="container">
			<p>	Copyright &copy; 2017 BIF Gauhati University.</p>
		</div>
	</div>
	<!---->
</body>
</html>