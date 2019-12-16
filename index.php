<?php
include("conndb.php");
include("head.php");
function pager(){
  global $conex;    
$recordsTotal = mysqli_num_rows(mysqli_query($conex, "SELECT * FROM people")); //var 83
$numeroResult = 5;
$numeroPaginas = round($recordsTotal/$numeroResult); //var 17


//$pagsviews = round($numeroPaginas/2); //var 9
$pagsviews = 10;
print("<h2>paginas visibles:$pagsviews</h2><br>");

print("<h2>numero paginas calculadas:$numeroPaginas</h2><br>");
print("<h2>registros encontrados:$recordsTotal</h2><br>");


//------------------------------------------------------
if($recordsTotal >10){
if(!isset($_GET['page'])){
  print("<ul class='pagination'>");
  for($i=1; $i<=$pagsviews; $i++){
    print("<li><a href='index.php?page=$i'>".$i."</a></li>");
  }
  print("</ul><br>");

// ------------------------------------------------------------
  print("<script type='text/javascript'>
    ulpag = document.querySelector('.pagination');
    li = ulpag.childNodes;
    li[0].setAttribute('class', 'active');
    </script>");
  $sql = "SELECT id FROM people LIMIT 5 ";
}

//--------------------------------------------------------------
if(isset($_GET['page'])){

if($_GET['page']<$pagsviews){
  $i = 1;
}
if($_GET['page']>$pagsviews){

  //$pagsviews = $_GET['page'] + (($_GET['page']-($_GET['page']-$pagsviews)) - ($_GET['page']-$pagsviews));
   $pagsviews = (string)$_GET['page'];
   $pagsviews = str_split($pagsviews);
   $pagsviews = (int)$pagsviews[1];

   $i = ($_GET['page'] - $pagsviews)-1;

   $pagsviews = $_GET['page'] + (10 - $pagsviews);
  if($pagsviews>$numeroPaginas){
    $pagsviews = $numeroPaginas;
  }

}
  if($_GET['page'] % $pagsviews == 0){

    $i = $_GET['page']-1;
    $pagsviews = $_GET['page'] + $pagsviews;
    if($pagsviews>$numeroPaginas){
      $pagsviews = $numeroPaginas;
    }

  }
  print("<ul class='pagination'>");
  for($i; $i<=$pagsviews; $i++){
    print("<li><a href='index.php?page=$i'>".$i."</a></li>");
  }
  print("</ul><br>");
//----------------------------------------------------------------------
  $page = $_GET['page'];
  print("<script type='text/javascript'>
    ulpag = document.querySelector('.pagination');
    li = ulpag.childNodes;
    for(var i=0; i<li.length; i++){
      console.log(i);
      if(li[i].children[0].innerText == $page){
        li[i].setAttribute('class', 'active');
      }
    }
  </script>");
  $index = ($page * 5)-5;
  $sql = "SELECT id FROM people LIMIT $index, 5 ";
}
//----------------------------------------------------------------------

$result = mysqli_query($conex, $sql);
while($regs = mysqli_fetch_assoc($result)){
    print($regs["id"])."<br>";
}
}
}
pager();
?>

<!-- las variables se mueren al recargar la pagina
<script type="text/javascript">

  ul = document.querySelector(".pagination");

  ul.addEventListener("click", function(e){
    //<ul><li><a>

    console.log(e.target.innerText);
    console.log(e.target);
    target = e.target;  //<a>
    target = target.parentNode; //<li>

    target.setAttribute("class", "active");
    //target.setAttribute("")
    //alert(e.target.innerText);

  }, false)
</script> -->
