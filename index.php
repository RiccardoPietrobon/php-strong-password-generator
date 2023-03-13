<?php 
// Milestone 1
// Creare un form che invii in GET la lunghezza della password. 
// Una nostra funzione utilizzerà questo dato per generare una password casuale 
// (composta da lettere, lettere maiuscole, numeri e simboli) da restituire all'utente.
// Scriviamo tutto (logica e layout) in un unico file *index.php*

$password_len=$_GET["password_len"];

$randomString = "";

function generateRandomPassword($length_len) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!%=+-*';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length_len; $i++) {
        $randomString .= $characters[random_int(0, $charactersLength - 1)];
    }
    echo $randomString;
}




// Milestone 2
// Verificato il corretto funzionamento del nostro codice, 
// spostiamo la logica in un file *functions.php* che includeremo poi nella pagina principale

// Milestone 3 (BONUS)
// Invece di visualizzare la password nella index, effettuare un redirect ad una pagina dedicata 
// che tramite $_SESSION recupererà la password da mostrare all'utente.

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
        <section class="row my-5">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        Genera una password casuale
                    </div>
                    <div class="card-body">
                        <form method="GET" class="row">

                            <div class="col-4 mb-3">
                                <label for="password_len" class="form-label">Lunghezza password</label>
                                <input type="number" class="form-control" id="password_len" name="password_len" min="5"
                                    max="20">

                            </div>
                            <div class="col-4">
                                <button class="btn btn-primary">
                                    Filtra il form
                                </button>
                            </div>
                            <div class="col-12">
                                La tua password è <?php generateRandomPassword($password_len); ?>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>

</html>