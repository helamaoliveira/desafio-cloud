<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
//CÓDIGO DESENVOLVIDO PELO CHAT GPT PARA ESTUDO - NÃO CONSIDERAR

// URL da API
$url = 'https://dummyjson.com/users';

// Inicia cURL
$ch = curl_init();

// Configura cURL
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

// Executa a requisição
$response = curl_exec($ch);

// Fecha cURL
curl_close($ch);

// Decodifica a resposta JSON
$data = json_decode($response, true);

// Verifica se a decodificação foi bem-sucedida
if ($data && isset($data['users'])) {
    // Organiza os nomes dos usuários por estado
    $usersByState = [];

    foreach ($data['users'] as $user) {
        $state = $user['address']['state'];
        $firstName = $user['firstName'];
        
        if (!isset($usersByState[$state])) {
            $usersByState[$state] = [];
        }
        
        $usersByState[$state][] = $firstName;
    }

    // Ordena os estados
    ksort($usersByState);

    // Ordena os nomes dentro de cada estado
    foreach ($usersByState as $state => $firstNames) {
        sort($usersByState[$state]);
    }

    // Exibe os nomes organizados por estado
    foreach ($usersByState as $state => $firstNames) {
        echo "Estado: $state\n";
        foreach ($firstNames as $name) {
            echo "<br> - $name\n";
        }
        echo "\n <br><br>";
    }
} else {
    echo "Falha ao obter dados da API.\n";
}
?>
</body>
</html>