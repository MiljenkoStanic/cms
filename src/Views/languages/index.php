<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Languages</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-5">
<h1>Languages</h1>
<p><a href="/?route=language/create" class="btn btn-success">Add Language</a></p>
<table class="table table-bordered">
<thead><tr><th>ID</th><th>Code</th><th>Name</th><th>Flag</th><th>Actions</th></tr></thead>
<tbody>
<?php foreach ($languages as $lang): ?>
<tr>
<td><?= $lang['id'] ?></td>
<td><?= htmlspecialchars($lang['code']) ?></td>
<td><?= htmlspecialchars($lang['name']) ?></td>
<td><?php if ($lang['flag']): ?><img src="<?= htmlspecialchars($lang['flag']) ?>" width="32"><?php endif; ?></td>
<td>
<a class="btn btn-sm btn-primary" href="/?route=language/edit&id=<?= $lang['id'] ?>">Edit</a>
<a class="btn btn-sm btn-danger" href="/?route=language/delete&id=<?= $lang['id'] ?>" onclick="return confirm('Delete?')">Delete</a>
</td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
</body>
</html>
