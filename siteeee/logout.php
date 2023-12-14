<?php
session_start();
include ("paht.php");
unset($_SESSION['id']);
unset($_SESSION['login']);
unset($_SESSION['admin']);
header('location: ' . BASE_URL);