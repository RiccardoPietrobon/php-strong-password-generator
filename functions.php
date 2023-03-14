<?php 
// Milestone 2
// Verificato il corretto funzionamento del nostro codice, 
// spostiamo la logica in un file *functions.php* che includeremo poi nella pagina principale

//tengo sempre fuori la funzione in caso di riutilizzo
function generateRandomPassword($allowed_chars, $length_len, $allow_repeat) { //faccio passare la lunghezza e i caratteri permessi
    $randomString = '';

    while(strlen($randomString) < $length_len){
        $rand_char_index = rand(0, strlen($allowed_chars) - 1); //indice caratteri permessi 
        $rand_char = $allowed_chars[$rand_char_index]; //caratteri permessi 

        //le ripetizioni sono ammesse quindi posso aggiungere il carattere altrimenti lo aggiungo solo una volta
        if($allow_repeat || !str_contains($randomString, $rand_char)){ 
            $randomString .= $rand_char; //aggiungo mano a mano finchè raggiungo la lunghezza
        }

    }

    return $randomString;
};



?>