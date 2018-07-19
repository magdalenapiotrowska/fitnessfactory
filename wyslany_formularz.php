<?php
   session_start();
    if(!isset($_SESSION['zalogowany']))
    {
       header('Location: loginbd.php');
        exit();/*przekierowanie wstrzymanie dalszych operacji*/
    }
   

    $connect = mysqli_connect("localhost", "root", "", "fitness"); 

 

 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Using Bootstrap modal</title>
 
</head>
<body>
  DZIĘKUJEMY<h1>DZIEKEIKDSKSK</h1>
</body>
</html>