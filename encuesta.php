<html>
   <head>
      <title>Selecting Table in MySQLi Server</title>
   </head>

   <body>
      <?php
         $dbhost = '192.168.56.4';
         $dbuser = 'dev_juan';
         $dbpass = 'Aero802#';
         $dbname = 'encuestas';
         $conn = mysqli_connect($dbhost, $dbuser, $dbpass,$dbname);

         if(! $conn ) {
            die('Could not connect: ' . mysqli_error());
         }
         echo 'Connected successfully<br>';
         
         $nenc = mysqli_query($conn, $sql);

         $sql = 'SELECT * FROM preguntas WHERE id_encuesta = 1';
         $result = mysqli_query($conn, $sql);

         if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
               echo "<tr>";
               echo "<td>".$row["pregunta"]."</td>";
               echo "</tr>";

               echo "<tr>";
                  $resResp = mysqli_query($conn,"SELECT *  FROM opciones WHERE id_pregunta = ".$row["id"]);
                  while($rowRes = mysqli_fetch_array($resResp))
                  {
                     echo "<td><input type=\"radio\" name=".$row["id"]."value=".$rowRes["id"].">".$rowRes["opcion"]."</td>";
                  } 
                  mysqli_free_result($resResp);
               echo "</tr>";
               //echo "Pregunta: " . $row["pregunta"]. "<br>";
            }
            mysql_free_result($resultado);
         } else {
            echo "0 results";
         }
         mysqli_close($conn);
      ?>
   </body>
</html>
