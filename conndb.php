<?php

$server = "localhost";
$user= "root";
$password="";
$db = "test";
 /*database test: 4tables[
clienti(9)[
  int id(11),
  text nome(),
  varchar indirizzo(50),
  varchar citofono(50),
  varchar email(50),
  varchar pass(50),
  varchar token(40),
  int attivo(11),
  datetime iscrizione
]
---------------------------------
inventario(5)[
  int id(11),
  text item(),
  int disp(10),
  float price(10,0),
  int ordinati(10),
],
---------------------
people(8)[
  int id(11),
  text nome(),
  int numero(10),
  text city(),
  text country(),
  varchar token(10),
  tinyint attivo(4),
  datetime iscrizione()
],
---------------------
users()[
  int id(11),
  text nome(),
  int telefono(11),
  varchar indirizzo(60),
  varchar email(60),
  varchar pw(60),
  varchar token(60),
  tinyint attivo(11),
  datetime iscrizione
]
---------------------
]
*/

$data = date('Y-m-d H:i:s');
$conex = mysqli_connect($server, $user, $password, $db) ;







 ?>
