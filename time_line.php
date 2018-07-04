<?php
require_once("component/header.php");
require_once("database/conect.php");
Conexao_db();
 ?>
    <div class="container_time_line">
      <div class="time_line">
        <div class="postar11">
          <div class="foto">
            <label for="uploadImage"><img id="uploadPreview"/></label>
            <input id="uploadImage" type="file" name="myPhoto" onchange="PreviewImage();" />
          </div>
          <div class="texto">
            <textarea placeholder="Em que você está pensando ?" id="textarea2" class="black-text materialize-textarea" data-length="120" style="height: 45px;"></textarea>
          </div>
          <div class="botao">
            <input class="input_botao blue btn" type="submit" name="" value="Publicar">
          </div>
        </div>

        <?php
        $sql = "SELECT * FROM post";
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
