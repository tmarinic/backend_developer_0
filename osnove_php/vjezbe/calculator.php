<!DOCTYPE html>
<html>
<body>

    <h2>Kalkulator</h2>

    <form method="POST">
        <label for="num1">Unesite prvi broj:</label><br>
        <input type="number" id="num1" name="num1" required><br>

        <label for="operator">Odaberite operaciju:</label><br>
        <select id="operator" name="operator">
            <option value="add">+</option>
            <option value="subtract">-</option>
            <option value="multiply">*</option>
            <option value="divide">/</option>
        </select><br>

        <label for="num2">Unesite drugi broj:</label><br>
        <input type="number" id="num2" name="num2" required><br><br>

        <input type="submit" value="Izračunaj">
    </form>

    <?php
    var_dump($_SESSION);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Provjera jesu li uneseni brojevi
    if (isset($_POST['num1']) && isset($_POST['num2'])) {
        // Čitanje unesenih brojeva
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];
        // Čitanje odabranog operatora
        $operator = $_POST['operator'];
        
        // Izvođenje odgovarajuće operacije
        switch ($operator) {
            case 'add':
                $result = $num1 + $num2;
                break;
            case 'subtract':
                $result = $num1 - $num2;
                break;
            case 'multiply':
                $result = $num1 * $num2;
                break;
            case 'divide':
                if ($num2 != 0) {
                    $result = $num1 / $num2;
                } else {
                    $result = "Error";
                }
                break;
            default:
                $result = "Nepoznat operator";
                break;
        }
        echo "<h3>Rezultat = $result</h3>";
    } else {
        echo "<h3>Molimo unesite oba broja!</h3>";
    }
}
?>