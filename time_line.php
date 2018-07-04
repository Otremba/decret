<?php
require_once("component/Imagem_class.php");
require_once("database/conect.php");
Conexao_db();

if(isset($_POST["btnSalvar"]))
{
  $texto=$_POST["txtTexto"];

    // Instância um objeto imagem e o popula com a imagem vinda do form
      $imagem = new Imagem($_FILES['myPhoto'], 'img_publicacoes/');

      $imagemPic = $imagem->salvarImagem($imagem);

      // echo ($imagemPic);

      $sqlInser = "INSERT INTO decret.post (imagem, texto, id_usuario) VALUES('".$imagemPic."','".$texto."', '1');";

      mysql_query($sqlInser);

      // echo ($sqlInser);


  header('location:time_line.php');

}

require_once("component/header.php");
 ?>
 <form name="frmTimeLine" method="POST" enctype="multipart/form-data" action="time_line.php">
    <div class="container_time_line">
      <div class="time_line">
        <div class="postar11">
          <div class="foto">
            <label for="uploadImage"><img id="uploadPreview"/></label>
            <input id="uploadImage" type="file" name="myPhoto" onchange="PreviewImage();" />
          </div>
          <div class="texto">
            <textarea placeholder="Em que você está pensando ?"  name="txtTexto" id="textarea2" class="black-text materialize-textarea" data-length="120" style="height: 45px;"></textarea>
          </div>
          <div class="botao">
            <input class="input_botao blue btn" type="submit" name="btnSalvar" value="Publicar">
            <!-- <input class="input-botao blue btn" type="submit" name="btnSalvar" value="Salvar Veiculo"> -->
          </div>
        </div>
    </form>

        <?php
        $sql = "SELECT * FROM post order by id_post desc";
              $select = mysql_query($sql);
          while ($rsVP = mysql_fetch_array($select))
          {
        ?>
        <div class="post">
          <img src="<?php echo($rsVP['imagem']) ?>" alt="">
            <div class="curtir blue">
              <a href="#"><i class="small material-icons black-text">favorite</i></a>
            </div>
        </div>
        <div class="texto_post white-text">
          <?php echo($rsVP['texto']) ?>
        </div>
        <?php
          }
         ?>
        <!-- <div class="post">
          <img src="img/login1.jpg" alt="">
            <div class="curtir blue">
              <a href="#"><i class="small material-icons black-text">favorite</i></a>
            </div>
        </div>
        <div class="texto_post white-text">
            Caraca maluko fiquei sabendo que a Fernanda do 7°b está ficando com o Felipe
        </div> -->
      </div>
    </div>
    <script type="text/javascript">

      function PreviewImage() {
          var oFReader = new FileReader();
          oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);

          oFReader.onload = function (oFREvent) {
              document.getElementById("uploadPreview").src = oFREvent.target.result;
          };
      };

    </script>
  </body>
</html>
