<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <title>CRUD Operations</title>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Login & Register</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="<?=base_url('user/login')?>">Login Form</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=base_url('user/index')?>">View</a>
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

    <!-- Main Content -->
    <div class="container my-5">
        <h1 class="text-center mb-4">CRUD OPERATIONS</h1>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center mb-4">Add User</h5>
                        <form method="post" action="<?= base_url() ?>user/add" id="add-user-form">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" name="username" class="form-control" id="username" placeholder="Enter username" required>
                            </div>
                            <div class="mb-3">
                                <label for="birthday" class="form-label">Date of Birth</label>
                                <input type="date" name="birthday" class="form-control" id="birthday" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" name="email" class="form-control" id="email" placeholder="Enter email" required>
                            </div>
                            <div class="mb-3">
                                <label for="mobile" class="form-label">Mobile</label>
                                <input type="text" name="mobile" class="form-control" id="mobile" placeholder="Enter mobile number" maxlength="10" required>
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <textarea name="address" class="form-control" id="address" placeholder="Enter address" rows="2" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" id="password" placeholder="Enter password" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Submit</button>
                        </form>
                        <?php if ($this->session->flashdata('success')) { ?>
                            <div class="alert alert-success mt-3" role="alert">
                                <?= $this->session->flashdata('success'); ?>
                            </div>
                        <?php } ?>
                        <?php if ($this->session->flashdata('error')) { ?>
                            <div class="alert alert-danger mt-3" role="alert">
                                <?= $this->session->flashdata('error'); ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function () {
            $('#add-user-form').submit(function (e) {
                e.preventDefault();
                const formData = $(this).serialize();
                $.ajax({
                    type: 'POST',
                    url: '<?= base_url('user/add'); ?>',
                    data: formData,
                    dataType: 'json',
                    success: function (response) {
                        if (response.error) {
                            alert(response.error);
                        } else if (response.success) {
                            alert(response.success);
                            location.reload();
                        }
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        alert('Error: ' + textStatus + ' - ' + errorThrown);
                    }
                });
            });
        });
    </script>
</body>
</html>
