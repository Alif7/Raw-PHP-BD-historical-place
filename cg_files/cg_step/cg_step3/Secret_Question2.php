<?php
	session_start();
	error_reporting(1);
	if(isset($_SESSION['tempfbuser']))
	{
		mysql_connect("localhost","root","");
		mysql_select_db("candygram");
		$user=$_SESSION['tempfbuser'];
		$que1=mysql_query("select * from users where Email='$user' ");
		$rec=mysql_fetch_array($que1);
		$userid=$rec[0];
		$que2=mysql_query("select * from user_secret_quotes where user_id=$userid");
		$rec2=mysql_fetch_array($que2);
		$q2=$rec2[3];
		$a2=$rec2[4];
		if($q2=="" && $a2=="")
		{
			$que3=mysql_query("select * from user_secret_quotes where user_id=$userid");
			$count3=mysql_num_rows($que3);
			if($count3>0)
			{
		
?>
<?php
	if(isset($_POST['Finish']))
	{
		$que2=$_POST['que'];
		$ans2=$_POST['ans'];
		
		mysql_query("update user_secret_quotes set Question2='$que2',Answer2='$ans2' where user_id=$userid");
		
		$que_user_data=mysql_query("select * from users where Email='$user';");
		$user_data=mysql_fetch_array($que_user_data);
		$userid=$user_data[0];
		$user_join_time=$user_data[6];
		mysql_query("insert into user_post(user_id,post_txt,post_time,priority) values($userid,'Joined Candygram','$user_join_time','Public');");
		mysql_query("insert into user_status values($userid,'Online')");
		mysql_query("insert into user_info(user_id) values($userid)");
		
		session_start();
		$_SESSION['fbuser']=$user;
		header("location:../../cg_home/Home.php");
	}
?>
<html lang="en"><head>
<style>
@import url(http://fonts.googleapis.com/css?family=Open+Sans:400,700,300);
body {
    font: 12px 'Open Sans';
}
.form-control, .thumbnail {
    border-radius: 2px;
}
.btn-danger {
    background-color: #B73333;
}

/* File Upload */
.fake-shadow {
    box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
}
.fileUpload {
    position: relative;
    overflow: hidden;
}
.fileUpload #logo-id {
    position: absolute;
    top: 0;
    right: 0;
    margin: 0;
    padding: 0;
    font-size: 33px;
    cursor: pointer;
    opacity: 0;
    filter: alpha(opacity=0);
}
.img-preview {
    max-width: 100%;
}
</style>
<!--Main CSS-->
<link href="Main_Template/css/main.css?<?php echo time(); ?>" rel="stylesheet">
<!--BootStrap 4 Alpha config -->
<!-- BootStrap 4 alpha jquery config -->
<script src="../../../Bootstrap_4/js/bootstrap.js?<?php echo time(); ?>"></script>
<script src="../../../Bootstrap_4/js/bootstrap.min.js?<?php echo time(); ?>"></script>
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
<meta charset="utf-8">
<meta name="viewport" content="width=1024,initial-scale=0">
<link href="../../../Main_Template/js/tether.min.js?<?php echo time(); ?>" rel="stylesheet">
<link href="../../../Bootstrap_4/css/bootstrap.min.css?<?php echo time(); ?>" rel="stylesheet">
</head>
<body>
<!-- NavBar  Starts Here-->
<nav class="navbar container sticky-top navbar-light navbar-toggleable-md bg-faded justify-content-center">
	<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
		<script>
		$(document).ready(function() {
		var brand = document.getElementById('logo-id');
		brand.className = 'attachment_upload';
		brand.onchange = function() {
			document.getElementById('fakeUploadLogo').value = this.value.substring(12);
		};

		function readURL(input) {
		if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function(e) {
                $('.img-preview').attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
			}
		}	
		$("#logo-id").change(function() {
			readURL(this);
		});
		});
		$(function () {
		$('[data-toggle="tooltip"]').tooltip()
			})
	</script>
			<a class="navbar-brand" href="#" data-toggle="tooltip" data-placement="bottom" title="">
			<img src="../../../Main_Template/img/Capture.png" width="170" height="70" class="d-inline-block align-top" alt="" ></a>
			
    <div class="navbar-collapse collapse" id="navbarNavDropdown">
        <ul class="navbar-nav mx-auto w-100 justify-content-center">
            <form class="form-inline my-2 my-lg-0">
				
			</form>
			
        </ul>
        <ul class="nav mt-lg-0 justify-content-end nav nav-pills ">
		
			<li class="nav-item dropdown">
			<div class="btn-group">
 
  
  <div class="dropdown-menu">
    
  </div>
</div>
      </li>
        </ul>
    </div>
</nav>
<!--NavBar Ends Here-->
<!--Here Starts The Main Body -->
    <div class="container" align="center">
    <!-- MainPanel Starts Here -->
    		<div class="jumbotron-fluid container">
  
</div>
<div class="col-sm-10">
<div class="card mb-3 text-center">
  <div class="card-header">
    <ul class="nav nav-pills card-header-pills">
      <li class="nav-item">
        <a class="nav-link disabled" href="#">ছবি দিন</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#">প্রশ্ন ০১</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="#">প্রশ্ন ০২</a>
      </li>
    </ul>
  </div>
  <div class="card-block">
    <p class="lead">প্রশ্ন ০২</p>
		<div class="container">
  <form method="post" name="sq" >
    <div class="form-group row">
      <label for="inputEmail3" class="col-sm-3 col-form-label">ভ্রমন সম্পর্কিত প্রশ্ন :</label>
      <select name="que" class="custom-select col-sm-7 mb-2 mr-sm-2 mb-sm-0" required>
		<option value="select one">Select one</option>
		<option value="what is the first name of your favorite uncle?">আপনি কোন মাধ্যমে ঘুরতে পছন্দ করেন?</option>
		
	  </select>
    </div>
    <div class="form-group row">
      <label for="inputPassword3" class="col-sm-3 col-form-label">উত্তর :</label>
      <div class="col-sm-7">
		<input type="text" name="ans" maxlength="50" class="form-control" required>
      </div>
    </div>
    <div class="form-group row">
      <div class="offset-sm-4 col-sm-3">
        <input type="submit" name="Finish" value="শেষ" id="Next_button" class="btn btn-success">
      </div>
    </div>
  </form>
<?php
		include("step3_erorr/step3_erorr.php");
?>

</div>
 </div>
</div></div>
  	<!-- MainPanel Ends Here -->
	</div>
 </body>
</html>
<?php
			}
			else
			{
				header("location:../cg_step2/Secret_Question1.php");
			}
		}
		else
		{
			header("location:../../cg_home/Home.php");
		}
	}
	else
	{
		header("location:../../../index.php");
	}
?>