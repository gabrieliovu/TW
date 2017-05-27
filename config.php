<?php

$host = "localhost";
$user = "root";
$pass = "";
$dberror="fuck";

$conn=mysqli_connect($host, $user, $pass,'clienti') or die ($dberror);
if(!isset($_COOKIE['temaTW']) || $_COOKIE['temaTW']=='') {
    $token = md5(time()).rand(0,999999);
    setcookie('temaTW', $token, time() + (86400 * 30));
    //echo $token;
    $time = time();
    mysqli_query($conn,"INSERT INTO tableCookie VALUES ('".$token."',".$time.")");
} else {
    $tokenCookie = $_COOKIE['temaTW'];
    //mysqli_query($conn, "SELECT * FROM tableCookie WHERE token = '$tokenCookie'");
    if ($query = mysqli_query($conn, "SELECT * FROM tableCookie WHERE token = '$tokenCookie'") && !(mysqli_num_rows($query)))
    {
        //echo 'meh';
        setcookie('temaTW', '', time()-3600);
    }
    //echo 'You have a little session base on cookie '.$tokenCookie;
}