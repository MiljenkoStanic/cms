<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Language</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-5">
<h1><?= isset($language) ? 'Edit Language' : 'Add Language' ?></h1>
<?php if (!empty($error)): ?><div class="alert alert-danger"><?= htmlspecialchars($error) ?></div><?php endif; ?>
<form method="post">
<div class="mb-3"><label class="form-label">Code</label><input type="text" name="code" class="form-control" value="<?= $language['code'] ?? '' ?>"></div>
<div class="mb-3"><label class="form-label">Name</label><input type="text" name="name" class="form-control" value="<?= $language['name'] ?? '' ?>"></div>
<div class="mb-3"><label class="form-label">Flag URL</label><input type="text" name="flag" class="form-control" value="<?= $language['flag'] ?? '' ?>"></div>
<button class="btn btn-primary" type="submit">Save</button>
<a href="/?route=language/index" class="btn btn-secondary">Back</a>
</form>
</body>
</html>
