<?php

    require __DIR__.'/vendor/autoload.php';

    use Orhanerday\OpenAi\OpenAi;

    $open_ai_key = '';
    $open_ai = new OpenAi($open_ai_key);
    
    $prompt = $_POST['prompt'];

    $complete = $open_ai->completion([
        'model' => 'text-davinci-003',
        'prompt' => 'Witring 3 facebook markenting' . $prompt,
        'temperature' => 0.9,
        'max_tokens' => 4000,
        'frequency_penalty' => 0,
        'presence_penalty' => 0.6,
        
    ]);

    $responde = json_decode($complete, true);
    $responde = $responde["choices"][0]["text"];


    // quebra a string em linhas
    $lines = explode("\n", $responde);

    // remove a última linha (que não é necessária)
    array_pop($lines);

    // separa a primeira linha (que contém os cabeçalhos)
    $headers = explode('|', trim(array_shift($lines)));
    $headers = array_map('trim', $headers);
    $headers = array_filter($headers);

    // imprime a tabela
    echo '<table>';
    // imprime os cabeçalhos
    echo '<thead><tr>';
    foreach ($headers as $header) {
        echo '<th>' . $header . '</th>';
    }
    echo '</tr></thead>';

    // imprime as linhas da tabela
    echo '<tbody>';
    foreach ($lines as $line) {
        // separa as colunas por |
        $cols = explode('|', trim($line));

        // remove os espaços em branco desnecessários
        $cols = array_map('trim', $cols);
        $cols = array_filter($cols);

        // imprime as células da linha
        echo '<tr>';
        foreach ($cols as $col) {
            echo '<td>' . $col . '</td>';
        }
        echo '</tr>';
    }
    echo '</tbody></table>';
?>


