<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <p>Hello, <?php echo isset($_SESSION['user']) ? $_SESSION['user'] : null ?></p>
</body>
</html>

