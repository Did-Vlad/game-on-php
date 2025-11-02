<?php
// перевірка чи користува зареєстрований
if (!isset($_GET['name'])) {
    die("Name parameter missing");
}

// масив значень
$names = array('Камінь', 'Ножиці', 'Папір');

// функція для перевірки значень
function check($computer, $player) {
    if ($computer == $player) {
        return "Нічия";
    } elseif (($player == 0 && $computer == 2) ||
              ($player == 1 && $computer == 0) ||
              ($player == 2 && $computer == 1)) {
        return "Ви виграли";
    } else {
        return "Ви програли";
    }
}
$result = '';
$testOutput = '';
if (isset($_POST['play'])) {
    // приводимо до числа, щоб порівняння були коректні
    $player = isset($_POST['choice']) ? intval($_POST['choice']) : -1;
    if ($player == 3) { // Тестова опція
        $testOutput = "<h2>test resoults:</h2><pre>";
        for ($c = 0; $c < 3; $c++) {
            for ($h = 0; $h < 3; $h++) {
                $r = check($c, $h);
                $testOutput .= "Людина={$names[$h]} Комп'ютер={$names[$c]} Результат=$r\n";
            }
        }
        $testOutput .= "</pre>";
    } else {
        // зіграти в гру
        if ($player >= 0 && $player <= 2) {
            $computer = rand(0, 2);
            $r = check($computer, $player);
            $result = "Ваш вибір = {$names[$player]}. Комп'ютер вибрав = {$names[$computer]}. Результат = $r.";
        } else {
            $result = "Некоректний вибір.";
        }
    }
} ?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Камінь-ножниці-бумага</title>
</head>
<body>
<h1>Ласкаво просимо до гри "Камінь-ножниці-бумага"</h1>
<p>Ласкаво просимо, <?php echo htmlspecialchars($_GET['name']); ?></p>

    <form method="post">
        <select name="choice">
            <option value="0">Камінь</option>
            <option value="1">Ножниці</option>
            <option value="2">Папір</option>
            <option value="3">Тестовий режим</option>        
        </select>
        <input type="submit" name="play" value="Грати">
        <button type="button" onclick="window.location.href='login.php'">Вийти</button>
        <a href="login.php">Вийти</a>
    </form>

    <?php
    // якщо є результат звичайної гри — виводимо
    if ($result != '') {
        echo "<p>$result</p>";
    }
    // виводимо тестовий вивід (якщо він є)
    echo $testOutput;
    ?>
</body>
</html>
