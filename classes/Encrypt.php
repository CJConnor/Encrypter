<?php

    /**
     * Class Encrypt
     */
    abstract class Encrypt {

        /**
         * Key used to encrypt data
         * @var string
         */
        private static $key = "!Beckwith2019?";
        private static $method = "AES-256-CBC";

        /**
         * Encrypts string
         * @param $plaintext
         * @return string
         */
        public static function encryption($plaintext) {

            $password = self::$key; //collect password
            $method = self::$method;  //encryption method
            
            $key = hash('sha256', $password, true); //hashes password to create key
            $iv = openssl_random_pseudo_bytes(16); //creates a initialisation vector

            $ciphertext = openssl_encrypt($plaintext, $method, $key, OPENSSL_RAW_DATA, $iv); //encrypts plain text based off method
            $hash = hash_hmac('sha256', $ciphertext, $key, true); //hashes encrypted text using key

            $final_encryption = $iv . $hash . $ciphertext;

            //Returns encryption prepared for db
            return mysqli_real_escape_string(Database::con(), $final_encryption);
        }

        /**
         * Decrypts String
         * @param $ivHashCiphertext
         * @return string|null
         */
        public static function decrypt($ivHashCiphertext) {

            $password = self::$key; //collect password
            $method = self::$method;  //encryption method

            //Splits encryption into the 3 separate components
            $iv = substr($ivHashCiphertext, 0, 16); //Grabs the initialisation vector
            $hash = substr($ivHashCiphertext, 16, 32); //Grabs hash
            $ciphertext = substr($ivHashCiphertext, 48);  //Grabs encrypted text

            $key = hash('sha256', $password, true); //hashes password to get the key

            //dehashes the hash and if it is not the same as the cipher it returns null
            if (hash_hmac('sha256', $ciphertext, $key, true) !== $hash) return null;

            //returns decrypted cipher
            return openssl_decrypt($ciphertext, $method, $key, OPENSSL_RAW_DATA, $iv);
        }

    }
