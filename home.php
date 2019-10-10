<?php
if(isset($_POST ['submit']))
{
$msg = 'Name: ' .$_POST['name'] ."\n"
.'Email: ' .$_POST['email'] ."\n"
.'Comments: ' .$_POST['comments'];

mail('viraljoshi357814@gmail.com','Sample Contact Us Form',$msg);
}
else
{
header('location : index.html');
exit(0);
}
 ?>