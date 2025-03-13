<aside id="side-menu">
    <ul>
        <a href="list.php">
            <li>
                Liste des pokémons
            </li>
        </a>
        <a href="list-by-type.php">
            <li>
                Pokémons par type
            </li>
        </a>
        <?php if ($loggedIn): ?>
            <a href="pokemon_captured.php">Mes Pokémon capturés</a>
        <?php endif; ?>
    </ul>
</aside>