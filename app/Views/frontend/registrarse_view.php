<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
    <link rel="stylesheet" href="miestilo.css">
</head>

<body>
    <form class="formularios">
        <h2>Registrarse</h2>
        <div class="form-input">
            <label>Apellidos
                <input type="text" required placeholder="Barberan" minlength="3">
            </label>
        </div>
        <div class="form-input">
            <label>Nombres
                <input type="text" required placeholder="Andres" minlength="3">
            </label>
        </div>

        <div class="form-input"><label>Dirección de correo electronico
                <input type="email" required placeholder="ejemplo@gmail.com">
            </label>
        </div>

        <div class="form-input"> <label>Numero de celular
                <input type="text" required placeholder="3795-029606">
            </label>
        </div>

        <div class="form-input">
            <label>Contraseña
            <input type="password" required minlength="4" placeholder="••••••••">
        </label>
        </div>

        <div class="form-input">
            <label>Repetir contraseña
            <input type="password" required minlength="4" placeholder="••••••••">
            </label>
        </div>

        <button type="submit" class="btn boton_formularios">Registrarse</button>
    </form>
</body>

</html>