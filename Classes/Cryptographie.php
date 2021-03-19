<?php
    class MyEncryption {
        public static $encryption_key = "salemKhalfi";
        public static $encryption_iv = "1234567891011121";
        public static $options = 0;
        public static $ciphering = "AES-128-CTR";
        public static $cipher = "aes-128-gcm";

        public static function encrypt($data) {

            // Use OpenSSl Encryption method
            $iv_length = openssl_cipher_iv_length(self::$ciphering);

            // Use openssl_encrypt() function to encrypt the data
            $encryption = openssl_encrypt($data, self::$ciphering,
                        self::$encryption_key, self::$options, self::$encryption_iv);

            // Display the encrypted string
            return $encryption;
        }

        public static function decrypt($data) {
            // Use openssl_decrypt() function to decrypt the data
            $decryption = openssl_decrypt ($data, self::$ciphering,
                     self::$encryption_key, self::$options, self::$encryption_iv);

            // Display the decrypted string
            return $decryption;
        }
    }
    // echo MyEncryption::encrypt("123456789");
    // echo MyEncryption::decrypt("nKLN46gJX+Lk");

?>