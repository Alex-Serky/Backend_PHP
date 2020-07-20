<?php

if (!function_exists('nav_item')) {
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
}

?>

<?= nav_item('/Backend_PHP/index.php', 'Accueil', $linkClass) ?>
<?= nav_item('/Backend_PHP/contact.php', 'Contact', $class) ?>