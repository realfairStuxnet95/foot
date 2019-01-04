<?php 
require "classes_loader.php";

$data=($article->search_article("marina"));
var_dump(reset($data));
?>