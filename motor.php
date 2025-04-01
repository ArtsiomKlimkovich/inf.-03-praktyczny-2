<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl.css">
    <title>Motocykle</title>
</head>
<body>
    <img src="motor.png" alt="motocykl" class="motor">
    <header class="baner">
        <h1>Motocykle - moja pasja</h1>
    </header>

    <section class="content">
        <section class="lewy">
            <h2>Gdzie pojechać?</h2>
            <!-- Skrypt 1 -->
            <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "motory";
                
                $conn = new mysqli($servername, $username, $password, $dbname);
                
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                
                $sql = "SELECT nazwa, opis, poczatek, zrodlo FROM wycieczki INNER JOIN zdjecia ON wycieczki.id = zdjecia.id";
                $result = $conn->query($sql);
                
                if ($result->num_rows > 0) {
                    echo "<dl>";
                    while ($row = $result->fetch_assoc()) {
                        $nazwa = htmlspecialchars($row['nazwa']);
                        $opis = htmlspecialchars($row['opis']);
                        $poczatek = htmlspecialchars($row['poczatek']);
                        $zrodlo = htmlspecialchars($row['zrodlo']);
                        echo "<dt><a href='$zrodlo'>$nazwa, rozpoczyna się w $poczatek</a></dt>";
                        echo "<dd>$opis</dd>";
                    }
                    echo "</dl>";
                } else {
                    echo "Brak wyników.";
                }
            ?>
        </section>

        <section class="prawa">
            <section class="prawy">
                <h2>Co kupić?</h2>
                <ol>
                    <li>Honda CBR125R</li>
                    <li>Yamaha YBR125</li>
                    <li>Honda VFR800i</li>
                    <li>Honda CBR1100XX</li>
                    <li>BMW R1200GS LC</li>
                </ol>
            </section>

            <section class="prawy">
                <h2>Statystyki</h2>
                <p>Wpisanych wycieczek: </p>
                <!-- Skrypt 2 -->
                <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "motory";
                    
                    $conn = new mysqli($servername, $username, $password, $dbname);
                    
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }
                    
                    $sql = "SELECT COUNT(id) AS liczba_wycieczek FROM wycieczki";
                    $result = $conn->query($sql);
                    
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $liczba_wycieczek = htmlspecialchars($row['liczba_wycieczek']);
                        echo "<p>Wpisanych wycieczek: $liczba_wycieczek</p>";
                    } else {
                        echo "<p>Brak wycieczek.</p>";
                    }
                    
                    $conn->close();
                ?>
                <p>Użytkowników forum: 200</p>
                <p>Przesłanych zdjęć: 1300</p>
            </section>
        </section>
    </section>

    <footer class="stopka">
        <p>Stronę wykonał: Artsiom Klimkovich</p>
    </footer>
</body>
</html>
