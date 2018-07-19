
<?php
//insert.php  
$connect = mysqli_connect("localhost", "root", "", "fitness");
if(!empty($_POST))
{
   $output = '';
        $imie = mysqli_real_escape_string($connect, $_POST["imieUczestnik"]);
        $nazwisko = mysqli_real_escape_string($connect, $_POST["nazwiskoUczestnik"]);
        $telefon = mysqli_real_escape_string($connect, $_POST["telefon"]);
        $email = mysqli_real_escape_string($connect, $_POST["email"]);
        $karnet = mysqli_real_escape_string($connect, $_POST["karnet"]);
    
  $query = "INSERT INTO zajecia_zapisy (zajecia_zapisy_id, zajecia_id, user_id, imie, nazwisko, telefon, email, numerKarnetu) VALUES (NULL, '', '', '$imie', '$nazwisko', '$telefon', '$email', '$karnet')";
    
    if(mysqli_query($connect, $query))
    {
     $output .= '<label class="text-success">Zajęcia zarezerwowone. </label>';
    
     }
    
    }
    echo $output;

?>