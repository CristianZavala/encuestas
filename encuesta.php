<html>
   <head>
      <title>Selecting Table in MySQLi Server</title>
   </head>

   <body>
      <?php
         $id_enc = $_POST['status'];
         $dbhost = '192.168.56.4';
         $dbuser = 'dev_juan';
         $dbpass = 'Aero802#';
         $dbname = 'encuestas';
         $conn = mysqli_connect($dbhost, $dbuser, $dbpass,$dbname);

         if(! $conn ) {
            die('Could not connect: ' . mysqli_error());
         }
         $nombreEnc =  mysqli_query($conn,'SELECT * FROM encuestas WHERE id ='.$id_enc);
         $ren = mysqli_fetch_assoc($nombreEnc);
         echo "<td>".$ren["nombre"]."</td>";
         echo "<br><br>";
         mysqli_free_result($nombreEnc);

         $sql = 'SELECT * FROM preguntas WHERE id_encuesta = '.$id_enc;
         $result = mysqli_query($conn, $sql);

         if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
               echo "<tr>";
               echo "<td>".$row["pregunta"]."</td>";
               echo "<br><br>";
               echo "</tr>";

               echo "<tr>";
                  $res = mysqli_query($conn,"SELECT *  FROM opciones WHERE id_pregunta = ".$row["id"]);
                  while($rowOpc = mysqli_fetch_array($res))
                  {
                     echo "<td><input type=\"radio\" name=".$row["id"]."value=".$rowOpc["id"].">".$rowOpc["opcion"]."</td>";

                  }
                  echo "<br><br>";
                  mysqli_free_result($res);
               echo "</tr>";
            }
            mysql_free_result($resultado);
         } else {
            echo "0 results";
         }
         mysqli_close($conn);
      ?>
   </body>
</html>
