<?php

$title = 'Nous contacter !';
require_once 'config.php';
require_once 'functions.php';
date_default_timezone_set('Europe/Paris');
$heure = (int)date('G'); // Récupérer l'heure d'aujourd'hui
$creneaux = CRENEAUX[date('N') - 1]; // Récupérer les créneaux d'aujourd'hui $creneaux
$ouvert = in_creneaux($heure, $creneaux); // Récupérer l'état d'ouverture du magasin
$color = $ouvert ? 'green' : 'red';
// if ($ouvert) { $color = 'green';} else { $color = 'red'; }
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

        <form action="" method="GET">
            <div class="form-group">
                <select name="jour" class="form-control">
                    <?php foreach (JOURS as $k => $jour): ?>
                        <option value="<?= $k ?>"><?= $jour ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <input class="form-control" type="number" name="heure" value="$heure">
                <button type="submit" class="btn btn-primary">Voir si le magasin est ouvert</button>
            </div>
        </form>

        <?php if($ouvert): ?>
            <div class="alert alert-success">
                Le magasin est ouvert.
            </div>
        <?php else: ?>
            <div class="alert alert-danger">
                Le magasin est fermé.
            </div>
        <?php endif ?>
        <ul>
            <?php foreach(JOURS as $k => $jour): ?>
                <li <?php if($k + 1 === (int)date('N')): ?> style="color:<?= $color ?>"<?php endif ?>>
                    <strong><?= $jour ?> :</strong>
                    <?= creneaux_html(CRENEAUX[$k]); ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

</div>

<?php require 'footer.php'; ?>