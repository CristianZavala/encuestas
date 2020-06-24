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
         echo 'Seleccione una encuesta<br>';
         $nenc = mysqli_query($conn, $sql);

         $sql = 'SELECT * FROM encuestas';
         $result = mysqli_query($conn, $sql);
         echo "<form action='encuesta.php' method='post'>";
         echo "<tr>";
         echo '<select id="status"  name="status">';

         while($row = mysqli_fetch_assoc($result)) {
            echo '<option value='.$row['id'].'>' .$row['nombre']. '</option>';
         }

         echo "</select>";
         echo "<input type='submit' name='submit' value='Enviar'>";
         mysql_free_result($result);
         echo "</tr>";
         echo "</form>";
/////////////////////////////////////////////////////////////pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{3,15}$"
         mysqli_close($conn);
      ?>
   </body>
</html>	
