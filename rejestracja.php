<?php

	session_start();
	
	if (isset($_POST['email']))
	{
		//Udana walidacja? Załóżmy, że tak!
		$wszystko_OK=true;
		
		//Sprawdź poprawność nickname'a
		$nick = $_POST['login'];
		
		//Sprawdzenie długości nicka
		if ((strlen($nick)<3) || (strlen($nick)>20))
		{
			$wszystko_OK=false;
			$_SESSION['e_nick']="Nick musi posiadać od 3 do 20 znaków!";
		}
		
		if (ctype_alnum($nick)==false)
		{
			$wszystko_OK=false;
			$_SESSION['e_nick']="Nick może składać się tylko z liter i cyfr (bez polskich znaków)";
		}
		
		// Sprawdź poprawność adresu email
		$email = $_POST['email'];
		$emailB = filter_var($email, FILTER_SANITIZE_EMAIL);
		
		if ((filter_var($emailB, FILTER_VALIDATE_EMAIL)==false) || ($emailB!=$email))
		{
			$wszystko_OK=false;
			$_SESSION['e_email']="Podaj poprawny adres e-mail!";
		}
		
		//Sprawdź poprawność hasła
		$haslo1 = $_POST['haslo1'];
		$haslo2 = $_POST['haslo2'];
		
		if ((strlen($haslo1)<8) || (strlen($haslo1)>20))
		{
			$wszystko_OK=false;
			$_SESSION['e_haslo']="Hasło musi posiadać od 8 do 20 znaków!";
		}
		
		if ($haslo1!=$haslo2)
		{
			$wszystko_OK=false;
			$_SESSION['e_haslo']="Podane hasła nie są identyczne!";
		}	

		$haslo_hash = password_hash($haslo1, PASSWORD_DEFAULT);
		
		//Czy zaakceptowano regulamin?
		if (!isset($_POST['regulamin']))
		{
			$wszystko_OK=false;
			$_SESSION['e_regulamin']="Potwierdź akceptację regulaminu!";
		}				
		
	/* recaptcha */
        
        $sekret = "6LdjJDgUAAAAANIlKan6CeaU8eZV1btRHy9uJMwv";
        $check = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$sekret."&response=".$_POST['g-recaptcha-response']);
        
		
		$odpowiedz = json_decode($check);
		
		if ($odpowiedz->success==false)
		{
			$wszystko_OK=false;
			$_SESSION['e_bot']="Potwierdź, że nie jesteś botem!";
		}		
		
		//Zapamiętaj wprowadzone dane
		$_SESSION['fr_nick'] = $nick;
		$_SESSION['fr_email'] = $email;
		$_SESSION['fr_haslo1'] = $haslo1;
		$_SESSION['fr_haslo2'] = $haslo2;
		if (isset($_POST['regulamin'])) $_SESSION['fr_regulamin'] = true;
		
		require_once "connect.php";
		mysqli_report(MYSQLI_REPORT_STRICT);
		
		try 
		{
			$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
			if ($polaczenie->connect_errno!=0)
			{
				throw new Exception(mysqli_connect_errno());
			}
			else
			{
				//Czy email już istnieje?
				$rezultat = $polaczenie->query("SELECT id FROM uzytkownicy WHERE email='$email'");
				
				if (!$rezultat) throw new Exception($polaczenie->error);
				
				$ile_takich_maili = $rezultat->num_rows;
				if($ile_takich_maili>0)
				{
					$wszystko_OK=false;
					$_SESSION['e_email']="Istnieje już konto przypisane do tego adresu e-mail!";
				}		

				//Czy nick jest już zarezerwowany?
				$rezultat = $polaczenie->query("SELECT id FROM uzytkownicy WHERE user='$nick'");
				
				if (!$rezultat) throw new Exception($polaczenie->error);
				
				$ile_takich_nickow = $rezultat->num_rows;
				if($ile_takich_nickow>0)
				{
					$wszystko_OK=false;
					$_SESSION['e_nick']="Istnieje już gracz o takim nicku! Wybierz inny.";
				}
				
				if ($wszystko_OK==true)
				{
					
					$uprawnienia = "nie";
					if ($polaczenie->query("INSERT INTO uzytkownicy VALUES (NULL, '$nick', '$haslo_hash', '$email', 100, 100, 100, 14, '$uprawnienia')"))
					{
						$_SESSION['udanarejestracja']=true;
						header('Location: witamy.php');
					}
					else
					{
						throw new Exception($polaczenie->error);
					}
					
				}
				
				$polaczenie->close();
			}
			
		}
		catch(Exception $e)
		{
			echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogodności i prosimy o rejestrację w innym terminie!</span>';
			echo '<br />Informacja developerska: '.$e;
		}
		
	}
	
	
?>
        
        
<!DOCTYPE html>
<html lang="pl">
	<head>
		<title>Fitness Factory | Zapraszamy!</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/navbar-footer.css" rel="stylesheet">
		<link href="css/logowanie.css" rel="stylesheet">
		<meta name="Description" content="Tu wpisz opis zawartości strony" />
	    <meta name="Keywords" content="Tu wpisz wyrazy kluczowe rozdzielone przecinkami" />
       <link href="https://fonts.googleapis.com/css?family=News+Cycle:400,700" rel="stylesheet">
	
		<meta charset="utf-8">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="scroll.js"></script>
        <script src='https://www.google.com/recaptcha/api.js'></script>
        
       
	</head>
	<body>
           
        
            <div class="log-container" style="margin-top: 10%;">
                
                <form method="post" class="logowanie_ramka2">
                    <div class="col-md-12 pudelkoLog" style="padding-top: 30px;">
                    Login:
                    <input class="login" value="<?php
                                                if (isset($_SESSION['fr_nick']))
                                                {
                                                    echo $_SESSION['fr_nick'];
                                                    unset($_SESSION['fr_nick']);
                                
                                                }
                                                
                                                ?>" name="login" type="text"/>
                    <br/><br/>
                    <?php
                        if (isset($_SESSION['e_nick']))
                        {
                            echo '<div class="error">'.$_SESSION['e_nick'].'</div>';
                            unset($_SESSION['e_nick']);
                            /* wyczysczenie zmiennej sesysjne enick */
                        }
                    ?>        
                    Imię:
                    <input class="login" name="imie" type="text"/>
                    <br/><br/>
                    Nazwisko:
                    <input class="login" name="nazwisko" type="text"/>
                    <br/><br/>
                    E-mail:
                    <input class="login" name="email" value="<?php
                                                if (isset($_SESSION['fr_email']))
                                                {
                                                    echo $_SESSION['fr_email'];
                                                    unset($_SESSION['fr_email']);
                                
                                                }
                                                
                                                ?>" type="email"/>
                    <br/><br/>
                    <?php
                        if (isset($_SESSION['e_email']))
                        {
                            echo '<div class="error">'.$_SESSION['e_email'].'</div>';
                            unset($_SESSION['e_email']);
                            /* wyczysczenie zmiennej sesysjne enick */
                        }
                    ?>
                    Hasło:
                    <input class="login" name="haslo1" value="<?php
                                                if (isset($_SESSION['fr_haslo1']))
                                                {
                                                    echo $_SESSION['fr_haslo1'];
                                                    unset($_SESSION['fr_haslo1']);
                                
                                                }
                                                
                                                ?>" type="password"/>
                    <br/><br/>
                    <?php
                        if (isset($_SESSION['e_haslo']))
                        {
                            echo '<div class="error">'.$_SESSION['e_haslo'].'</div>';
                            unset($_SESSION['e_haslo']);
                            /* wyczysczenie zmiennej sesysjne enick */
                        }
                    ?>
                    Powtórz hasło:
                    <input class="login" name="haslo2" value="<?php
                                                if (isset($_SESSION['fr_haslo2']))
                                                {
                                                    echo $_SESSION['fr_haslo2'];
                                                    unset($_SESSION['fr_haslo2']);
                                
                                                }
                                                
                                                ?>" type="password"/>
                    <br/><br/>
                    
                    <input name="regulamin" type="checkbox" <?php
                           
                           if(isset($_SESSION['fr_regulamin']))
                           {
                               echo "checked";
                               unset($_SESSION['fr_regulamin']);
                           }
                           
                           ?>/> Akceptuje regulamin  
                    <br/><br/>
                    <?php
                        if (isset($_SESSION['e_regulamin']))
                        {
                            echo '<div class="error">'.$_SESSION['e_regulamin'].'</div>';
                            unset($_SESSION['e_regulamin']);
                            /* wyczysczenie zmiennej sesysjne enick */
                        }
                    ?>
                        
                    <div class="g-recaptcha" data-sitekey="6LdjJDgUAAAAADjLDovA5XMH2oSWceokbgOgpiHx"></div>
                    <?php
                        if (isset($_SESSION['e_bot']))
                        {
                            echo '<div class="error">'.$_SESSION['e_bot'].'</div>';
                            unset($_SESSION['e_bot']);
                            /* wyczysczenie zmiennej sesysjne enick */
                        }
                    ?>    
                    <input class="button-log2" type="submit" value="Zarejestruj się"/>
                    </div>
                    <?php
                    if(isset($_SESSION['blad'])) echo $_SESSION['blad'];

                    ?>
                </form>
                    
            </div>
        
      
        
        
		
        
    </body>
    
    
</html>