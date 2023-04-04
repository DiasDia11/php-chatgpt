<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <div>
        <h1>Pergunta</h1>
        <form method="post" >
            <div>
                <input type="text" name="pergunta" placeholder="faça a pergunta"/>
            </div>
            
            <div>
                <input type="submit" value="Perguntar" />
            </div>
        </form>    
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div>
        <h1>Resposta</h1>
        <?php
        
        include './api.php';
        
        ?>
    </div>
           
</body>
</html>