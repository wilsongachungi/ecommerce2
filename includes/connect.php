<?php

$con=mysqli_connect('localhost','root','','mystall');
if($con){
    echo"";
}else{
    die(mysqli_error($con));
}

?>