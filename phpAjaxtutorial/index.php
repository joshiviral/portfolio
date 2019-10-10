<!DOCTYPE html>
<html>
<head>
<title>Project1</title>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script>

function check()
{
	var name= document.getElementById('name').value;
	var dataString = 'name =' + name;
	$.ajax({
		type:"psot",
		url : "home.php",
		data:dataString,
		cache:false,
		success: function(html){
			$(#display).html(html);
		}
	});
	
	return false;
}
</script
</head>
<body>
	<label>Username</label>
	<input id="txtbox" type ="text">
	<input type="button" id = "btn" onclick="return check()" value="AddText"></button> 
	<div id="display" >
</body>
</html>