<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zadanie1</title>
</head>
<body>

    <form action="strona.php" method="post">

    <label for="tytul">Tytuł</label><br>
    <input type="text" name="tytul" id="tytul" required><br><br>

    <label for="tresc">Treść</label><br>
    <textarea name="tresc" id="tresc" cols="20" rows="10" style="width: 20%" required></textarea><br><br>

    <label for="slowo">Słowo kluczowe</label><br>
    <input type="text" name="slowo" id="slowo" placeholder="Prosze oddzielac przecinkiem" style="width: 20%" required><br><br>

    <input type="submit" id="dodaj" value="Dodaj">
    <input type="reset" id="wyczysc" value="Wyczyść"><br><br>

    </form>

    <?php
    
    $_SERVER["REQUEST_METHOD"] == "POST";

    $tytul = $_POST["tytul"];
    $tresc = $_POST["tresc"];
    $slowo = $_POST["slowo"];
    $slowo_tablica = explode(",", $slowo);
    
    echo "Tytuł: $tytul <br> Treść: $tresc <br> Słowo kluczowe: $slowo";

    $strona_plik = fopen("strona.html", "w");
    $plik_nowy = "
    <!DOCTYPE html>
    <html lang='pl'>
    <head>
        <meta charset='UTF-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <meta name='keywords' content='$slowo'>
        <title>$tytul</title>
    </head>
    <body>
        $tresc
    </body>
    </html>
    ";

    fputs($strona_plik, $plik_nowy);
    fclose($strona_plik);

    ?>

</body>
</html>

<!-- napisz program ktory po pobraniu danych z formularza utworzy plik strona.html, 
w formularzu podamy tytul strony, kawalek tresci (z formularza niech zczyta slowo kluczowe min.1) -->