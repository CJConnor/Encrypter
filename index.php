<?php include "inc/head.php"; ?>
    <body>

        <div class="container">

            <!-- Header -->
            <div class="row mt-4 d-flex justify-content-center" >
                <div style="text-align: center;">
                    <h1 class="display-2" >Encrypter</h1>
                </div>
            </div>

            <!-- Encryption form -->
            <?php include "inc/encrypt/encryption.php"?>

            <!-- Decryption form -->
            <?php include "inc/encrypt/decryption.php"?>

        </div>

        <!-- Background scripts -->
        <?php include "inc/background-scripts.php"; ?>
    </body>
</html>
