<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>User Login & Registration</title>
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
              <a class="nav-link active" aria-current="page" href="<?= base_url('user/add') ?>">Registration Form</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="<?= base_url('user/index') ?>">View</a>
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

    <div class="container">
      <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
          <div class="card" style="margin-top: 30px">
            <div class="card-header text-center">
              Change Password
            </div>
            <div class="card-body">
            <form method="post" action="<?php echo base_url(); ?>user/change_password" enctype="multipart/form-data">
                            <div class="modal-body">
                                <div class="col-md-12">
                                    <label>New Password: <input style="width: 200px;" name="new_pass" type="text" class="form-control" value="" onChange="onChange()" required/> </label>
                                </div><br><br>
                                 <div class="col-md-12">
                                    <label>Confirm Password : <input style="width: 200px;" name="current_pass"  type="password" class="form-control" onChange="onChange()" required/> </label>
                                </div><br><br>

                            </div><hr>
                            <div class="modal-footer">
                            	<button type="submit" class="btn btn-primary" id='btnSubmit'>SUBMIT</button>      
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                
                            </div>
                        </form>
            </div>
          </div>
        </div>
        <div class="col-md-4"></div>
      </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>
