<?php 
// Milestone 2
// Verificato il corretto funzionamento del nostro codice, 
// spostiamo la logica in un file *functions.php* che includeremo poi nella pagina principale

$password_len = $_GET["password_len"] ?? "";

    $password_len_invalid = false;
    if($password_len > 20 || $password_len < 5){//mi assicuro che l'input sia valido solo se compreso tre 5 e 20
      $password_len = 5;
      $password_len_invalid = true;
    }

if(!empty($password_len)){

function generateRandomPassword($length_len) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!%=+-*';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length_len; $i++) {
        $randomString .= $characters[random_int(0, $charactersLength - 1)];
    }
    echo $randomString;
}

}

?>