<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark">

<div class="container d-flex justify-content-center align-items-center vh-100">

    <div class="card p-4" style="width: 350px;">
        <h3 class="text-center mb-3">Login</h3>

        <form method="POST">
            <input class="form-control mb-2" type="email" name="email" placeholder="Email" required>
            <input class="form-control mb-3" type="password" name="password" placeholder="Password" required>

            <button class="btn btn-primary w-100">Ingresar</button>
        </form>

        <div class="text-center mt-3">
            <a href="?action=recover">¿Olvidaste tu contraseña?</a>
        </div>
    </div>

</div>

</body>
</html>