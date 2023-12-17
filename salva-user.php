
<?php
//recupero valori inseriti nel form
$nome = $_POST['dati'];
$telefono = $_POST['telefono'];
$email = $_POST['email'];
$messaggio = $_POST['messaggio'];
//creo un filtro di validazione dei dati
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
       $errors[] = 'Email non valida';
    }
    if (!$nome) {
        $errors[] = 'dati non validi';
    }
    if (!$telefono) {
        $errors[] = 'telefono non valido';
    }
//combino testi in un unico file
$testo = "nome: ".$nome."-"
       . "email: ".$email."-"
       . "telefono: ".$telefono."-"
       . "messaggio: ".$messaggio.""; 
//trasformo il messaggio in un file json
$dati = json_encode($testo);
//scrivo i dati in un file .txt
$myfile = fopen("dati-preventivo.txt", "w");
$txt = $dati;
fwrite($myfile, $txt);
//torno alla homepage
header("Location: ".$_SERVER['HTTP_REFERER']);
exit();

