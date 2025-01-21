<?php
$datos_pokemon = []; // Inicializamos el array de datos vacío

// Verificamos si se envió el formulario
if (isset($_POST['pokemon_name'])) {
    $pokemon_name = strtolower(trim($_POST['pokemon_name'])); // Convertimos a minúsculas y eliminamos espacios

    // Llamamos a la API de PokeAPI con el nombre ingresado
    $url = "https://pokeapi.co/api/v2/pokemon/$pokemon_name/";
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $result = curl_exec($ch);
    $datos_pokemon = json_decode($result, true); // Decodificamos los datos JSON como un array
    curl_close($ch);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokeapi</title>
</head>
<body>
    <h1>Pokeapi</h1>
    <form method="POST" action="">
        <label for="pokemon_name">Nombre del Pokémon:</label>
        <input type="text" id="pokemon_name" name="pokemon_name" required>
        <button type="submit">Buscar</button>
    </form>

<?php
    if (isset($datos_pokemon['name'])) {
        echo "<h2>" . ucfirst($datos_pokemon['name']) . "</h2>";
        echo "<img src='" . $datos_pokemon['sprites']['front_default'] . "' alt='" . $datos_pokemon['name'] . "'>";
        
        echo "<p><strong>Tipos:</strong> ";
        foreach ($datos_pokemon['types'] as $tipo) {
            echo $tipo['type']['name'] . " ";
        }
        echo "</p>";
        
        if (isset($datos_pokemon['stats'])) {
            echo "<p>HP: " . $datos_pokemon['stats'][0]['base_stat'] . "</p>";
            echo "<p>Ataque: " . $datos_pokemon['stats'][1]['base_stat'] . "</p>";
            echo "<p>Defensa: " . $datos_pokemon['stats'][2]['base_stat'] . "</p>";
            echo "<p>Ataque Especial: " . $datos_pokemon['stats'][3]['base_stat'] . "</p>";
            echo "<p>Defensa Especial: " . $datos_pokemon['stats'][4]['base_stat'] . "</p>";
        }
    }
?>


</body>
</html>