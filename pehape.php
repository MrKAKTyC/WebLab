
<?
  $name = $_POST["name"];
  $mail = $_POST["mail"];
  $msg = $_POST["msg"];

  echo "thank ".$name." for your feedback";

  mail($mail,"feedback",$msg);
 ?>
