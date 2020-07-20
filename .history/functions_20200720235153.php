<?php

function nav_item(string $lien, string $titre, string $linkClass = ''): string
{
    $classe = 'nav-item';
    if ($_SERVER['SCRIPT_NAME'] === $lien) {
        $classe .= ' active';
    }
    return <<<HTML
        <li class="$classe">
            <a class="$linkClass" href="$lien">$titre</a>
        </li>
HTML;
}

function nav_menu(string $linkClass = ''): string
{
    return
        nav_item('/Backend_PHP/index.php', 'Accueil', $linkClass) .
        nav_item('/Backend_PHP/contact.php', 'Contact', $linkClass);
}

function select(string $name, $value, array $options): string {
    $html_options = [];
    foreach ($options as $k => $option) {
        $attributes = $k == $value ? ' selected' : '';
        $html_options[] = "<option value='$k'>$option</option>";
    }
    return "<select class='form-control' name='$name'>" . implode($html_options) . '</select>';
}

function dump($variable){
    echo '<pre>';
        var_dump($variable);
    echo '</pre>';
}

function creneaux_html($creneaux){
    if (empty($creneaux)) {
        return 'Fermé';
    }
    $phrases = [];
    foreach ($creneaux as $creneau) {
        $phrases[] = "
            <strong>{$creneau[0]}h</strong>
            à
            <strong>{$creneau[1]}h</strong>
            ";
    }
    return 'Ouvert de ' . implode(' et ', $phrases);
}

function in_creneaux(int $heure, array $creneaux): bool {
    foreach($creneaux as $creneau) {
        $debut = $creneau[0];
        $fin = $creneau[1];
        if ($heure >= $debut && $heure < $fin) {
            return true;
        }
    }
    return false;
}