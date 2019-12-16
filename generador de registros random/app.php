<?php
include("../conndb.php");
$data = date('Y-m-d H:i:s');
function b(){


    $index = "abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $index = str_split($index);
    $token = [];
    for($x=0; $x<10; $x++)	{
        array_push($token, $index[rand(0, 60)]);
    }
    $token = implode("", $token);
    return $token;

}
$token = b();

function regrandom($table, $max){
  global $token;
  global $data;
  global $conex;
  global $i;

for($i<0; $i<$max; $i++){
  $sql = "INSERT INTO $table VALUES(NULL, 'a', '123213', 'b', 'c', '$token', '0', '$data')";
  mysqli_query($conex, $sql) or die (mysqli_error($conex));

}}
regrandom('people', 10);






 ?>
