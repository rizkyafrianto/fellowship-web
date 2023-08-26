<?php

function getConnection(): PDO
{
   $host = "localhost";
   $database = "fellowship";
   $username = "root";
   $password = "";

   try {
      return new PDO("mysql:host=$host;dbname=$database", $username, $password);
   } catch (PDOException $exception) {
      echo "connection failed : " . $exception->getMessage();
   }
}
