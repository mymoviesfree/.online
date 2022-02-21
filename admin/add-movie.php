<?php 
session_start();
if($_SESSION['sid']=="")
{	
	header("location:index.php");
}
	include 'config.php';
	include 'header.php';
	$q1="SELECT * FROM `movie`";
$d1=mysqli_query($dbcon,$q1) or die(mysqli_error($dbcon));
$reg_count=mysqli_num_rows($d1);
##########Add Top Banner Image Insert Query################
	extract($_POST);
	if(isset($_POST['add_image']))
	{
		$path = "images/" . $_FILES['image']['name'];
      move_uploaded_file($_FILES['image']['tmp_name'], $path);    
	if ($_FILES['image']['tmp_name'] != '' ) {
       		$query="INSERT INTO `movie` (`id`,`name`,`category`,`date`,`url`,`rating`,`director`,`actor`,`des`,`image`,`ourl`) VALUES ('".$id."','".$name."','".$category."','".$date."','".$url."','".$rating."','".$director."','".$actor."','".$des."','".$path."','".$ourl."')";
			mysqli_query($dbcon,$query);
      $empty="File Uploaded Successfully";
      header("location:add-movie.php");
    }	
	else
	{	
		$empty="Please Select Valid File";
	
	}
	}
##########Add banner bottom-section Image Insert Query end################
##########Delete Query################
	@$action=$_GET['action'];
	@$page=$_GET['page'];
	if($action=='delete')
	{
		$did=$_GET['did'];
		$query="DELETE FROM `$page` WHERE `id`='".$did."'";
		mysqli_query($dbcon,$query);
		header("location:add-movie.php");
	}
##########Delete Query################
?>
<style>
.file{
	    border: 2px solid #999;
    border-radius: 6px;
    width: 175px;
    box-shadow: 1px 3px 2px 2px #999
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
                <h3>Add Movie Info</h3>
              </div>
            </div>
            <div class="clearfix"></div>
			<!--------------------menu--------------->
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Add Announcement Image</h2>
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
                    <br />
                    <form id="demo-form2" class="form-horizontal form-label-left" method="post" enctype="multipart/form-data">
                    <input type="hidden" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="id" value="<?php echo ($reg_count+1);?>">
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Movie Name<span class="required">
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="name">
                          
						          </div>
                      </div><br>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Select Category</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="select2_single form-control" name="category" onChange="showUser(this.value)">
                            <option>---Select Category---</option>
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
                          <input type="date" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="date">
                          
						          </div></div><br>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">URL<span class="required">
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="url">
                          
						          </div></div><br>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">IMDB Rating<span class="required">
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="rating">
                          
						          </div></div><br>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Director Name<span class="required">
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="director">
                          
						          </div></div><br>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Actors Name<span class="required">
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="actor">
                          
						          </div></div><br>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Description<span class="required">
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="des">
                          
						          </div></div><br>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Image<span class="required">
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="file" id="fileInput" type="file" name="image">
                                
						          </div></div><br>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Online URL<span class="required">
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="ourl">
                          
						          </div></div><br>
                      </div>
					                  <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" class="btn btn-success" name="add_image">Create</button>
						              <button class="btn btn-primary" type="button">Cancel</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
             <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>View Movie Info</h2>
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
                   <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            <th>
                              <input type="checkbox" id="check-all" class="flat">
                            </th>
                            <th class="column-title">Id</th>
                            <th class="column-title">Name</th>
                            <th class="column-title">Category</th>
                            <th class="column-title">Release Date</th>
                            <th class="column-title">URl</th>
                            <th class="column-title">IMDB Rating</th>
                            <th class="column-title">Director Name</th>
                            <th class="column-title">Actor Name</th>
                            <th class="column-title">Description</th>
                            <th class="column-title">Image</th>
                            <th class="column-title">Online URL</th>
						              	<th class="column-title">Edit</th>
                            <th class="column-title">Delete</th>
                          </th>
                           </tr>
                        </thead>

                        <tbody>
						 <?php
                                    $q1="SELECT * FROM `movie`";
									$d1=mysqli_query($dbcon, $q1);
									$counter=0;
                                    while ($res3=mysqli_fetch_array($d1)) {
                                        ?>
                            <tr class="even pointer">
								<td class="a-center "><input type="checkbox" class="flat" name="table_records"></td>
								<td class=" "><?php echo $res3['id'];?></td>
                <td class=" "><?php echo $res3['name'];?></td>
                <td class=" "><?php echo $res3['category'];?></td>
                <td class=" "><?php echo $res3['date'];?></td>
                <td class=" "><?php echo $res3['url'];?></td>
                <td class=" "><?php echo $res3['rating'];?></td>
                <td class=" "><?php echo $res3['director'];?></td>
                <td class=" "><?php echo $res3['actor'];?></td>
                <td class=" "><?php echo $res3['des'];?></td>
								<td class=" "><img src="<?php echo $res3['image'];?>" width="140px" height="80px"></td>
                <td class=" "><?php echo $res3['ourl'];?>"</td>
								<td class=" "><a class="btn btn-primary" href="edit-movie.php?did=<?php echo $res3['id'];?>"><i class="fa fa-edit"></i>Edit</a></td>
								<td class=" "><a onclick="return confirm('Are you sure?')" class="btn btn-round btn-danger" style="color:#fff;" href="?did=<?php echo $res3['id'];?>&action=delete&page=movie">Delete</td>
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
    <!-- bootstrap-progressbar -->
    <script src="vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="vendors/iCheck/icheck.min.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="vendors/moment/min/moment.min.js"></script>
    <script src="vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap-wysiwyg -->
    <script src="vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
    <script src="vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
    <script src="../vendors/google-code-prettify/src/prettify.js"></script>
    <!-- jQuery Tags Input -->
    <script src="vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
    <!-- Switchery -->
    <script src="vendors/switchery/dist/switchery.min.js"></script>
    <!-- Select2 -->
    <script src="vendors/select2/dist/js/select2.full.min.js"></script>
    <!-- Parsley -->
    <script src="vendors/parsleyjs/dist/parsley.min.js"></script>
    <!-- Autosize -->
    <script src="vendors/autosize/dist/autosize.min.js"></script>
    <!-- jQuery autocomplete -->
    <script src="vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
    <!-- starrr -->
    <script src="vendors/starrr/dist/starrr.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>
	
  </body>
</html>
