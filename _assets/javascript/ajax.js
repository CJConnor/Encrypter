/**
 * submits input for encryption
 */
function submit() {

    //grab input
    let input = $('#input').val();

    //posts input to action
    $.post('actions/encrypt.php',
        {
            'input': input
        },
        function (data) {
            //if something is returned and that something says success
            if(data != "" && data === "success") {
                swal.fire({
                    type: 'success',
                    title: 'Your input was encrypted successfully!',
                });
            } else {
                swal.fire({
                    type: 'warning',
                    title: 'Oops there appears to be an error!'
                });
            }

            //refresh decryption table
            getInputs();
        }
    );



}

/**
 * grabs decrypted inputs
 */
function getInputs() {

    //sends request
    $.get('actions/decrypt.php', function (data) {

        //populates table with returned value
        $('#table').html(data);

    });

}