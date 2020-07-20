<?php

$title = 'Nous contacter !';
require_once 'config.php';
require_once 'functions.php';
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
        <?php date('N') ?>
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