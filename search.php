<?php 
//load database connection
    //echo "hello";
    $host = "localhost";
    $user = "root";
    $password = "iamblaze";
    $database_name = "schemes";
    $pdo = new PDO("mysql:host=$host;dbname=$database_name", $user, $password, array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ));
// Search from MySQL database table
   // echo "hello again";
$search=$_POST['search'];
$search = trim($search);
$search_explode = explode(" ", $search);
$cons = "select * from scheme where ";
$count = 0;
foreach ($search_explode as $exploded_search ) {
    # code...
    $count++;
    if( $count == 1){
        $cons .= "name LIKE '%$exploded_search%' OR kewwords LIKE '%$exploded_search%' ";    
    } else{
        $cons .= "OR name LIKE '%$exploded_search%' OR kewwords LIKE '%$exploded_search%' ";
    }

}
$cons .= " LIMIT 0, 10";    
//echo $cons."</br>";
$query = $pdo->prepare($cons);
//select * from scheme where name LIKE '%$search%' OR kewwords LIKE '%$search%'  LIMIT 0 , 10
$query->bindValue(1, "%$search%-", PDO::PARAM_STR);
$query->execute();
// echo "again hello";
// Display search result
         if (!$query->rowCount() == 0) {
		 		echo "Search found :<br/>";
				echo "<table style=\"font-family:arial;color:#333333;\">";	
                echo "<tr><td style=\"border-style:solid;border-width:1px;border-color:#98bf21;background:#98bf21;\">Title Scheme</td><td style=\"border-style:solid;border-width:1px;border-color:#98bf21;background:#98bf21;\">Descri[tion</td></tr>";				
            while ($results = $query->fetch()) {
				echo "<tr><td style=\"border-style:solid;border-width:1px;border-color:#98bf21;\">";			
                echo $results['name'];
				echo "</td><td style=\"border-style:solid;border-width:1px;border-color:#98bf21;\">";
                echo $results['kewwords'];
				echo "</td>";
    				
            }
				echo "</table>";		
        } else {
            echo 'Nothing found';
        }
?>