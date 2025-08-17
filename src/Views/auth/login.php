<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Login</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-5">
<h1>Login</h1>
<?php if (!empty($error)): ?>
<div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
<?php endif; ?>
<form method="post">
<div class="mb-3">
<label class="form-label">Email or Username</label>
<input type="text" name="identifier" class="form-control">
</div>
<div class="mb-3">
<label class="form-label">Password</label>
<input type="password" name="password" class="form-control">
</div>
<button type="submit" class="btn btn-primary">Login</button>
</form>
<p><a href="/?route=auth/register">Register</a></p>
</body>
</html>
