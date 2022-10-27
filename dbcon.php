<?php

$con = mysqli_connect("localhost", "root", "", "yolodash");

if (!$con) {
  die('Connection Failed' . mysqli_connect_error());
}
