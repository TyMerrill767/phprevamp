<?php
DEFINE ('DB_USER', 'admin');
DEFINE ('DB_PASSWORD', 'instructor');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'phpredisocgraphy');

$dbcon = @mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die ('Could not connect to MySQL : ' . mysqli_connect_error() );

mysqli_set_charset($dbcon, 'utf8');
