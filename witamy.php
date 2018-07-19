<?php

	session_start();
	
	if (!isset($_SESSION['udanarejestracja']))
	{
		header('Location: index.php');
		exit();
	}
    else
    {
        unset($_SESSION['udanarejestracja']);
        
    }

    /*usuwanie zmiennych pamietajacych wartosci wpisane do formularze*/
    if (isset($_SESSION['fr_nick'])) unset($_SESSION_['fr_nick']);
    if (isset($_SESSION['fr_email'])) unset($_SESSION_['fr_email']);
    if (isset($_SESSION['fr_haslo1'])) unset($_SESSION_['fr_haslo1']);
    if (isset($_SESSION['fr_haslo2'])) unset($_SESSION_['fr_haslo2']);
    if (isset($_SESSION['fr_regulamin'])) unset($_SESSION_['fr_regulamin']);
    /* usuwanie bledow rejestracji */
    if (isset($_SESSION['e_nick'])) unset($_SESSION_['e_nick']);
    if (isset($_SESSION['e_email'])) unset($_SESSION_['e_email']);
    if (isset($_SESSION['e_haslo'])) unset($_SESSION_['e_haslo']);
    if (isset($_SESSION['e_regulamin'])) unset($_SESSION_['e_regulamin']);
    if (isset($_SESSION['e_bot'])) unset($_SESSION_['e_bot']);
?>

<!DOCTYPE html>
<html lang="pl">
	<head>
		<title>Fitness Factory | Zapraszamy!</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/navbar-footer.css" rel="stylesheet">
		<meta name="Description" content="Tu wpisz opis zawartości strony" />
	    <meta name="Keywords" content="Tu wpisz wyrazy kluczowe rozdzielone przecinkami" />
       <link href="https://fonts.googleapis.com/css?family=News+Cycle:400,700" rel="stylesheet">
	
		<meta charset="utf-8">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="scroll.js"></script>
        
       
	</head>
	<body>
        <h1 style="margin-top: 30px; text-align: center; color:white;">Dziękujemy za rejestracje, możesz się już zalogować</h1>
        <a class="button-log" style="text-align:center;" href="logowanie.php">zaloguj sie</a>
        
    </body>
    
    
</html>