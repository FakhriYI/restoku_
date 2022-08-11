<?php
session_start();

$_SESSION['resto'] = array();

header("location:../rsc/views/layout/login.php");
