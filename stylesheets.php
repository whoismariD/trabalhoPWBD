<?php
/*** set the content type header ***/
/*** Without this header, it wont work ***/
header("Content-type: text/css");

?>

table {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td,  th {
  border: 1px solid #ddd;
  padding: 8px;
}

tr:nth-child(even){
  background-color: #ffdbdb;
}

tr:hover {
  background-color: #ddd;
}

th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #991d30;
  color: white;
}

td {
font-size: <?=$font_size?>;
border: <?=$border?> #DDD;
}