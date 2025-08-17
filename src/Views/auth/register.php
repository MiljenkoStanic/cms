<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Register</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-5">
<h1>Register</h1>
<?php if (!empty($error)): ?>
<div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
<?php endif; ?>
<form method="post">
<div class="mb-3">
<label class="form-label">First Name</label>
<input type="text" name="first_name" class="form-control">
</div>
<div class="mb-3">
<label class="form-label">Last Name</label>
<input type="text" name="last_name" class="form-control">
</div>
<div class="mb-3">
<label class="form-label">Email</label>
<input type="email" name="email" class="form-control">
</div>
<div class="mb-3">
<label class="form-label">Username</label>
<input type="text" name="username" class="form-control">
</div>
<div class="mb-3">
<label class="form-label">Password</label>
<input type="password" name="password" class="form-control">
</div>
<button type="submit" class="btn btn-primary">Register</button>
</form>
<p><a href="/?route=auth/login">Login</a></p>
</body>
</html>
