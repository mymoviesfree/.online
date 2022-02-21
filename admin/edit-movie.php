<?php 
#session_start();
#error_reporting(1);
#if($_SESSION['sid']=="")
#{	
#	header("location:index.php");
#}
	include 'config.php';
	$id='edit';
	$did=$_GET['did'];
	//$cat=$_GET['cat'];
	$page='movie';
	$q="SELECT * FROM `$page` WHERE `id`='".$did."'";
	$d=mysqli_query($dbcon,$q);
  $res=mysqli_fetch_array($d);
  $image1=$res['image'];
##########Update Query################
	extract($_POST);
	if(isset($_POST['banner_update']))
	{
		$path = "images/" . $_FILES['image']['name'];
    	move_uploaded_file($_FILES['image']['tmp_name'], $path);
	if ($_FILES['image']['tmp_name'] != '' ) {
       		$query="UPDATE `$page` SET `name`='".$name."',`category`='".$category."',`date`='".$date."',`url`='".$url."',`rating`='".$rating."',`director`='".$director."',`actor`='".$actor."',`des`='".$des."',`image`='".$path."',`ourl`='".$ourl."' WHERE `id`='".$did."'";
			mysqli_query($dbcon,$query) or die(mysqli_error());
			header("location:add-movie.php");
			$empty="File Updated Successfully";
    }	
	if ($_FILES['image']['tmp_name'] == '' ) {
       		$query="UPDATE `$page` SET `name`='".$name."',`category`='".$category."',`date`='".$date."',`url`='".$url."',`rating`='".$rating."',`director`='".$director."',`actor`='".$actor."',`des`='".$des."',`image`='".$image1."',`ourl`='".$ourl."' WHERE `id`='".$did."'";
			mysqli_query($dbcon,$query) or die(mysqli_error());
			header("location:add-movie.php");
			//$empty="File Updated Successfully";
    }	
	else
	{	
		$empty="Please Select Valid File";
	
	}
	}
##########Update Query################

	include 'header.php';		
?>
<style>
.file{
	border: 2px solid #999;
    border-radius: 6px;
    width: 175px;
    box-shadow: 1px 3px 2px 2px #999;
}
</style>
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
      <?php include 'slider-bar.php';?>

        <!-- top navigation -->
          <?php include 'nav_bar.php';?>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Update Movie</h3>
              </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Edit Movie</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <form id="demo-form2" class="form-horizontal form-label-left" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Movie Name<span class="required">
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $res['name'];?>" name="name">
                          
						          </div>
                      </div><br>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Select Category</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="select2_single form-control" name="category" onChange="showUser(this.value)">
                            <option value="<?php echo $res['category'];?>"><?php echo $res['category'];?></option>
							              <option value="Bollywood">Bollywood</option>
                            <option value="Hollywood">Hollywood</option>
                            <option value="Dual Audio">Dual Audio Movie</option>
                            <option value="Music Video">Music Video</option>
                            <option value="Web Series">Web Series</option>
									        </select>
                        </div>
                      </div><br>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Release Date<span class="required">
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="date" id="first-name" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $res['date'];?>" name="date">
                          
						          </div></div><br>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">URL<span class="required">
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $res['url'];?>" name="url">
                          
						          </div></div><br>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">IMDB Rating<span class="required">
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $res['rating'];?>" name="rating">
                          
						          </div></div><br>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Director Name<span class="required">
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $res['director'];?>" name="director">
                          
						          </div></div><br>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Actors Name<span class="required">
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $res['actor'];?>" name="actor">
                          
						          </div></div><br>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Description<span class="required">
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $res['des'];?>" name="des">
                          
						          </div></div><br>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Image<span class="required">
                        </label><img src="<?php echo $res['image'];?>" width="140px" height="80px">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="file" id="fileInput" type="file" name="image">
                                
						          </div></div><br>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Online URL<span class="required">
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $res['ourl'];?>" name="ourl">
                          
						          </div></div><br>
                      </div>
                     
					   
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" class="btn btn-success" name="banner_update">Update Announcement Image</button>
						 
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <?php include 'footer.php';?>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="vendors/nprogress/nprogress.js"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>
  </body>
</html>
