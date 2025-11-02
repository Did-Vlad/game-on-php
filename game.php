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
    $player = $_POST['choice'];
    if ($human == 3) { // // Tестова опція
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
        $computer = rand(0, 2);
        $r = check($computer, $player);
        $result = "Ваш вибір = {$names[$player]}. Комп'ютер вибрав = {$names[$computer]}. Результат = $r.";
    }
} ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!--ДОПИСАТИ ГРУ НА HTML-->
<h1>Ласкаво просимо до гри "Камінь-ножниці-бумага"</h1>
<p>Ласкаво просимо, <?php echo($_GET['name']);?></p>
    <?php echo $_GET['name']; ?>
</body>
</html>