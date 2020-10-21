<?php 
function maxsec($array){
  echo  max(unset(array_search(max($array))));
}