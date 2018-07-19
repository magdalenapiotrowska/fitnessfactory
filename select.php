<?php  
//select.php  
if(isset($_POST["zajecia_id"]))
{
 $output = '';
 $connect = mysqli_connect("localhost", "root", "", "fitness");
    $connect->query("SET NAMES 'utf8' COLLATE 'utf8_general_ci'");
    $connect->query("SET CHARSET utf8");
 $query = "SELECT * FROM zajecia WHERE zajecia_id = '".$_POST["zajecia_id"]."'";
 $result = mysqli_query($connect, $query);
 $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';
    while($row = mysqli_fetch_array($result))
    {
     $output .= '
        <tr>  
            <td width="30%"><label>Zajęcia:</label></td>  
            <td width="70%">'.$row["zajecia_nazwa"].'</td>  
        </tr>
        <tr>  
            <td width="30%"><label>Data</label></td>  
            <td width="70%">'.$row["zajecia_czas"].'</td>  
        </tr>
        <tr>  
            <td width="30%"><label>Godzina</label></td>  
            <td width="70%">'.$row["zajecia_godzina"].'</td>  
        </tr>
        <tr>  
            <td width="30%"><label>Czas trwania</label></td>  
            <td width="70%">'.$row["czas_trwania"].'</td>  
        </tr>
        <tr>  
            <td width="30%"><label>Trener</label></td>  
            <td width="70%">'.$row["trener_nazwa"].'</td>  
        </tr>
        </table></div>
        
                       
     
     ';
    }
  
    echo $output;
}
?>