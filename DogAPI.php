<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API de Cachorros</title>
    <style>
        /* Estilo geral */
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            text-align: center;
            margin: 20px;
        }

        h1 {
            color: #333;
        }

        /* Layout em grid */
        .grid-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            padding: 20px;
            justify-content: center;
        }

        /* Estilo dos cards */
        .card {
            background-color: white;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
        }

        .card:hover {
            transform: scale(1.05);
        }

        .card img {
            max-width: 100%;
            border-radius: 8px;
        }

        .card p {
            font-size: 16px;
            color: #555;
        }
    </style>
</head>
<body>
    <h1>🐶 API de Cachorros</h1>

    <div class="grid-container">
        <?php
            $url = "https://api.thedogapi.com/v1/images/search?limit=10";

            $json = file_get_contents($url);

            if ($json === false || empty($json)) {
                die("<p>Erro ao obter dados da API.</p>");
            }

            $dogs = json_decode($json, true);

            if ($dogs === null) {
                die("<p>Erro ao decodificar JSON.</p>");
            }

            foreach ($dogs as $dog) {
                echo "<div class='card'>";
                echo "<img src='" . $dog["url"] . "' alt='Imagem de cachorro'>";
                echo "</div>";
            }
        ?>
    </div>
</body>
</html>
