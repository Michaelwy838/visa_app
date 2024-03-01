<?php

$conn = mysqli_connect('localhost', 'root', '', 'visa');
if(!$conn){
    echo "query error: " . mysqli_connect_error();
}
?>