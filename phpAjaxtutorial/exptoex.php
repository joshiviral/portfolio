<?php 
$db=mysqli_connect('68.178.217.40','pwocsurmonques','Rapt#19win515','pwocsurmonques');
$output="";	
if(isset($_POST["id"]))
{
 foreach($_POST["id"] as $id)
 {
 $query = "SELECT * FROM recordsuspension WHERE id = '".$id."'";
 $result = mysqli_query($connect, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
                         <th>Last Name</th>  
                         <th>Given Name</th>  
                         <th>Legal Name</th>         
                    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '<tr>  
                         <td>'.$row["lname"].'</td>  
                         <td>'.$row["gname"].'</td>  
                         <td>'.$row["legalname"].'</td>                           
    </tr>';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=download.xls');
  echo $output;
 }
}
}			
?>