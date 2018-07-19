<?php

    session_start();
    if((!isset($_POST['login'])) || (!isset($_POST['haslo'])))
    {
        header('Location: login.php');
        exit();
    }

    require_once "connect.php";  /*pobranie plików z ...*/
    $polaczenie = mysqli_connect($host,$db_user,$db_password,$db_name); /* NEW rezerwuje nowa pamiec 
    ustonawienie połączenia z baza przy pomocy obiektu klasy mysqli /instancji tej klasy*/
        
    if ($polaczenie->connect_errno!=0)
    {
        echo "Error: ".$polaczenie->connect_errno;
    }
    else
    {
        $login=$_POST['login'];  /*odczytanie wartosci ktore przyszly postem login i haslo */
        $haslo=$_POST['haslo'];
        
        $login = htmlentities($login,ENT_QUOTES, "UTF-8");
        
    
        if ($rezultat =@$polaczenie->query(sprintf("SELECT*FROM uzytkownicy WHERE user='%s'", mysqli_real_escape_string($polaczenie,$login))))
        {
            $ilu_userow = $rezultat->num_rows;
            if ($ilu_userow>0)
            {   
                $wiersz = $rezultat->fetch_assoc();
                /* przyniesienie wartosciz bazy i wlozenie do wiersz aport fetch */
                
                if (password_verify($haslo, $wiersz['pass']))
                {
                    $_SESSION['zalogowany'] = true;
                    $_SESSION['uzytkownik_id']=$wiersz['uzytkownik_id'];
                    $_SESSION['user'] = $wiersz['user'];   /* wyjmij login i włóz do szufladki user*/
                    $_SESSION['email'] = $wiersz['email'];   /* wyjmij login i włóz do szufladki user*/
                    $_SESSION['uprawnienia']= $wiersz['uprawnienia'];

                    if($_SESSION['uprawnienia'] == 1) {
                        
                      
                        header('Location: panel_admin.php'); /*przekierowanie*/
                    }
                    
                    else {
            
                    header('Location: gra.php'); /*przekierowanie*/
                    }
                    unset($_SESSION['blad']);

                    $rezultat->close(); /*wyczysc rezultaty zapytania*/
                }
                else 
                {
                    $_SESSION['blad'] = '<span style="color:red">Nieprawidłowy login lub hasło </span>';
                    header('Location: login.php');
                }
            } else {
               
                $_SESSION['blad'] = '<span style="color:red">Nieprawidłowy login lub hasło </span>';
                header('Location: login.php');
            }
        }
        
         $polaczenie->close(); /*gdy połączenie sie udało trzeba je zamknąć) */
    }

 /*właśna obsluga błedów połaczenia */
    
 
?>