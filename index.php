<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gra - Zgadnij liczbę</title>
    <style>
        *{
            font-family: sans-serif;
            text-align: center;
        }

        div{
            border: 1px solid #999
            padding: 5px;
        }

        a{
            text-decoration: none;
            color: #5482f8;
        }
    </style>
</head>
<body>
    <h1>Gra - Zgadnij liczbę</h1>
    <div>
        <p>Zgadnij liczbę od 1 - 10</p>
        <form action="index.php" method="post">
            <p>Liczba: <input type="number" name="num"></p>
            <input type="submit" value="Sprawdź">
        </form>
    </div>
    <div>
        <?php
            if(isset($_POST['num']) and is_numeric($_POST['num'])){
                $num = $_POST['num'];

                if(isset($_SESSION['i'])){
                    $_SESSION['i']++;
                }else {
                    $_SESSION['i'] = 1;
                }

                if(!isset($_SESSION['los'])){
                    $_SESSION['los'] = random_int(1, 10);
                }

                if($num > $_SESSION['los']){
                    echo '<br> Niestety wylosowana liczba jest mniejsza od Twojej!<br>';
                }else if($num < $_SESSION['los']){
                    echo '<br> Niestety wylosowana liczba jest większa od Twojej!<br>';
                }else {
                    echo '<br> Brawo! Zgadłeś za '. $_SESSION['i'] .' razem!<br>';
                    session_destroy();
                }
            }else{
                if(isset($_SESSION['i'])){
                    echo '<br> Podaj kolejną liczbę...';
                }else{
                    echo '<br> Podaj pierwszą liczbę...';
                }
            }

        ?>
    </div>
</body>
</html>