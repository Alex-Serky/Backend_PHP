<?php

$title = 'Nous contacter !';
require_once 'config.php';
require_once 'functions.php';
$heure = (int)date('G'); // Récupérer l'heure d'aujourd'hui
$creneaux = CRENEAUX[date('N') - 1]; // Récupérer les créneaux d'aujourd'hui $creneaux
dump($heure);
dump($creneaux);
exit();
$ouvert = in_creneaux($heure, $creneaux); // Récupérer l'état d'ouverture du magasin
require 'header.php';

?>

<div class="row">
    <div class="col-md-8">
        <h2>Nous contacter !</h2>
        <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. A autem at id,
            nobis ex sapiente ullam necessitatibus deserunt, sit ea est ipsum quia minus
            assumenda perspiciatis ad mollitia, dolorum distinctio.
        </p>
    </div>
    <div class="col-md-4">
        <h3>Horaire d'ouvertures</h3>
        <div class="alert alert-success">
            Le magasin est ouvert.
        </div>
        <div class="alert alert-danger">
            Le magasin est fermé.
        </div>
        <ul>
            <?php foreach(JOURS as $k => $jour): ?>
                <li <?php if($k + 1 === (int)date('N')): ?> style="color:green"<?php endif ?>>
                    <strong><?= $jour ?> :</strong>
                    <?= creneaux_html(CRENEAUX[$k]); ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

</div>

<?php require 'footer.php'; ?>