    <?php
          // Connect to the database
      $pdo = new PDO('mysql:host=localhost;dbname=scada', 'root', '');

      // Prepare a query
      $stmt = $pdo->query("SELECT * FROM bp5 WHERE DATE(tanggal) = CURDATE()");

      // Execute the query
      $stmt->execute();

      // Fetch the results as an array of objects
      $results = $stmt->fetchAll(PDO::FETCH_OBJ);

      // Output the results in JSON format
      header('Content-Type: application/json');
      echo json_encode($results);

    ?>