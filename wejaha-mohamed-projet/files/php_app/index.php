<?php
// Configuration du serveur MySQL
$db_host = 'localhost';
$db_port = '3306';

// Configuration des informations de connexion
$database_config = [
    'stag' => [
        'db_name' => 'my_staging_db',
        'user' => 'my_stag_user',
        'password' => 'root'
    ],
    'prod' => [
        'db_name' => 'my_database',
        'user' => 'my_prod_user',
        'password' => 'root'
    ]
];

// Fonction pour établir une connexion à la base de données
function connectToDatabase($host, $user, $password, $db_name, $port) {
    $link = mysqli_connect($host, $user, $password, $db_name, $port);
    if (!$link) {
        die('Could not connect to database: ' . mysqli_connect_error());
    }
    return $link;
}

// Fonction pour afficher un message de connexion réussie
function displayConnectionMessage($db_type) {
    echo "Connected successfully to {$db_type} database.<br>";
}

// Connexion à chaque base de données spécifiée dans $database_config
foreach ($database_config as $db_type => $config) {
    $db_name = $config['db_name'];
    $user = $config['user'];
    $password = $config['password'];

    // Tentative de connexion à la base de données
    $link = connectToDatabase($db_host, $user, $password, $db_name, $db_port);

    // Vérification de la connexion réussie
    if ($link) {
        // Affichage d'un message de connexion réussie
        displayConnectionMessage(ucfirst($db_type));

        // Ici, vous pouvez ajouter des opérations supplémentaires sur la base de données...

        // Fermer la connexion à la base de données
        mysqli_close($link);
    } else {
        // Gestion des erreurs de connexion
        die("Could not connect to {$db_type} database.");
    }
}

// Afficher "Hello world!" après les connexions réussies
echo 'Hello world';
?>
