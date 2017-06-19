<?php
//if not accessed directly (this is defined in index) then define the connection class else die.
if (defined('DIRECT_ACCESS') && DIRECT_ACCESS == false) {
    class Connect {

        static $DatabaseObject = null;

        static function getDatabaseObject()
        {

            if (Connect::$DatabaseObject != null) return Connect::$DatabaseObject;

            $host = DATABASE_HOST;
            $dbname = DATABASE_NAME;
            $username = DATABASE_USERNAME;
            $password = DATABASE_PASSWORD;

            $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');

            try {
                Connect::$DatabaseObject = new PDO("mysql:dbname={$dbname};host={$host};charset=utf8", $username, $password, $options);
            } catch (PDOException $ex) {
                die("Geen connectie met database: " . $ex->getMessage());
            }

            Connect::$DatabaseObject->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            Connect::$DatabaseObject->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

            if (function_exists('get_magic_quotes_gpc') && get_magic_quotes_gpc()) {
                function undo_magic_quotes_gpc(&$array)
                {
                    foreach ($array as &$value) {
                        if (is_array($value)) {
                            undo_magic_quotes_gpc($value);
                        } else {
                            $value = stripslashes($value);
                        }
                    }
                }

                undo_magic_quotes_gpc($_POST);
                undo_magic_quotes_gpc($_GET);
                undo_magic_quotes_gpc($_COOKIE);
            }
            return Connect::$DatabaseObject;
        }
    }
} else {
    die("Direct access is not allowed");
}
?>
