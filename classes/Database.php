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
            if(@explode('.', $_SERVER['HTTP_HOST'])[0] == 'test' || @explode('.', $_SERVER['HTTP_HOST'])[1] == 'test'){
                self::$con = mysqli_connect('localhost','rushtest_root', '06J$[@%&8rSI', 'rushtest_test');
                # LIVE
            } else if(!in_array($_SERVER['REMOTE_ADDR'], $whitelist)) {
                self::$con = mysqli_connect('localhost', 'rushinsi_root', 'tZ3s}K@,7bqn', 'rushinsi_insurance');
                self::$live = true;
                # LOCAL
            } else {
                self::$con = mysqli_connect('localhost', 'root', '', 'test');
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