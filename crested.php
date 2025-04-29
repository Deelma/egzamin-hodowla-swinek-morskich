<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hodowla świnek morskich</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <h1>Hodowla świnek morskich - zamów świnkowe maluszki</h1>
    </header>
    <main>
        <section id="menu">
            <a href="peruwianka.php">Rasa Peruwianka</a>
            <a href="american.php">Rasa American</a>
            <a href="crested.php">Rasa Crested</a>
        </section>
        <section id="prawo">
        <h3>Poznaj wszystkie rasy świnek morskich</h3>
        <ol>
            <?php

                // ! Skrypt 1

                $PDO = new PDO('mysql:host=localhost;dbname=hodowla;port=3306;charset=utf8', 'root', '');

                $stmt = $PDO->query('SELECT `rasa` FROM `rasy`');

                foreach($stmt as $row){

                    echo '<li>' . $row['rasa'] .'</li>';

                }

            ?>
        </ol>
    </section>
        <section id="glowny">
            <img src="crested.jpg" alt="Świnka morska rasy crested">
            <?php

                // ! SKRYPT 2

                $PDO = new PDO('mysql:host=localhost;dbname=hodowla;port=3306;charset=utf8', 'root', '');

                $stmt = $PDO->query('SELECT DISTINCT `data_ur`, `miot`, `rasy`.`rasa` FROM `swinki` INNER JOIN `rasy` ON `rasy`.`id` = `swinki`.`rasy_id` WHERE `swinki`.`rasy_id` = 7');

                foreach($stmt as $row){

                    echo '<h2>Rasa: ' . $row['rasa'] .'</h2>';
                    echo '<p>Data urodzenia: ' . $row['data_ur'] . '</p>';
                    echo '<p>Oznaczenie miotu: ' . $row['miot'] . '</p>';

                }

            ?>
            <hr>
            <h2>Świnki w tym miocie</h2>
            <?php

                // ! SKRYPT 3

                $PDO = new PDO('mysql:host=localhost;dbname=hodowla;port=3306;charset=utf8', 'root', '');

                $stmt = $PDO->query('SELECT `imie`, `cena`, `opis` FROM `swinki` WHERE `rasy_id` = 7');

                foreach($stmt as $row){

                    echo '<h3>' . $row['imie'] . " - " . $row['cena'] . ' zł</h3>';
                    echo '<p>' . $row['opis'] .'</p>';

                }

                $PDO = NULL;

            ?>
        </section>
    </main>
        <footer>
            <p>Strone wykonał: Nikodem Warmowski</p>
        </footer>
</body>
</html>