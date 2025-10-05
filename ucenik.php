<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Učenik</title>
</head>
<body>
    <h1>Unos podataka učenika</h1>
    <form method="post">
        <label for="ime">Ime:</label>
        <input type="text" name="ime" id="ime" required><br><br>

        <label for="prezime">Prezime:</label>
        <input type="text" name="prezime" id="prezime" required><br><br>

        <label for="datumRodjenja">Datum rođenja:</label>
        <input type="date" name="datumRodjenja" id="datumRodjenja" required><br><br>

        <input type="submit" value="Prikaži podatke" name="submit">
    </form>
</body>
</html>

<?php
class Ucenik
{
    private $ime;
    private $prezime;
    private $datumRodjenja;

    public function __construct($ime, $prezime, $datumRodjenja)
    {
        $this->ime = $ime;
        $this->prezime = $prezime;
        $this->datumRodjenja = $datumRodjenja;
    }

    public function getIme()
    {
        return $this->ime;
    }

    public function getPrezime()
    {
        return $this->prezime;
    }

    public function brojDanaOdDatumaRodjenja()
    {
        $datumRodjenjaObj = new DateTime($this->datumRodjenja);
        
        $danasnji = new DateTime();
        
        $razlika = $danasnji->diff($datumRodjenjaObj);
        
        return abs($razlika->days);
    }
}

if (isset($_POST['submit'])) {
    $ime = $_POST["ime"];
    $prezime = $_POST["prezime"];
    $datumRodjenja = $_POST["datumRodjenja"];

        $ucenik = new Ucenik($ime, $prezime, $datumRodjenja);
        
        echo "<hr>";
        echo "<h2>Podaci o učeniku:</h2>";
        echo "<p><strong>Ime:</strong> " . $ucenik->getIme() . "</p>";
        echo "<p><strong>Prezime:</strong> " . $ucenik->getPrezime() . "</p>";
        echo "<p><strong>Broj dana od datuma rođenja:</strong> " . $ucenik->brojDanaOdDatumaRodjenja() . " dana</p>";
    }
?>