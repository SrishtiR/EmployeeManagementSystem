
<?php
if(!empty($_POST['email']))
{
require_once "mail.php";
$type="text/html";
$from='gmail.com';
$to=$_POST['email'];
$subject="WE HAVE RECIEVED";
$body="WE HAVE RECIEVED an email by".$_POST['name'];

$host="ssl://smtp.gmail.com";
$port=465;
$username="accnew114@gmail.com";
$password="accnew@114";

$headers=array('Content-Type'=>$type,'From'=>$from,'To'=>$to,'Subject'=>$subject,'Body'=>$body);
$smtp=@Mail::factory('smtp',array('host'=>$host,'port'=>$port,'auth'=>true,'username'=>$username,'password'=>$password));
$mail=@$smtp->send($to,$headers,$body);

}
?>
