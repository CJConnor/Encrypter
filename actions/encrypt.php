<?php

    //includes
    include_once "../classes/Database.php";
    include_once "../classes/Encrypt.php";

    //collect input
    $input = $_POST['input'];

    //encrypts input
    $encryption = Encrypt::encryption($input);

    //adds input to database
    $sql    = "INSERT INTO enc_encrypt (input) VALUES ('$encryption')";
    $result = mysqli_query(Database::con(), $sql);

    echo "success";