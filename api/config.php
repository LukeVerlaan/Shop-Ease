<?php
//if not accessed directly (this is defined in index) then define the connection variables else die.
if(defined('DIRECT_ACCESS') && DIRECT_ACCESS == false) {
    define('DATABASE_HOST', 'localhost');
    define('DATABASE_NAME', 'ictlab_kennislab');
    define('DATABASE_USERNAME', 'ictlab_kennislab');
    define('DATABASE_PASSWORD', 'kennislab@2017!');
}else{
    die("Direct access is not allowed");
}
