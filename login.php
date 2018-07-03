<?php
session_start();
require_once("database/conect.php");
Conexao_db();

if(isset($_POST["btnLogin"]))
  {
    $usuario = $_POST['txtLogin'];
    $senha = $_POST['txtSenha'];

    addslashes($sql = "SELECT count(*) as contador, id_usuario FROM usuario WHERE usuario = '".$usuario."' AND senha = '".$senha."' AND ativo = 1");


    $result = mysql_query($sql);

    $autentica = mysql_fetch_array($result);

    // echo ($autentica['contador']);
    // echo ($sql);
    if($autentica['contador'] >0){
        header('location:time_line.php');
    }else{
    ?>
    <script>
        alert("Usuário ou Senha incorretos!!!");
    </script>
    <?php
        }

    }
?>

<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>DECRET</title>
    <link rel="icon" href="img/icon.jpg" type="image/x-icon" />
    <link rel="stylesheet" href="css/login.css">
    <link href="https://fonts.googleapis.com/css?family=Permanent+Marker" rel="stylesheet">
    <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  </head>
  <body>
    <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="js/materialize.js"></script>
    <form name="frmLogin" method="post" action="" enctype="multipart/form-data">
      <header class="blue-text">
        DECRET
      </header>
      <section class="container_login blue">
        <div class="container_usuario_senha">
          <div class="usuario">
            <input type="text" name="txtLogin" value="" placeholder="Usuário">
          </div>
          <div class="senha">
            <input type="password" name="txtSenha" value="" placeholder="Senha">
          </div>
          <div class="botao center">
            <input class="btn black" type="submit" name="btnLogin" value="Login">
          </div>
        </div>
      </section>
    </form>
  </body>
</html>
