<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/login_style.css">
  <title>BIENVENIDO</title>
</head>
<body>
<div id="formContainer">
  <form action = "../php/login.php"  method="post">
    <label for="" align-items="Left">LOGIN</label>
    <br>
    <br>
    <label for="usuario">Usuario:</label>
    <input type="text" id="usuario" name="usuario">
    <label for="password">Contraseña:</label>
    <input type="password" id="passwrd" name="passwrd">
    <input type="submit" value="Iniciar sesión">
    <?php if (isset($error)) { ?>
      <p class="error"><?php echo $error; ?></p>
    <?php } ?>
  </form>
  </div>
</body>
</html>