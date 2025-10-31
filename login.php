<?php
if ( !isset($_POST['who']) || !isset($_POST['pass']) ) {
  $message = "Вкажіть дані для входу";
} else {
    $salt = 'XyZzy12*_';
    $_POST['pass'] = '1a52e17fa899cf40fb04cfc42e6352f1';
    $_POST['pass'] = hash('md5', 'XyZzy12*_'.$_POST['pass']);
    header("Location: game.php?name=".urlencode($_POST['who']));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Ласкаво просимо до гри "Камінь-ножниці-бумага"</h1>
<?php echo "<p style = 'color:red'>" . $message."</p>";?>
<h2>Вхід</h2>
  <form method = "POST">
    Ім'я <input type="text" name = "who"> <br>
    Пароль <input type="password" name = "pass"></br>
    <input type="submit" value ='Увійти'> <input type="reset">
  </form>    
</body>
</html>