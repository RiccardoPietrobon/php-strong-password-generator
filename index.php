<?php 
// Milestone 1
// Creare un form che invii in GET la lunghezza della password. 
// Una nostra funzione utilizzerà questo dato per generare una password casuale 
// (composta da lettere, lettere maiuscole, numeri e simboli) da restituire all'utente.
// Scriviamo tutto (logica e layout) in un unico file *index.php*

//eseguo

require_once(__DIR__ . "/functions.php");//fa riferimento al file delle functions

if(!empty($_GET)){ //condizione: eseguo il codice se ho una lunghezza in input 

$alphabet = "abcdefghijklmnopqrstuvwxyz";
$alphabet_UP = strtoupper($alphabet);//rendere le lettere maiuscole
$numbers = "0123456789";
$specials = "!%=+-*-_@#§";



$allowed_chars = ""; //in partenza non ho caratteri permessi, li aggiungo se clicco le checkbox

if(isset($_GET["allow_alphabet_lc"])) $allowed_chars .= $alphabet; //se checbox premuta     //aggiungo valore
if(isset($_GET["allow_alphabet_uc"])) $allowed_chars .= $alphabet_UP;
if(isset($_GET["allow_numbers"])) $allowed_chars .= $numbers;
if(isset($_GET["allow_specials"])) $allowed_chars .= $specials;
//se l'utente non seleziona nulla gestiamo noi mettendo tutti i caratteri possibili
if(empty($allowed_chars)) $allowed_chars = $alphabet . $alphabet_UP . $numbers . $specials; //concatenazione di tutti i caratteri

$password_len = (int) $_GET["password_len"] ?? 5; //prendo il valore della lunghezza dall'input, se non ce l'abbiamo do 5, metto (int) così lo passa come un intero
$allow_repeat = (bool) isset($_GET["allow_repeat"]) ? true : false; //Posso ripetere o no, ho 2 possibilità, quindi bool, true/false

//se le ripetizioni non sono ammesse e la lunghezza della password messa dall'utente è maggiore di quella richiesta ERRORE
if(!$allow_repeat && ($password_len > strlen($allowed_chars))){ 
    $allow_repeat = true;
}


session_start(); //inizio la sessione, va fatta una volta per file
$_SESSION["generated_password"] = generateRandomPassword($allowed_chars, $password_len, $allow_repeat); //salvo la password in una variabile di sessione, faccio passare i caratteri permessi
header("Location: ./password.php");

}





// Milestone 4 (BONUS)
// Gestire ulteriori parametri per la password: quali caratteri usare fra numeri, lettere e simboli. 
// Possono essere scelti singolarmente (es. solo numeri) oppure possono essere combinati fra loro 
// (es. numeri e simboli, oppure tutti e tre insieme).
// Dare all'utente anche la possibilità di permettere o meno la ripetizione di caratteri uguali.

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password generator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
</head>

<body>
    <div class="container">
        <h1>Generator password</h1>
        <section class="row my-5 justify-content-center">
            <div class="col-7">
                <div class="card">
                    <div class="card-header">
                        Genera una password casuale
                    </div>
                    <div class="card-body">
                        <?php if(!isset($generated_password)) : ?>
                        <!-- se non c'è la password mostro il form -->
                        <form method="GET" class="row">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-4 mb-3">
                                        <label for="password_len" class="form-label">Lunghezza password</label>
                                    </div>
                                    <div class="col-8">
                                        <input type="number" class="form-control" id="password_len" name="password_len"
                                            min="5" max="20">
                                    </div>
                                </div>

                                <hr>

                                <div class="row">
                                    <div class="col-4 mb-3">
                                        <label for="password_len" class="form-label">Caratteri permessi</label>
                                    </div>
                                    <div class="col-8">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1"
                                                name="allow_alphabet_lc" id="allow_alphabet_lc">
                                            <label class="form-check-label" for="allow_alphabet_lc">
                                                Alfabeto minuscolo
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1"
                                                name="allow_alphabet_uc" id="allow_alphabet_uc">
                                            <label class="form-check-label" for="allow_alphabet_uc">
                                                Alfabeto maiuscolo
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1"
                                                name="allow_numbers" id="allow_numbers">
                                            <label class="form-check-label" for="allow_numbers">
                                                Numeri
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1"
                                                name="allow_specials" id="allow_specials">
                                            <label class="form-check-label" for="allow_specials">
                                                Caratteri speciali
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <hr>

                                <div class="row">
                                    <div class="col-4 mb-3">
                                        <label for="password_len" class="form-label">Permetti ripetizioni?</label>
                                    </div>
                                    <div class="col-8">
                                        <input class="form-check-input" type="checkbox" value="1" name="allow_repeat"
                                            id="allow_repeat">
                                        <label class="form-check-label" for="allow_repeat">
                                            Sì
                                        </label>
                                    </div>
                                </div>

                                <hr>

                                <div class="row">
                                    <div class="col-4">
                                        <button class="btn btn-primary">
                                            Genera password
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </form>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </section>
    </div>
</body>

</html>