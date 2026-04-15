<!DOCTYPE html>
<html>
<head>
    <title>Nueva contraseña</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">

    <h2>Restablecer contraseña</h2>

    <form method="POST">
        <input type="hidden" name="email" value="<?= $_GET['email'] ?>">

        <input class="form-control mb-3" type="password" name="password" placeholder="Nueva contraseña" required>

        <button class="btn btn-success">Actualizar contraseña</button>
    </form>

</div>

</body>
</html>