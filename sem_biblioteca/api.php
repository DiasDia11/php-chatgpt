<?php
if(isset($_POST['pergunta'])) {
            $url = 'https://api.openai.com/v1/engines/text-davinci-003/completions';
            $prompt = $_POST['pergunta'];
            
            $data = array(
                'prompt' => 'me informe em forma de table ' .$prompt,
                'max_tokens' => 4000,
                'stop' => '\n',
                'frequency_penalty' => 0,
                'presence_penalty' => 0.6,
                'temperature' => 0.9
            );

            $api_key = '';

            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Authorization: Bearer '.$api_key
            ));

            $result = curl_exec($ch);

            if(curl_errno($ch)) {
                echo 'Erro ao enviar a solicitação: ' . curl_error($ch);
            } else {
                $response = json_decode($result);
                $resposta =  $response->choices[0]->text;
                
            // quebra a string em linhas
            $lines = explode("\n", $resposta);

            // remove a última linha (que não é necessária)
            array_pop($lines);

            // separa a primeira linha (que contém os cabeçalhos)
            $headers = explode('|', trim(array_shift($lines)));
            $headers = array_map('trim', $headers);
            $headers = array_filter($headers);

            echo "sua pergunta foi: " .$_POST['pergunta'];
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
            }
            curl_close($ch);
        }