<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Welcome, <?= htmlspecialchars($user['username']); ?></h1>
        <div class="card mt-4">
            <div class="card-body">
                <h5 class="card-title">User Details</h5>
                <p><strong>ID:</strong> <?= htmlspecialchars($user['id']); ?></p>
                
                <p><strong>Name:</strong> <?= htmlspecialchars($user['username']); ?></p>
				<p><strong>Email:</strong> <?= htmlspecialchars($user['email']); ?></p>
				<p><strong>Address:</strong> <?= htmlspecialchars($user['address']); ?></p>
				<p><strong>Mobile:</strong> <?= htmlspecialchars($user['mobile']); ?></p>
                 
            </div>
        </div>
        <a href="<?= base_url('user/logout'); ?>" class="btn btn-danger mt-3">Logout</a>
    </div>
</body>
</html>
