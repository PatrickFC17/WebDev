<?php
      $name = $_POST['name'];
      $email = $_POST['email'];
      $plate = $_POST['plate'];
      $juice = $_POST['juice_confirm'] != null ? $_POST['juice_confirm'] : $_POST['juice_deny'];
      $pepper = $_POST['pepper_type'];
      $connection = new mysqli('localhost:3306', 'root', 'paclac@Dev17', 'form_database');
      if($connection->connect_error) {
            die('Connection Failed : '.$connection->connect_error);
      } else {
            $statement = $connection->prepare("INSERT INTO form_data(name, email, plate, juice, pepper) VALUES(?, ?, ?, ?, ?)");
            $statement->bind_param("sssbs", $name, $email, $plate, $juice, $pepper);
            $statement->execute();
            echo "Success!";
            $statement->close();
            $connection->close();
      }
?>