<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>crud opertion!</title>
  </head>
  <body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		  <div class="container-fluid">
		    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
		      <span class="navbar-toggler-icon"></span>
		    </button>
		    <a class="navbar-brand" href="#">Login & Register</a>
		    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
		      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
		        <li class="nav-item">
		          <a class="nav-link active" aria-current="page" href="<?=base_url('user/add')?>">Registration Form</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link active" href="<?=base_url('user/login')?>">login</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
		        </li>
		      </ul>
		      <form class="d-flex">
		        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
		        <button class="btn btn-outline-success" type="submit">Search</button>
		      </form>
		    </div>
		  </div>
		</nav>

    <h1 class="text-center"> </h1>

    

<div class="container">
    <div class="row">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title text-center">User List</h5>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Address</th>
                            <th>password</th>
                            <th>status</th>
                            <th>Options</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1; foreach($users as $row){?> 
                        <tr>
                          <td><?=$i++?></td>
                            <td><?=$row['username']?></td>
                            <td><?=$row['email']?></td>
                            <td><?=$row['mobile']?></td>
                            
                            <td><?=$row['address']?></td>
                            <td><?=$row['password']?></td>
                            <td><?=$row['status']?></td>
                            
                            
                            <td>
                                <a href="<?=base_url()?>user/edit/<?=$row['id']?>" class="btn btn-sm btn-primary">Edit</a>
                                <a href="<?=base_url()?>user/delete/<?=$row['id']?>" onclick="return confirm('Are you sure want to delete this user ?')" class="btn btn-sm btn-danger">Delete</a>
                            </td>
                            
                              <!--Status Check-->
								 <td>
                 <?php if($row['status'] == 'Un Approved'){ ?>
                  <a class="btn btn-success" href="<?php echo base_url()?>User/deactiv_status_user/<?= $row['id']?>">Approved</a>
                  <a href="<?=base_url()?>user/delete/<?=$row['id']?>" onclick="return confirm('Are you sure want to delete this user ?')" class="btn btn-sm btn-danger">Reject</a>

                  <?php } 
                  elseif($row['status'] == 'Approved'){ ?>
                <a class="btn btn-danger" href="<?php echo base_url()?>User/active_status_user/<?= $row['id']?>">Relieved</a>

                 <?php } else { ?>

               <a class="btn btn-success" href="<?php echo base_url()?>User/deactiv_status_user/<?= $row['id']?>">Approved</a>
                <?php }?>
                </td>

                <!--End Status Check-->
                            </td>
                             
                        </tr>
<?php } ?>

                   </tbody>
                     
            </div>
        </div>
    </div>
</div>
 
 
<!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>