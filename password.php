<?php 

// Milestone 3 (BONUS)
// Invece di visualizzare la password nella index, effettuare un redirect ad una pagina dedicata 
// che tramite $_SESSION recupererà la password da mostrare all'utente.


session_start(); //inizializzo la sessione
$generated_password = $_SESSION["generated_password"]; //recupero la variabile in index

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
                        Password generata
                    </div>
                    <div class="card-body">

                        <div class="alert alert-success" role="alert">
                            La password generata è: <strong> <?= $generated_password ?> </strong>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>
</body>

</html>