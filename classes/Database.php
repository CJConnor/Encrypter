<?php
class Database {
    private static $con;
    private static $live;

    public static function con() {

        # IF NO CONNECTION - CREATE CONNECTION
        if(is_null(self::$con)) {

            # LOCALHOST LOCATION
            $whitelist = array( '127.0.0.1', '::1' );

            # TEST
            if(!in_array($_SERVER['REMOTE_ADDR'], $whitelist)) {
                self::$con = mysqli_connect('localhost', 'root', '200117', 'enc');
                self::$live = true;
                # LOCAL
            } else {
                self::$con = mysqli_connect('localhost', 'root', '', 'enc');
                self::$live = false;
            }

            if (mysqli_connect_errno()) {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
            }

            return self::$con;

            # OTHERWISE RETURN CONNECTION
        } else {
            return self::$con;
        }
    }
}