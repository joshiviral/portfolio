<?php 
	$db=mysqli_connect('68.178.217.40','pwocsurmonques','Rapt#19win515','pwocsurmonques');
	$sql = "SELECT * FROM recordsuspension";
	$result = mysqli_query($db,$sql) or die (mysqli_error($db));
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Record Suspension Questionnaire - Pardons and Waivers of Canada Survey</title>    
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<style>
            table,tr,td
            {
                border: 1px solid black;
            }
        </style>
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/dob_table.css">
	<link href="https://fonts.googleapis.com/css?family=Noto+Sans&display=swap" rel="stylesheet">
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="javascript/record_susp.js"></script>
</head>

<body>	
<?php if(mysqli_num_rows($result) > 0)
   { 
?>
<div id="here"></div>
<table id="table">
		<tr>
			<th>Select</th>
			<th>Last Name</th>
			<th>Given Name</th>
			<th>Legal Name</th>						
			
		</tr>
		
		 <?php 
		 while($row = mysqli_fetch_array($result)){
			 ?>
            <tr id="<?php echo $row["id"]; ?>">
				<td><input type="checkbox" name="data[]" class="checkMe" value="<?php echo $row["id"]; ?>"></td>
                <td><?php echo $row["lname"];?></td>
                <td><?php echo $row["gname"];?></td>
                <td><?php echo $row["legalname"];?></td>                
            </tr>
		 <?php } ?>
		
</table>
   <?php } ?>
<div style="text-align:center;"><button type="button" name="export" class="btn">Export To CSV</button></div>
</form>

<script>
    function myFunction(){
      var checks = document.getElementsByClassName('checkMe');
      var table = document.getElementById('table')

      var element = document.getElementById("here");
      while (element.firstChild) {
        element.removeChild(element.firstChild);
      }
      for (var i = 0; i < table.rows.length; i++) {
        if(checks.item(i).checked == true){
          var ln = table.rows[i].cells[1].innerHTML; //first column  
          var gn = table.rows[i].cells[2].innerHTML; //first column  
          var lgln = table.rows[i].cells[3].innerHTML; //first column  
          var para = document.createElement("p");
          var node = document.createTextNode(ln + " " + gn + " "  + lgln);
          para.appendChild(node);

          element.appendChild(para); 
        }
      }
    }
  </script>

</body>
</html>
