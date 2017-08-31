<?php

session_start();
if(!isset($_SESSION['email']))
{
	header('location:login.html');
}

$dbHost = "localhost";
$dbDatabase = "gu";
$dbPass = "";
$dbUser = "root";
$conn = new mysqli($dbHost, $dbUser, $dbPass, $dbDatabase);



?>


<!DOCTYPE html>
<html>
  <head>
    <title>Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href="css/styles.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
      <link rel="icon" href="../images/favicon.png" type="image/ico">
  </head>
  <body>
  	<div class="header">
	     <div class="container">
	        <div class="row">
	           <div class="col-md-5">
	              <!-- Logo -->
	              <div class="logo">
	                 <h1><a href="index.php">Dashboard</a></h1>
	              </div>
	           </div>
	           <div class="col-md-5">
	              <div class="row">
	                <div class="col-lg-12">
                        <!--  <div class="input-group form">
                              <input type="text" class="form-control" placeholder="Search...">
                              <span class="input-group-btn">
                               <button class="btn btn-primary" type="button">Search</button>
	                       </span>
	                  </div>-->
	                </div>
	              </div>
	           </div>
	           <div class="col-md-2">
	              <div class="navbar navbar-inverse" role="banner">
	                  <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
	                    <ul class="nav navbar-nav">
	                      <li class="dropdown">
	                        <a href="logout.php">Logout</a>
	                        <!--<ul class="dropdown-menu animated fadeInUp">
	                          <li><a href="profile.html">Profile</a></li>
	                          <li><a href="login.html">Logout</a></li>
	                        </ul>-->
	                      </li>
	                    </ul>
	                  </nav>
	              </div>
	           </div>
	        </div>
	     </div>
	</div>

    <div class="page-content">
    
    	<div class="row">
		  <div class="col-md-2">
		  

		  	<div class="sidebar content-box" style="display: block;">
		  	
                <ul class="nav">
                    <!-- Main menu -->
                    
                    <li class="current"><a   id="notice"> Add Notice</a></li>
                    <li class="current"><a id="research"> Add Research</a></li>
                    <li class="current"><a id="publication"> Add Publication</a></li>
                    <li class="current"><a id="magazine"> Add Magazine</a></li>
                    <li class="current"><a id="events"> Add Events</a></li>
                    <li class="current"><a id="gallery">Add Gallery</a></li>
                    <li class="current"><a id="links">Important Links</a></li>
                    <li class="current"><a id="about">About</a></li>
                    <li class="current"><a id="facilities">Facilities</a></li>
                    <li class="current"><a id="contact">View Messages</a></li>

                
                <ul>
             </div>
		  </div>

		  <div class="col-md-5" id="addNotice">

	  			<div class="row">
	  				<div class="col-md-12">
	  					<div class="content-box-large">
			  				<div class="panel-heading">
					            <div class="panel-title">Add  Notice</div>
					          
					            <div class="panel-options">
					              <a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
					              <a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
					            </div>
					        </div>
			  				<div class="panel-body">
			  					<form class="form-horizontal" role="form">
								  <div class="form-group">
								    <label for="subject" class="col-sm-2 control-label">Subject</label>
								    <!--<label>Subject</label>-->
								    <div class="col-sm-10">
								      <!--<input type="text" class="form-control" id="inputEmail3" placeholder="State Name">-->
								      
                                            <input id="subject" type="text" class="form-control border-input" placeholder="" value="">
								    </div>
								  </div>

								  <!--<div class="form-group">
								    <label for="description" class="col-sm-2 control-label">Description</label>
								    
								    <div class="col-sm-10">
								      
								      
                                            <input id="description" type="text" class="form-control border-input" placeholder="" value="">
								    </div>
								  </div>-->

								  <div class="form-group">
								    <label for="magazine" class="col-sm-2 control-label">pdf</label>
								    <span style="color: red">(in pdf format)</span>
								    <div class="col-sm-10">
								      
								      
								      <input class="form-control border-input" type="file" name="noticePdf" id="noticePdf" required>
								    </div>
								  </div>
								  

								  <div class="form-group">
								    <div class="col-sm-offset-2 col-sm-10">
								      <button type="button" id="submitNotice" class="btn btn-primary">Submit</button>
								    </div>
								  </div>
								</form>
			  				</div>
			  			</div>
	  				</div>
	  				
	  			</div>	
	  			</div>

	  			<div class="col-md-5 " id="showNotice">
  					<div class="content-box-large">
		  				<div class="panel-heading">
							<div class="panel-title">Notice</div>
							
							<div class="panel-options">
								<a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
								<a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
							</div>
						</div>
						

		  				<div class="panel-body table-responsive">
		  					<table class="table table-striped table-hover table-condensed">
				              <thead>
				                <tr>
				                  <th>ID</th>
				                  <th>Subject</th>
				                  <th>File</th>
				                  <th></th>
				                </tr>
				              </thead>
				              <tbody>
				              <?php
						       $result = mysqli_query($conn, "SELECT * FROM notice ");
						       while ($row = mysqli_fetch_array($result)) {
    
						         ?>
				                <tr>
				                  <?php echo "<td>" . $row['id'] . "</td>";?>
				                  <?php //echo "<td style ='word-break:break-word;'>" . $row['subject'] . "</td>";?>
				                  <?php echo "<td style ='word-break:break-word;'><textarea class='form-control' rows='3' id='updateNsubject".$row['id']."'>". $row['subject'] ."</textarea></td>";?>
                                  
                                  <?php //echo "<td style ='word-break:break-word;'>" . $row['link'] . "</td>";?>
                                  <?php //echo "<td style ='word-break:break-word;'><textarea class='form-control' rows='3' id='updateNlink".$row['id']."'>". $row['link'] ."</textarea></td>";?>
                                  <?php echo "<td><a href='../upload/".$row['link'] ."'>View</a></td>";?>


                                  <?php echo "<td style ='word-break:break-word;'><button type='button' class='btn btn-info btn-xs deleteNotice' id='".$row['id']."' >Delete </button></td>"; ?>
                                  <?php echo "<td style ='word-break:break-word;'><button type='button' class='btn btn-primary btn-xs updateNotice' id='".$row['id']."' >Update </button></td>"; ?>
				                </tr>
				                <?php 
				                }
				                ?>
				              </tbody>
				            </table>
		  				</div>
		  			</div>
  				</div>
  			


	  			<div class="col-md-5" id="addResearch" style="display: none;">

	  			<div class="row">
	  				<div class="col-md-12">
	  					<div class="content-box-large">
			  				<div class="panel-heading">
					            <div class="panel-title">Add Research</div>
					          
					            <div class="panel-options">
					              <a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
					              <a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
					            </div>
					        </div>
			  				<div class="panel-body">
			  					<form class="form-horizontal" role="form">
								  
								  <div class="form-group">
								    <label for="Subject" class="col-sm-2 control-label">Subject</label>
								    <div class="col-sm-10">
								      <input type="text" class="form-control" id="researchSubject" placeholder="">
								    </div>
								  </div>

								  <!--<div class="form-group">
								    <label for="Description" class="col-sm-2 control-label">Description</label>
								    <div class="col-sm-10">
								      <input type="text" class="form-control" id="researchDescription" placeholder="">
								    </div>
								  </div>

								  <div class="form-group">
								    <label for="link" class="col-sm-2 control-label">Link</label>
								    <div class="col-sm-10">
								      <input type="text" class="form-control" id="researchLink" placeholder="">
								    </div>
								  </div>-->

								  <div class="form-group">
								    <label for="scholar" class="col-sm-2 control-label">Scholar</label>
								    <div class="col-sm-10">
								      <input type="text" class="form-control" id="researchScholar" placeholder="">
								    </div>
								  </div>
								  
								  <div class="form-group">
								    <div class="col-sm-offset-2 col-sm-10">
								      <button type="button" class="btn btn-primary" id="submitResearch">Submit</button>
								    </div>
								  </div>
								</form>
			  				</div>
			  			</div>
	  				</div>
	  				
	  			</div>	
	  			</div>

	  			<div class="col-md-5"  id="showResearch" style="display: none;">
  					<div class="content-box-large">
		  				<div class="panel-heading">
							<div class="panel-title">Research</div>
							
							<div class="panel-options">
								<a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
								<a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
							</div>
						</div>
		  				<div class="panel-body table-responsive">
		  					<table class="table table-striped">
				              <thead>
				                <tr>
				                
				                  <th>Id</th>
				                  <th>Subject</th>
				                  
				                  <th>Contributor</th>
				                </tr>
				              </thead>
				              <tbody>

				               <?php
						       $result = mysqli_query($conn, "SELECT * FROM research ");
						       while ($row = mysqli_fetch_array($result)) {
    
						         ?>
				                <tr>
				                <?php //echo "<td><input type='checkbox' id='".$row['id']."'></td>"; ?>
				              
				                  <?php echo "<td>" . $row['id'] . "</td>";?>
				                  <?php echo "<td style ='word-break:break-word;'><textarea class='form-control' rows='3' id='updateRsubject".$row['id']."'>". $row['subject'] ."</textarea></td>";?>
                                  
                                  <?php echo "<td style ='word-break:break-word;'><textarea class='form-control' rows='3' id='updateRscholar".$row['id']."'>". $row['scholar'] ."</textarea></td>";?>
                                  <?php echo "<td style ='word-break:break-word;'><button type='button' class='btn btn-primary btn-xs deleteResearch' id='".$row['id']."' >Delete </button></td>"; ?>
                                  <?php echo "<td style ='word-break:break-word;'><button type='button' class='btn btn-primary btn-xs updateResearch' id='".$row['id']."' >Update </button></td>"; ?>
				                </tr>
				                <?php 
				                }
				                ?>
				                
				              </tbody>
				            </table>
		  				</div>
		  			</div>
  				
  			</div>



	  			<div class="col-md-5" id="addPublication" style="display: none">

	  			<div class="row">
	  				<div class="col-md-12">
	  					<div class="content-box-large">
			  				<div class="panel-heading">
					            <div class="panel-title">Add Publication</div>
					          
					            <div class="panel-options">
					              <a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
					              <a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
					            </div>
					        </div>
			  				<div class="panel-body">
			  					<form class="form-horizontal" role="form">
								  <div class="form-group">
								    <label for="stateName" class="col-sm-2 control-label">Paper Name</label>
								    <div class="col-sm-10">
								     
                                        <input id="pubName" type="text" class="form-control border-input" placeholder="" value="">
								      
								    </div>
								  </div>

								  
								  <div class="form-group">
								    <label class="col-sm-2 control-label">Link</label>
								    <div class="col-sm-10">
								      <input type="text" name="" class="form-control" placeholder="" id="pubDescription">
								    </div>
								  </div>

								  <div class="form-group">
								    <label class="col-sm-2 control-label">Contributor</label>
								    <div class="col-sm-10">
								      <input type="text" name="" class="form-control" placeholder="" id="pubContributor">
								    </div>
								  </div>

								  
								  
								  <div class="form-group">
								    <div class="col-sm-offset-2 col-sm-10">
								      <button type="button" class="btn btn-primary" id="submitPub">Submit</button>
								    </div>
								  </div>
								</form>
			  				</div>
			  			</div>
	  				</div>
	  				
	  			</div>	
	  			</div>


	  			<div class="col-md-5" style="display: none" id="showPublication">
  					<div class="content-box-large">
		  				<div class="panel-heading">
							<div class="panel-title">Publications</div>
							
							<div class="panel-options">
								<a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
								<a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
							</div>
						</div>
		  				<div class="panel-body table-responsive">
		  					<table class="table table-striped">
				              <thead>
				                <tr>
				                  <th>id</th>
				                  <th>Name</th>
				                  <th>Contributor</th>
				                  <th>Link</th>
				                  
				                  
				                  <th></th>

				                  
				                </tr>
				              </thead>
				              <tbody>
				                <?php
						       $result = mysqli_query($conn, "SELECT * FROM publication");
						       while ($row = mysqli_fetch_array($result)) {
    
						         ?>
				                <tr>
				                  <?php echo "<td>" . $row['id'] . "</td>";?>
				                  <?php //echo "<td>" . $row['name'] . "</td>";?>
				                  <?php echo "<td style ='word-break:break-word;'><textarea class='form-control' rows='3' id='updatePname".$row['id']."'>". $row['name'] ."</textarea></td>";?>

                                  <?php //echo "<td>" . $row['contributor'] . "</td>";?>
                                  <?php echo "<td style ='word-break:break-word;'><textarea class='form-control' rows='3' id='updatePcontributor".$row['id']."'>". $row['contributor'] ."</textarea></td>";?>
                                  <?php //echo "<td>" . $row['link'] . "</td>";?>
                                  <?php echo "<td style ='word-break:break-word;'><textarea class='form-control' rows='3' id='updatePlink".$row['id']."'>". $row['link'] ."</textarea></td>";?>
                                  
                                  <?php echo "<td><button type='button' class='btn btn-primary btn-xs deletePub' id='".$row['id']."' >Delete </button></td>"; ?>
                                  <?php echo "<td style ='word-break:break-word;'><button type='button' class='btn btn-primary btn-xs updatePub' id='".$row['id']."' >Update </button></td>"; ?>
				                </tr>
				                <?php 
				                }
				                ?>
				              </tbody>
				            </table>
		  				</div>
		  			</div>
  				</div>
  			



	  			<div class="col-md-5" id="addeMagazine" style="display: none">

	  			<div class="row">
	  				<div class="col-md-12">
	  					<div class="content-box-large">
			  				<div class="panel-heading">
					            <div class="panel-title">Add eMagazine</div>
					          
					            <div class="panel-options">
					              <a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
					              <a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
					            </div>
					        </div>
			  				<div class="panel-body">
			  				<form class="form-horizontal" role="form">
								  <div class="form-group">
								    <label for="magazine" class="col-sm-2 control-label">eMagazine</label>
								    <span style="color: red">(in pdf format)</span>
								    <div class="col-sm-10">
								      
								      
								      <input class="form-control border-input" type="file" name="Emagazine" id="Emagazine">
								    </div>
								  </div>

								  <div class="form-group">
								    <label for="magazineThumbnail" class="col-sm-2 control-label">eMagazine Thumbnail</label>
								    <span style="color: red">(in image format)</span>
								    <div class="col-sm-10">
								      
								      
								      <input class="form-control border-input" type="file" name="magazineThumbnail" id="magazineThumbnail">
								    </div>
								  </div>

								  <div class="form-group">
								    <label for="stateName" class="col-sm-2 control-label">Volume</label>
								    
								    <div class="col-sm-10">
								      
								      <input id="magazineName" type="text" class="form-control border-input" placeholder="" value="">
								    </div>
								  </div>
								  
								  
								  <div class="form-group">
								    <div class="col-sm-offset-2 col-sm-10">
								      <button type="button" class="btn btn-primary" id="submiteMagazine">Submit</button>
								    </div>
								  </div>
								</form>
			  				</div>
			  			</div>
	  				</div>
	  				
	  			</div>	
	  			</div>


	  			<div class="col-md-5" style="display: none" id="showeMagazine">
  					<div class="content-box-large">
		  				<div class="panel-heading">
							<div class="panel-title">Magazines</div>
							
							<div class="panel-options">
								<a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
								<a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
							</div>
						</div>
		  				<div class="panel-body table-responsive">
		  					<table class="table table-striped">
				              <thead>
				                <tr>
				                  <th>id</th>
				                  <th>Volume</th>
				                  <th>File</th>
				                  
				                  <th></th>

				                  
				                </tr>
				              </thead>
				              <tbody>
				                <?php
						       $result = mysqli_query($conn, "SELECT * FROM magazine");
						       while ($row = mysqli_fetch_array($result)) {
    
						         ?>
				                <tr >
				                  <?php echo "<td>" . $row['id'] . "</td>";?>
				                  <?php echo "<td>" . $row['name'] . "</td>";?>
                                  
                                  
                                  <?php echo "<td><a href='../upload/".$row['filename'] ."'><img width='32' height='32' class='img-thumbnail img-responsive' src='../uploadImage/".$row['thumbnail']."'></a></td>";?>
                                  
                                  
                                  <?php echo "<td><button type='button' class='btn btn-primary btn-xs deleteMag' id='".$row['id']."' >Delete </button></td>"; ?>
				                </tr>
				                <?php 
				                }
				                ?>
				              </tbody>
				            </table>
		  				</div>
		  			</div>
  				</div>



	  			<div class="col-md-5" id="addevents" style="display: none">

	  			<div class="row">
	  				<div class="col-md-12">
	  					<div class="content-box-large">
			  				<div class="panel-heading">
					            <div class="panel-title">Add Events</div>
					          
					            <div class="panel-options">
					              <a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
					              <a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
					            </div>
					        </div>
			  				<div class="panel-body">
			  				<form class="form-horizontal" role="form">
								  <div class="form-group">
								    <label for="stateName" class="col-sm-2 control-label">Name</label>
								    <div class="col-sm-10">
								    
								    <input id="eventName" type="text" class="form-control border-input" placeholder="" value="">
								      
								    </div>
								  </div>

								  <div class="form-group">
								    <label for="stateName" class="col-sm-2 control-label">Date</label>
								    <div class="col-sm-10">
								      
								      <input id="eventDate" type="date" class="form-control border-input" placeholder="" value="">
								    </div>
								  </div>
								  <div class="form-group">
								    <label class="col-sm-2 control-label">Description</label>
								    <div class="col-sm-10">
								      <input id="evenLink" type="text" class="form-control border-input" placeholder="" value="">
								    </div>
								  </div>
								  
								  <div class="form-group">
								    <div class="col-sm-offset-2 col-sm-10">
								      <button type="button" class="btn btn-primary" id="submitEvent">Submit</button>
								    </div>
								  </div>
								</form>
			  				</div>
			  			</div>
	  				</div>
	  				
	  			</div>	
	  			</div>


	  			<div class="col-md-5" style="display: none" id="showevents">
  					<div class="content-box-large">
		  				<div class="panel-heading">
							<div class="panel-title">Events</div>
							
							<div class="panel-options">
								<a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
								<a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
							</div>
						</div>
		  				<div class="panel-body table-responsive">
		  				 <table class="table table-striped">
		  					<thead>
				                <tr>
				                  <th>ID</th>
				                  <th>Name</th>
				                  <th>Date</th>
				                  <th>Description</th>
				                  <th></th>
				                </tr>
				              </thead>
				              <tbody>
				              <?php
						       $result = mysqli_query($conn, "SELECT * FROM event");
						       while ($row = mysqli_fetch_array($result)) {
    
						         ?>
				                <tr>
				                  <?php echo "<td>" . $row['id'] . "</td>";?>
				                  <?php  //echo "<td style ='word-break:break-word;'>" . $row['name'] . "</td>";?>

				                  <?php echo "<td style ='word-break:break-word;'><textarea class='form-control' rows='3' id='updateEname".$row['id']."'>". $row['name'] ."</textarea></td>";?>

                                  <?php //echo "<td style ='word-break:break-word;'>" . $row['date'] . "</td>";?>
                                  <?php echo "<td style ='word-break:break-word;'><textarea class='form-control' rows='3' id='updateEdate".$row['id']."'>". $row['date'] ."</textarea></td>";?>

                                  <?php //echo "<td style ='word-break:break-word;'>" . $row['description'] . "</td>";?>
                                  <?php echo "<td style ='word-break:break-word;'><textarea class='form-control' rows='3' id='updateEdescription".$row['id']."'>". $row['description'] ."</textarea></td>";?>

                                  <?php echo "<td style ='word-break:break-word;'><button type='button' class='btn btn-info btn-xs deleteEvent' id='".$row['id']."' >Delete </button></td>"; ?>
                                  <?php echo "<td style ='word-break:break-word;'><button type='button' class='btn btn-primary btn-xs updateEvent' id='".$row['id']."' >Update </button></td>"; ?>
				                </tr>
				                <?php 
				                }
				                ?>
				              </tbody>
                          </table>
		  				</div>
		  			</div>
  				</div>

  				<div class="col-md-5" id="addGallery" style="display: none">

	  			<div class="row">
	  				<div class="col-md-12">
	  					<div class="content-box-large">
			  				<div class="panel-heading">
					            <div class="panel-title">Gallery</div>
					          
					            <div class="panel-options">
					              <a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
					              <a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
					            </div>
					        </div>
			  				<div class="panel-body">
			  				<form class="form-horizontal" role="form">
								  

								  <div class="form-group">
								    <label for="magazineThumbnail" class="col-sm-2 control-label">Image Slide</label>
								    <span style="color: red">(in image format)&nbsp;(width:757px) (height:450px)</span>
								    <div class="col-sm-10">
								      
								      
								      <input class="form-control border-input" type="file" name="galleryUpload" id="galleryUpload">
								    </div>
								  </div>

								  
								  
								  
								  <div class="form-group">
								    <div class="col-sm-offset-2 col-sm-10">
								      <button type="button" class="btn btn-primary" id="submitGallery">Submit</button>
								    </div>
								  </div>
								</form>
			  				</div>
			  			</div>
	  				</div>
	  				
	  			</div>	
	  			</div>

	  			<div class="col-md-5" style="display: none" id="showGallery" style="display: none;">
  					<div class="content-box-large">
		  				<div class="panel-heading">
							<div class="panel-title">Slides</div>
							
							<div class="panel-options">
								<a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
								<a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
							</div>
						</div>
		  				<div class="panel-body table-responsive">
		  					<table class="table table-striped">
				              <thead>
				                <tr>
				                  <th>id</th>
				                  <th>Name</th>
				                  <th>File</th>
				                  
				                  <th></th>

				                  
				                </tr>
				              </thead>
				              <tbody>
				                <?php
						       $result = mysqli_query($conn, "SELECT * FROM gallery");
						       while ($row = mysqli_fetch_array($result)) {
    
						         ?>
				                <tr >
				                  <?php echo "<td>" . $row['id'] . "</td>";?>
				                  <?php echo "<td>" . $row['name'] . "</td>";?>
                                  
                                  
                                  <?php echo "<td><a href='../img/".$row['name'] ."'><img width='32' height='32' class='img-thumbnail img-responsive' src='../img/".$row['name']."'></a></td>";?>
                                  
                                  
                                  <?php echo "<td><button type='button' class='btn btn-primary btn-xs deleteGallery' id='".$row['id']."'>Delete</button></td>"; ?>
				                </tr>
				                <?php 
				                }
				                ?>
				              </tbody>
				            </table>
		  				</div>
		  			</div>
  				</div>


  				<div class="col-md-5" id="addLink" style="display: none;">

	  			<div class="row">
	  				<div class="col-md-12">
	  					<div class="content-box-large">
			  				<div class="panel-heading">
					            <div class="panel-title">Important Links</div>
					          
					            <div class="panel-options">
					              <a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
					              <a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
					            </div>
					        </div>
			  				<div class="panel-body">
			  					<form class="form-horizontal" role="form">
								  
								  <div class="form-group">
								    <label for="Subject" class="col-sm-2 control-label">Name</label>
								    <div class="col-sm-10">
								      <input type="text" class="form-control" id="linkName" placeholder="">
								    </div>
								  </div>

								  <!--<div class="form-group">
								    <label for="Description" class="col-sm-2 control-label">Description</label>
								    <div class="col-sm-10">
								      <input type="text" class="form-control" id="researchDescription" placeholder="">
								    </div>
								  </div>

								  <div class="form-group">
								    <label for="link" class="col-sm-2 control-label">Link</label>
								    <div class="col-sm-10">
								      <input type="text" class="form-control" id="researchLink" placeholder="">
								    </div>
								  </div>-->

								  <div class="form-group">
								    <label for="scholar" class="col-sm-2 control-label">Link</label>
								    <div class="col-sm-10">
								      <input type="text" class="form-control" id="linkAddress" placeholder="">
								    </div>
								  </div>
								  
								  <div class="form-group">
								    <div class="col-sm-offset-2 col-sm-10">
								      <button type="button" class="btn btn-primary" id="submitLink">Submit</button>
								    </div>
								  </div>
								</form>
			  				</div>
			  			</div>
	  				</div>
	  				
	  			</div>	
	  			</div>

	  			<div class="col-md-5"  id="showLink" style="display: none;">
  					<div class="content-box-large">
		  				<div class="panel-heading">
							<div class="panel-title">Links</div>
							
							<div class="panel-options">
								<a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
								<a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
							</div>
						</div>
		  				<div class="panel-body table-responsive">
		  					<table class="table table-striped">
				              <thead>
				                <tr>
				                
				                  <th>Id</th>
				                  <th>Name</th>
				                  
				                  <th>Link</th>
				                </tr>
				              </thead>
				              <tbody>

				               <?php
						       $result = mysqli_query($conn, "SELECT * FROM link ");
						       while ($row = mysqli_fetch_array($result)) {
    
						         ?>
				                <tr>
				                <?php //echo "<td><input type='checkbox' id='".$row['id']."'></td>"; ?>
				              
				                  <?php echo "<td>" . $row['id'] . "</td>";?>
				                  <?php echo "<td style ='word-break:break-word;'><textarea class='form-control' rows='3' id='updateLname".$row['id']."'>". $row['name'] ."</textarea></td>";?>
                                  
                                  <?php echo "<td style ='word-break:break-word;'><textarea class='form-control' rows='3' id='updateLaddress".$row['id']."'>". $row['address'] ."</textarea></td>";?>
                                  <?php echo "<td style ='word-break:break-word;'><button type='button' class='btn btn-primary btn-xs deleteLink' id='".$row['id']."' >Delete</button></td>"; ?>
                                  <?php echo "<td style ='word-break:break-word;'><button type='button' class='btn btn-primary btn-xs updateLink' id='".$row['id']."' >Update</button></td>"; ?>
				                </tr>
				                <?php 
				                }
				                ?>
				                
				              </tbody>
				            </table>
		  				</div>
		  			</div>
  				
  			</div>

<div class="col-md-5" id="addAbout" style="display: none;">

	  			<div class="row">
	  				<div class="col-md-12">
	  					<div class="content-box-large">
			  				<div class="panel-heading">
					            <div class="panel-title">About</div>
					          
					            <div class="panel-options">
					              <a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
					              <a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
					            </div>
					        </div>
			  				<div class="panel-body">
			  					<form class="form-horizontal" role="form">
								  
								  <div class="form-group">
								    <label for="Subject" class="col-sm-2 control-label">About</label>
								    <div class="col-sm-10">
						         <?php
						       $result = mysqli_query($conn, "SELECT * FROM about ");
						          while ($row = mysqli_fetch_array($result)) {
    
						           

								 echo "<textarea class='form-control' rows='10' id='updateAbout".$row['id']."'>".$row['about']."</textarea>";?>

								      
								    </div>
								  </div>


								  
								  
								  <div class="form-group">
								    <div class="col-sm-offset-2 col-sm-10">
								      <button type="button" class="btn btn-primary submitAbout" <?php echo "id='".$row['id']."' " ?> >Update</button>
								    </div>
								  </div>
								  <?php } ?>
								</form>
			  				</div>
			  			</div>
	  				</div>
	  				
	  			</div>	
	  			</div>

	  			<div class="col-md-5" id="addFacilities" style="display: none;">

	  			<div class="row">
	  				<div class="col-md-12">
	  					<div class="content-box-large">
			  				<div class="panel-heading">
					            <div class="panel-title">Facilities</div>
					          
					            <div class="panel-options">
					              <a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
					              <a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
					            </div>
					        </div>
			  				<div class="panel-body">
			  					<form class="form-horizontal" role="form">
								  
								  <div class="form-group">
								    <label for="Subject" class="col-sm-2 control-label">Facilities</label>
								    <div class="col-sm-10">
								      <?php
						       $result = mysqli_query($conn, "SELECT * FROM facilities ");
						          while ($row = mysqli_fetch_array($result)) {
    
						           

								 echo "<textarea class='form-control' rows='10' id='updateFacilities".$row['id']."'>".$row['facilities']."</textarea>";?>

								      
								    </div>
								  </div>


								  
								  
								  <div class="form-group">
								    <div class="col-sm-offset-2 col-sm-10">
								      <button type="button" class="btn btn-primary submitFacilities" <?php echo "id='".$row['id']."' " ?> >Update</button>
								    </div>
								  </div>
								  <?php } ?>
								</form>
			  				</div>
			  			</div>
	  				</div>
	  				
	  			</div>	
	  			</div>

	  			<div class="col-md-10"  id="showContact" style="display: none;">
  					<div class="content-box-large">
		  				<div class="panel-heading">
							<div class="panel-title">Contacts</div>
							
							<div class="panel-options">
								<a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
								<a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
							</div>
						</div>
		  				<div class="panel-body table-responsive">
		  					<table class="table table-striped">
				              <thead>
				                <tr>
				                
				                  <th>Id</th>
				                  <th>Name</th>
				                  
				                  <th>Email</th>
				                  <th>Comment</th>
				                </tr>
				              </thead>
				              <tbody>

				               <?php
						       $result = mysqli_query($conn, "SELECT * FROM comment order by id desc");
						       while ($row = mysqli_fetch_array($result)) {
    
						         ?>
				                <tr>
				                
				              
				                  <?php echo "<td>" . $row['id'] . "</td>";?>
				                  <?php echo "<td style ='word-break:break-word;'>".$row['name']."</td>";?>
                                  <?php echo "<td style ='word-break:break-word;'>".$row['email']."</td>";?>
                                  <?php echo "<td style ='word-break:break-word;'>".$row['comment']."</td>";?>
                                  
                                  <?php echo "<td style ='word-break:break-word;'><button type='button' class='btn btn-primary btn-xs deleteComment' id='".$row['id']."' >Delete</button></td>"; ?>
                                  
				                </tr>
				                <?php 
				                }
				                ?>
				                
				              </tbody>
				            </table>
		  				</div>
		  			</div>
  				
  			</div>


  			



		  

		  	
		    </div>	
		  </div>
		</div>
    </div>

    <footer>
         <div class="container">
         
            <div class="copy text-center">
                <p>	Copyright &copy; 2017 BIF Gauhati University.</p>
            </div>
            
         </div>
      </footer>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
    <script src="bootbox.min.js"></script>
  </body>
</html>
<script type="text/javascript">
	
	$(document).ready(function(){

       $("#notice").click(function(){
          $("#addResearch").hide();
          $("#showResearch").hide();
          $("#addNotice").show();
          $("#showNotice").show();
          $("#addPublication").hide();
          $("#showPublication").hide();
          $("#addeMagazine").hide();
          $("#showeMagazine").hide();
          $("#addevents").hide();
          $("#showevents").hide();
          $("#addGallery").hide();
          $("#showGallery").hide();
           $("#addLink").hide();
          $("#showLink").hide();
          $("#addAbout").hide();
          $("#addFacilities").hide();
          $("#showContact").hide();
          
          
      });

      
      $("#research").click(function(){
          $("#addResearch").show();
          $("#showResearch").show();
          $("#addNotice").hide();
          $("#showNotice").hide();
          $("#addPublication").hide();
          $("#showPublication").hide();
          $("#addeMagazine").hide();
          $("#showeMagazine").hide();
          $("#addevents").hide();
          $("#showevents").hide();
          $("#addGallery").hide();
          $("#showGallery").hide();
          $("#addLink").hide();
          $("#showLink").hide();
          $("#addAbout").hide();
          $("#addFacilities").hide();
          $("#showContact").hide();
          
          
      });

      $("#publication").click(function(){
          $("#addResearch").hide();
          $("#showResearch").hide();
          $("#addNotice").hide();
          $("#showNotice").hide();
          $("#addPublication").show();
          $("#showPublication").show();
          $("#addeMagazine").hide();
          $("#showeMagazine").hide();
          $("#addevents").hide();
          $("#showevents").hide();
          $("#addGallery").hide();
          $("#showGallery").hide();
           $("#addLink").hide();
          $("#showLink").hide();
          $("#addAbout").hide();
          $("#addFacilities").hide();
          $("#showContact").hide();

      });

      $("#magazine").click(function(){
          $("#addResearch").hide();
          $("#showResearch").hide();
          $("#addNotice").hide();
          $("#showNotice").hide();
          $("#addPublication").hide();
          $("#showPublication").hide();
          $("#addeMagazine").show();
          $("#showeMagazine").show();
          $("#addevents").hide();
          $("#showevents").hide();
          $("#addGallery").hide();
          $("#showGallery").hide();
          $("#addLink").hide();
          $("#showLink").hide();
          $("#addAbout").hide();
          $("#addFacilities").hide();
          $("#showContact").hide();
      });

      $("#events").click(function(){
          $("#addResearch").hide();
          $("#showResearch").hide();
          $("#addNotice").hide();
          $("#showNotice").hide();
          $("#addPublication").hide();
          $("#showPublication").hide();
          $("#addeMagazine").hide();
          $("#showeMagazine").hide();
          $("#addevents").show();
          $("#showevents").show();
          $("#addGallery").hide();
          $("#showGallery").hide();
           $("#addLink").hide();
          $("#showLink").hide();
          $("#addAbout").hide();
          $("#addFacilities").hide();
          $("#showContact").hide();

      });
      $("#gallery").click(function(){
          $("#addResearch").hide();
          $("#showResearch").hide();
          $("#addNotice").hide();
          $("#showNotice").hide();
          $("#addPublication").hide();
          $("#showPublication").hide();
          $("#addeMagazine").hide();
          $("#showeMagazine").hide();
          $("#addevents").hide();
          $("#showevents").hide();
          $("#addGallery").show();
          $("#showGallery").show();
          $("#addLink").hide();
          $("#showLink").hide();
          $("#addAbout").hide();
          $("#addFacilities").hide();
          $("#showContact").hide();

      });


      $("#links").click(function(){
          $("#addResearch").hide();
          $("#showResearch").hide();
          $("#addNotice").hide();
          $("#showNotice").hide();
          $("#addPublication").hide();
          $("#showPublication").hide();
          $("#addeMagazine").hide();
          $("#showeMagazine").hide();
          $("#addevents").hide();
          $("#showevents").hide();
          $("#addGallery").hide();
          $("#showGallery").hide();
          $("#addLink").show();
          $("#showLink").show();
          $("#addAbout").hide();
          $("#addFacilities").hide();
          $("#showContact").hide();


      });

      $("#about").click(function(){
          $("#addResearch").hide();
          $("#showResearch").hide();
          $("#addNotice").hide();
          $("#showNotice").hide();
          $("#addPublication").hide();
          $("#showPublication").hide();
          $("#addeMagazine").hide();
          $("#showeMagazine").hide();
          $("#addevents").hide();
          $("#showevents").hide();
          $("#addGallery").hide();
          $("#showGallery").hide();
          $("#addLink").hide();
          $("#showLink").hide();
          $("#addAbout").show();
          $("#addFacilities").hide();
          $("#showContact").hide();


      });

      $("#facilities").click(function(){
          $("#addResearch").hide();
          $("#showResearch").hide();
          $("#addNotice").hide();
          $("#showNotice").hide();
          $("#addPublication").hide();
          $("#showPublication").hide();
          $("#addeMagazine").hide();
          $("#showeMagazine").hide();
          $("#addevents").hide();
          $("#showevents").hide();
          $("#addGallery").hide();
          $("#showGallery").hide();
          $("#addLink").hide();
          $("#showLink").hide();
          $("#addAbout").hide();
          $("#addFacilities").show();
          $("#showContact").hide();


      });

      $("#contact").click(function(){
          $("#addResearch").hide();
          $("#showResearch").hide();
          $("#addNotice").hide();
          $("#showNotice").hide();
          $("#addPublication").hide();
          $("#showPublication").hide();
          $("#addeMagazine").hide();
          $("#showeMagazine").hide();
          $("#addevents").hide();
          $("#showevents").hide();
          $("#addGallery").hide();
          $("#showGallery").hide();
          $("#addLink").hide();
          $("#showLink").hide();
          $("#addAbout").hide();
          $("#addFacilities").hide();
          $("#showContact").show();


      });


/*************************NOTICE********************************************/
             $("#submitNotice").click(function() {



              
                var subject = $("#subject").val();






                 var formdata= new FormData();

                formdata.append('subject',subject);
                
                
            var resume=document.getElementById('noticePdf');
            var files=noticePdf.files;
            for (var i = 0; i < files.length; i++) {

                var file = files[i];

                formdata.append('noticePdf',file, file.name);
                //alert(files.name) ;
            }

                


                $.ajax({
                    url: '../notice.php',
                    type: 'POST',
                    xhr: function() {
                        var myXhr = $.ajaxSettings.xhr();
                        return myXhr;
                    },
                    //async: false,
                    //data: {a:first,b:last, c:mobile,d:Remail,e:proto,f:City,g:Cname,h:salary,i:resume},

                    success: function(response){
                        //$("#status_text").html(response);
                       // alert(response);
                        location.reload(true);

                    },
                    data: formdata,
                    cache: false,
                    contentType: false,
                    processData: false
                });
                return false;
            });

             $(".deleteNotice").click(function(){
                 var id=this.id;
                 var formdata= new FormData();

                 formdata.append('id',id);
                 $.ajax({
                    url: '../delete_notice.php',
                    type: 'POST',
                    xhr: function() {
                        var myXhr = $.ajaxSettings.xhr();
                        return myXhr;
                    },
                    //async: false,
                    //data: {a:first,b:last, c:mobile,d:Remail,e:proto,f:City,g:Cname,h:salary,i:resume},

                    success: function(response){
                        //$("#status_text").html(response);
                        bootbox.alert(response,function(){

                        	location.reload(true);
                        });
                        
                         //window.location.href="index.php";
                       
                    },
                    data: formdata,
                    cache: false,
                    contentType: false,
                    processData: false
                });
                return false;


             });

             $(".updateNotice").click(function(){
				var id=this.id;
				var subject= $("#updateNsubject"+id).val();
				

				var formdata = new FormData()
				formdata.append('id',id);
				formdata.append('subject',subject);
				

				 $.ajax({
				                url: 'update_notice.php',
				                type: 'POST',
				                xhr: function() {
				                    var myXhr = $.ajaxSettings.xhr();
				                    return myXhr;
				                },
				                //async: false,
				                //data: {a:first,b:last, c:mobile,d:Remail,e:proto,f:City,g:Cname,h:salary,i:resume},

				                success: function(response){
				                    //$("#status_text").html(response);
				                    bootbox.alert(response,function(){
				                    	location.reload(true);
				                    });

				                },
				                data: formdata,
				                cache: false,
				                contentType: false,
				                processData: false
				            });
				            return false;

             
           });

             


/****************************NOTICE END***************************************/

/***************************RESEARCH START************************************/
$("#submitResearch").click(function(){
            

             
             var subject = $("#researchSubject").val();




            var description = $("#researchDescription").val();
            var link = $("#researchLink").val();
            var scholar=$("#researchScholar").val();

            




             var formdata= new FormData();

            formdata.append('subject',subject);
            formdata.append('description',description);
            formdata.append('link',link);
            formdata.append('scholar',scholar);



            $.ajax({
                url: '../research.php',
                type: 'POST',
                xhr: function() {
                    var myXhr = $.ajaxSettings.xhr();
                    return myXhr;
                },
                //async: false,
                //data: {a:first,b:last, c:mobile,d:Remail,e:proto,f:City,g:Cname,h:salary,i:resume},

                success: function(response){
                    //$("#status_text").html(response);
                    alert(response);

                },
                data: formdata,
                cache: false,
                contentType: false,
                processData: false
            });
            return false;
});




$(".deleteResearch").click(function(){
                 var id=this.id;
                 var formdata= new FormData();

                 formdata.append('id',id);
                 $.ajax({
                    url: '../delete_research.php',
                    type: 'POST',
                    xhr: function() {
                        var myXhr = $.ajaxSettings.xhr();
                        return myXhr;
                    },
                    //async: false,
                    //data: {a:first,b:last, c:mobile,d:Remail,e:proto,f:City,g:Cname,h:salary,i:resume},

                    success: function(response){
                        //$("#status_text").html(response);
                        bootbox.alert(response,function(){

                        	
                                location.reload(true);
                        	
                        });
                        
                         //window.location.href="index.php";
                       
                    },
                    data: formdata,
                    cache: false,
                    contentType: false,
                    processData: false
                });
                return false;


             });
$(".updateResearch").click(function(){
var id=this.id;
var subject= $("#updateRsubject"+id).val();
var scholar= $("#updateRscholar"+id).val();

var formdata = new FormData()
formdata.append('id',id);
formdata.append('subject',subject);
formdata.append('scholar',scholar);

 $.ajax({
                url: 'update_research.php',
                type: 'POST',
                xhr: function() {
                    var myXhr = $.ajaxSettings.xhr();
                    return myXhr;
                },
                //async: false,
                //data: {a:first,b:last, c:mobile,d:Remail,e:proto,f:City,g:Cname,h:salary,i:resume},

                success: function(response){
                    //$("#status_text").html(response);
                    bootbox.alert(response,function(){
                    	location.reload(true);
                    });

                },
                data: formdata,
                cache: false,
                contentType: false,
                processData: false
            });
            return false;


})

/*********************RESEARCH END***************************/

/*********************eMagazine******************************/

           $("#submiteMagazine").click(function() {

            var name = $("#magazineName").val();
            var description = $("#magazineDescription").val();
            var date = $("#publicationDate").val();


            var formdata= new FormData();

            formdata.append('name',name);
            formdata.append('description',description);
            formdata.append('date',date);


            var resume=document.getElementById('Emagazine');
            var files=Emagazine.files;
            for (var i = 0; i < files.length; i++) {


                var file = files[i];


                formdata.append('Emagazine',file, file.name);
                //alert(files.name) ;
            }

            var resume=document.getElementById('magazineThumbnail');
            var files=magazineThumbnail.files;
            for (var i = 0; i < files.length; i++) {


                var file = files[i];


                formdata.append('magazineThumbnail',file, file.name);
                
            }


            $.ajax({
                url: '../e_mag.php',
                type: 'POST',
                xhr: function() {
                    var myXhr = $.ajaxSettings.xhr();
                    return myXhr;
                },
                //async: false,
                //data: {a:first,b:last, c:mobile,d:Remail,e:proto,f:City,g:Cname,h:salary,i:resume},

                success: function(response){
                    //$("#status_text").html(response);
                    alert(response);

                },
                data: formdata,
                cache: false,
                contentType: false,
                processData: false
            });
            return false;
        });

           $(".deleteMag").click(function(){
                 var id=this.id;
                 var formdata= new FormData();

                 formdata.append('id',id);
                 $.ajax({
                    url: '../delete_mag.php',
                    type: 'POST',
                    xhr: function() {
                        var myXhr = $.ajaxSettings.xhr();
                        return myXhr;
                    },
                    //async: false,
                    //data: {a:first,b:last, c:mobile,d:Remail,e:proto,f:City,g:Cname,h:salary,i:resume},

                    success: function(response){
                        //$("#status_text").html(response);
                        bootbox.alert(response,function(){

                        	
                                location.reload(true);
                        	
                        });
                        
                         //window.location.href="index.php";
                       
                    },
                    data: formdata,
                    cache: false,
                    contentType: false,
                    processData: false
                });
                return false;


             });





/*********************emagazine END***************************/

/*********************PUBLICATION******************************/

$("#submitPub").click(function() {



            var name = $("#pubName").val();
            //var year = $("#pubDate").val();
            var link = $("#pubDescription").val();
            var contributor = $("#pubContributor").val();
            //var number = $("#pubNumber").val();

            
            var formdata= new FormData();

            formdata.append('name',name);
            //formdata.append('year',year);
            formdata.append('link',link);
            formdata.append('contributor',contributor);
            //formdata.append('number',number);

            $.ajax({
                url: '../pub.php',
                type: 'POST',
                xhr: function() {
                    var myXhr = $.ajaxSettings.xhr();
                    return myXhr;
                },
                //async: false,
                //data: {a:first,b:last, c:mobile,d:Remail,e:proto,f:City,g:Cname,h:salary,i:resume},

                success: function(response){
                    //$("#status_text").html(response);
                    alert(response);

                },
                data: formdata,
                cache: false,
                contentType: false,
                processData: false
            });
            return false;
        });

$(".deletePub").click(function(){
                 var id=this.id;
                 var formdata= new FormData();

                 formdata.append('id',id);
                 $.ajax({
                    url: '../delete_pub.php',
                    type: 'POST',
                    xhr: function() {
                        var myXhr = $.ajaxSettings.xhr();
                        return myXhr;
                    },
                    //async: false,
                    //data: {a:first,b:last, c:mobile,d:Remail,e:proto,f:City,g:Cname,h:salary,i:resume},

                    success: function(response){
                        //$("#status_text").html(response);
                        bootbox.alert(response,function(){

                        	
                                location.reload(true);
                        	
                        });
                        
                         //window.location.href="index.php";
                       
                    },
                    data: formdata,
                    cache: false,
                    contentType: false,
                    processData: false
                });
                return false;


             });

$(".updatePub").click(function(){
				var id=this.id;
				var name= $("#updatePname"+id).val();
				var contributor=$("#updatePcontributor"+id).val();
				var link= $("#updatePlink"+id).val();

				var formdata = new FormData()
				formdata.append('id',id);
				formdata.append('name',name);
				formdata.append('contributor',contributor);
				formdata.append('link',link);

				 $.ajax({
				                url: 'update_pub.php',
				                type: 'POST',
				                xhr: function() {
				                    var myXhr = $.ajaxSettings.xhr();
				                    return myXhr;
				                },
				                //async: false,
				                //data: {a:first,b:last, c:mobile,d:Remail,e:proto,f:City,g:Cname,h:salary,i:resume},

				                success: function(response){
				                    //$("#status_text").html(response);
				                    bootbox.alert(response,function(){
				                    	location.reload(true);
				                    });

				                },
				                data: formdata,
				                cache: false,
				                contentType: false,
				                processData: false
				            });
				            return false;

             
           });





/*********************PUBLICATION END***************************/

/**************************EVENT********************************/
$("#submitEvent").click(function() {



            var name = $("#eventName").val();
            var date = $("#eventDate").val();
            var link = $("#evenLink").val();
            

            
            var formdata= new FormData();

            formdata.append('name',name);
            formdata.append('date',date);
            formdata.append('description',link);
            
            $.ajax({
                url: '../event.php',
                type: 'POST',
                xhr: function() {
                    var myXhr = $.ajaxSettings.xhr();
                    return myXhr;
                },
                

                success: function(response){
                    
                    alert(response);

                },
                data: formdata,
                cache: false,
                contentType: false,
                processData: false
            });
            return false;
        });



$(".deleteEvent").click(function(){
                 var id=this.id;
                 var formdata= new FormData();

                 formdata.append('id',id);
                 $.ajax({
                    url: '../delete_event.php',
                    type: 'POST',
                    xhr: function() {
                        var myXhr = $.ajaxSettings.xhr();
                        return myXhr;
                    },
                    //async: false,
                    //data: {a:first,b:last, c:mobile,d:Remail,e:proto,f:City,g:Cname,h:salary,i:resume},

                    success: function(response){
                        //$("#status_text").html(response);
                        bootbox.alert(response,function(){

                        	
                                location.reload(true);
                        	
                        });
                        
                         //window.location.href="index.php";
                       
                    },
                    data: formdata,
                    cache: false,
                    contentType: false,
                    processData: false
                });
                return false;


             });


$(".updateEvent").click(function(){
				var id=this.id;
				var name= $("#updateEname"+id).val();
				var date=$("#updateEdate"+id).val();
				var description= $("#updateEdescription"+id).val();

				var formdata = new FormData()
				formdata.append('id',id);
				formdata.append('name',name);
				formdata.append('date',date);
				formdata.append('description',description);

				 $.ajax({
				                url: 'update_events.php',
				                type: 'POST',
				                xhr: function() {
				                    var myXhr = $.ajaxSettings.xhr();
				                    return myXhr;
				                },
				                //async: false,
				                //data: {a:first,b:last, c:mobile,d:Remail,e:proto,f:City,g:Cname,h:salary,i:resume},

				                success: function(response){
				                    //$("#status_text").html(response);
				                    bootbox.alert(response,function(){
				                    	location.reload(true);
				                    });

				                },
				                data: formdata,
				                cache: false,
				                contentType: false,
				                processData: false
				            });
				            return false;

             
           });



/**************************EVENT END*****************************/
	});

/*************************GALLERY*******************************/

$("#submitGallery").click(function() {

            

            var formdata= new FormData();

           


            var resume=document.getElementById('galleryUpload');
            var files=galleryUpload.files;
            for (var i = 0; i < files.length; i++) {


                var file = files[i];


                formdata.append('galleryUpload',file, file.name);
                //alert(files.name) ;
            }

            

            $.ajax({
                url: '../add_gallery.php',
                type: 'POST',
                xhr: function() {
                    var myXhr = $.ajaxSettings.xhr();
                    return myXhr;
                },
                //async: false,
                //data: {a:first,b:last, c:mobile,d:Remail,e:proto,f:City,g:Cname,h:salary,i:resume},

                success: function(response){
                    //$("#status_text").html(response);
                    bootbox.alert(response,function(){
                    	location.reload(true);
                    });

                },
                data: formdata,
                cache: false,
                contentType: false,
                processData: false
            });
            return false;
        });

        $(".deleteGallery").click(function(){
                 var id=this.id;
                 var formdata= new FormData();

                 formdata.append('id',id);
                 $.ajax({
                    url: '../delete_gallery.php',
                    type: 'POST',
                    xhr: function() {
                        var myXhr = $.ajaxSettings.xhr();
                        return myXhr;
                    },
                    //async: false,
                    //data: {a:first,b:last, c:mobile,d:Remail,e:proto,f:City,g:Cname,h:salary,i:resume},

                    success: function(response){
                        //$("#status_text").html(response);
                        bootbox.alert(response,function(){

                        	
                                location.reload(true);
                        	
                        });
                        
                         //window.location.href="index.php";
                       
                    },
                    data: formdata,
                    cache: false,
                    contentType: false,
                    processData: false
                });
                return false;


             });

/************************GALLERY END****************************/

/***************************LINK START************************************/
$("#submitLink").click(function(){
            

             
             var name = $("#linkName").val();
             var link = $("#linkAddress").val();
            

            




             var formdata= new FormData();

            formdata.append('name',name);
            formdata.append('link',link);
            



            $.ajax({
                url: '../imp_link.php',
                type: 'POST',
                xhr: function() {
                    var myXhr = $.ajaxSettings.xhr();
                    return myXhr;
                },
                //async: false,
                //data: {a:first,b:last, c:mobile,d:Remail,e:proto,f:City,g:Cname,h:salary,i:resume},

                success: function(response){
                    //$("#status_text").html(response);
                    alert(response);

                },
                data: formdata,
                cache: false,
                contentType: false,
                processData: false
            });
            return false;
});




$(".deleteLink").click(function(){
                 var id=this.id;
                 var formdata= new FormData();

                 formdata.append('id',id);
                 $.ajax({
                    url: '../delete_link.php',
                    type: 'POST',
                    xhr: function() {
                        var myXhr = $.ajaxSettings.xhr();
                        return myXhr;
                    },
                    //async: false,
                    //data: {a:first,b:last, c:mobile,d:Remail,e:proto,f:City,g:Cname,h:salary,i:resume},

                    success: function(response){
                        //$("#status_text").html(response);
                        bootbox.alert(response,function(){

                        	
                                location.reload(true);
                        	
                        });
                        
                         //window.location.href="index.php";
                       
                    },
                    data: formdata,
                    cache: false,
                    contentType: false,
                    processData: false
                });
                return false;


             });
$(".updateLink").click(function(){
var id=this.id;
var name= $("#updateLname"+id).val();
var address= $("#updateLaddress"+id).val();

var formdata = new FormData()
formdata.append('id',id);
formdata.append('name',name);
formdata.append('address',address);

 $.ajax({
                url: 'update_link.php',
                type: 'POST',
                xhr: function() {
                    var myXhr = $.ajaxSettings.xhr();
                    return myXhr;
                },
                //async: false,
                //data: {a:first,b:last, c:mobile,d:Remail,e:proto,f:City,g:Cname,h:salary,i:resume},

                success: function(response){
                    //$("#status_text").html(response);
                    bootbox.alert(response,function(){
                    	location.reload(true);
                    });

                },
                data: formdata,
                cache: false,
                contentType: false,
                processData: false
            });
            return false;


})

/*********************LINK END***************************/


/*********************ABOUT START***********************/

$(".submitAbout").click(function(){
var id=this.id;
var about= $("#updateAbout"+id).val();

var formdata = new FormData()
formdata.append('id',id);
formdata.append('about',about);


 $.ajax({
                url: 'update_about.php',
                type: 'POST',
                xhr: function() {
                    var myXhr = $.ajaxSettings.xhr();
                    return myXhr;
                },
                //async: false,
                //data: {a:first,b:last, c:mobile,d:Remail,e:proto,f:City,g:Cname,h:salary,i:resume},

                success: function(response){
                    //$("#status_text").html(response);
                    bootbox.alert(response,function(){
                    	location.reload(true);
                    });

                },
                data: formdata,
                cache: false,
                contentType: false,
                processData: false
            });
            return false;


})

/*********************ABOUT END*************************/

/*********************FACILITIES START***********************/

$(".submitFacilities").click(function(){
var id=this.id;
var facilities= $("#updateFacilities"+id).val();

var formdata = new FormData()
formdata.append('id',id);
formdata.append('facilities',facilities);


 $.ajax({
                url: 'update_facilities.php',
                type: 'POST',
                xhr: function() {
                    var myXhr = $.ajaxSettings.xhr();
                    return myXhr;
                },
                //async: false,
                //data: {a:first,b:last, c:mobile,d:Remail,e:proto,f:City,g:Cname,h:salary,i:resume},

                success: function(response){
                    //$("#status_text").html(response);
                    bootbox.alert(response,function(){
                    	location.reload(true);
                    });

                },
                data: formdata,
                cache: false,
                contentType: false,
                processData: false
            });
            return false;


})

/*********************FACILITIES END*************************/

/*********************CONTACT START*************************/

$(".deleteComment").click(function(){
                 var id=this.id;
                 var formdata= new FormData();

                 formdata.append('id',id);
                 $.ajax({
                    url: '../delete_comment.php',
                    type: 'POST',
                    xhr: function() {
                        var myXhr = $.ajaxSettings.xhr();
                        return myXhr;
                    },
                    //async: false,
                    //data: {a:first,b:last, c:mobile,d:Remail,e:proto,f:City,g:Cname,h:salary,i:resume},

                    success: function(response){
                        //$("#status_text").html(response);
                        bootbox.alert(response,function(){

                        	
                                location.reload(true);
                        	
                        });
                        
                         //window.location.href="index.php";
                       
                    },
                    data: formdata,
                    cache: false,
                    contentType: false,
                    processData: false
                });
                return false;


             });
/*********************CONTACT END*************************/
</script>