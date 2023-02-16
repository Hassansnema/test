<!doctype html>
<?php		include_once('include/config.php');?>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>  </title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/main-style.css" rel="stylesheet">
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/fontawesome-all.min.js"></script>
<script src="js/form-jquery.js" type="text/javascript"></script>	
<script src="js/main-js.js"></script>
</head>
<body>	

	
<?php
	
	if(isset($_GET['user_edit'])){
				
		$id = $_GET['user_edit'];
					$sql = mysqli_query($conn , " select * from users where id = '$id' ");
					$user= mysqli_fetch_assoc($sql);
		
		echo '
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Edit User</h5>
        <button type="button" class="close" onclick="goBack()" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  
		<form class="contact-form "  action="include/edit.php" method="post" id="" enctype="multipart/form-data">
						
						
					  <div class="form-group row">
						<label for="colFormLabel" class="col-sm-3 col-form-label">Full Name</label>
						<div class="col-sm-9">
						  <input type="text" class="form-control" name="full_name" value="'.$user['full_name'].'" >
						  <input type="hidden" class="form-control" name="id" value="'.$user['id'].'" >
						</div>
					  </div>
					  
					  <div class="form-group row">
						<label for="colFormLabel" class="col-sm-3 col-form-label">User Name</label>
						<div class="col-sm-9">
						  <input type="text" class="form-control" name="user_name" value="'.$user['user_name'].'" >
						</div>
					  </div>
					  
					  
					  <div class="form-group row">
						<label for="colFormLabel" class="col-sm-3 col-form-label">Email</label>
						<div class="col-sm-9">
						  <input type="text" class="form-control" name="email" value="'.$user['email'].'" >
						</div>
					  </div>
					  
					  <div class="form-group row">
						<label for="colFormLabel" class="col-sm-3 col-form-label">Phone</label>
						<div class="col-sm-9">
						  <input type="text" class="form-control" name="phone" value="'.$user['phone'].'" >
						</div>
					  </div>
					  
					  <div class="form-group row">
						<label for="colFormLabel" class="col-sm-3 col-form-label">Adress</label>
						<div class="col-sm-9">
						  <input type="text" class="form-control" name="address" value="'.$user['address'].'" >
						</div>
					  </div>
					  
		   <div id="product_ar_edit_result" class="text-center col-md-12" style="margin:10px 0;"></div>
        <button type="button" onclick="goBack()" class="btn btn-danger" data-dismiss="modal">Back</button>
		 
        <button type="submit" name="menu_ar_edit" class="btn btn-success">Edit</button>
		  </form>

      </div>
    </div>
  </div>
</div>				
		';
	}
	
?>
	
	<h1 style="font-size: 25px;text-align: center;margin: 20px;color: #f00;">Users List</h1>
	<table class="table">
	  <thead>
		<tr>
		  <th scope="col">#</th>
		  <th scope="col">Full Name</th>
		  <th scope="col">User Name</th>
		  <th scope="col">Email</th>
		  <th scope="col">Phone</th>
		  <th scope="col">Adress</th>
		  <th scope="col">Edit</th>
		</tr>
	  </thead>
	  <tbody>

	  <?php
	

		$sql = mysqli_query($conn ,"select * from users ");
		$num = 1;
		while($user = mysqli_fetch_assoc($sql)){
			echo '
					<tr>
					  <th scope="row">'.$num++.'</th>
					  <td>'.$user['full_name'].'</td>
					  <td>'.$user['user_name'].'</td>
					  <td>'.$user['email'].'</td>
					  <td>'.$user['phone'].'</td>
					  <td>'.$user['address'].'</td>
					  <td><a href="?user_edit='.$user['id'].'" class="btn btn-warning">Edit</a></td>
					</tr>
			';
		}	
	?>
	
  </tbody>
</table>
	
	
<script type="text/javascript">
    $(window).on('load',function(){
        $('#edit').modal('show');
    });
</script>
	
	
<script>
function goBack() {
    window.history.back();
}
</script>


<script>
$('#edit').modal({
backdrop: 'static',
keyboard: false
})
</script>

</body>
</html>
