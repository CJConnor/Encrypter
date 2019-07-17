<?php

    //includes
    include_once "../classes/Database.php";
    include_once "../classes/Encrypt.php";

    //queries database for all inputs
    $sql    = "SELECT * FROM enc_encrypt";
    $result = mysqli_query(Database::con(), $sql);
    $count  = mysqli_num_rows($result);

    //initialises return variable
    $html = "";

    //if there are rows to return
    if($count > 0) {

        while ($row = mysqli_fetch_assoc($result)) {

            $input = $row['input'];

            //decrypt input and add it to html string
            $html .= "<tr>
                         <td>" . Encrypt::decrypt($input) . "</td>
                      </tr>";


        }

    } else {
        //if nothing is found but html equal to this
        $html = "<tr>
                    <td>Nothing could be found</td>
                </tr>";
    }

    //return html
    echo $html;