<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desafio Cloud</title>
</head>
<body>
    <?php
    $url = 'https://dummyjson.com/users';

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $resul = json_decode(curl_exec($ch));
    
    
    foreach($resul->users as $pessoa){
        $arrayRes[] = [
            $pessoa->address->state => $pessoa->firstName
        ];
    }



    echo "<pre>";
    var_dump($arrayRes);
    echo "</pre>";

    ?>
</body>
</html>