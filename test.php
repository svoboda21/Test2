<?php session_start() ?>
<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="UTF-8">
      <title>Тест</title>
  </head>
<body>
<?php
    $text = file_get_contents('list.php');
    If (!empty($text)){
        $string = explode(" ", $text);
        array_pop($string);
    } else {
        echo "Тесты не загружены"; die;
    }
?>
  <form name="n1" action="test.php" method="GET">
    <div>Доступные тесты:</div>
    <br>
        <?php foreach($string as $key=>$el){?>
          <div><?php echo "$el";?></div>
          <div><input type="radio" name="<?php echo "$key";?>" value="a" /> </div>
          <div><input type="submit" name="12" value="Начать"></div>
            <br>
<?php }
    for($i=0; $i<count($string);$i++){
            if (isset($_GET[$i])){
                $filenew1 = file_get_contents("$string[$i]");
                $filenew = json_decode($filenew1,true);
                file_put_contents('temp.txt', $filenew['decision']);
                file_put_contents('temp1.txt',$filenew['question']);
                file_put_contents('temp2.txt', $filenew['question1'] );
?></form>
      <form action="test.php" method="GET">
          <br>
          <fieldset>
              <legend><?php echo "$filenew[question]"; ?></legend>
              <label><input type="radio" name="q1" value="1"> <?php echo $filenew['answer'][1]; ?></label>
              <label><input type="radio" name="q1" value="2"> <?php echo $filenew['answer'][2]; ?></label>
              <label><input type="radio" name="q1" value="3"> <?php echo $filenew['answer'][3]; ?></label>
              <label><input type="radio" name="q1" value="4"> <?php echo $filenew['answer'][4]; ?></label>
          </fieldset>
          <br>
          <fieldset>
              <legend><?php echo "$filenew[question1]"; ?></legend>
              <label><input type="radio" name="q2" value="5"> <?php echo $filenew['answer1'][5]; ?></label>
              <label><input type="radio" name="q2" value="6"> <?php echo $filenew['answer1'][6]; ?></label>
              <label><input type="radio" name="q2" value="7"> <?php echo $filenew['answer1'][7]; ?></label>
              <label><input type="radio" name="q2" value="8"> <?php echo $filenew['answer1'][8]; ?></label>
          </fieldset>
          <br>
          <input type="submit" value="Отправить">
          <?php
              }
              };
              $temp = file_get_contents("temp.txt");
              $temp1 = file_get_contents("temp1.txt");
              $temp2 = file_get_contents("temp2.txt");
              $answer1=substr($temp, 0,1);
              $answer2=substr($temp, 1);
          ?>
      </form>
      <br>
      <?php if (!empty($_GET["q1"])&& $_GET["q1"]== $answer1) {
          echo "Ответ на вопрос: \"$temp1\" - Правильный!";
          $_SESSION['a']=1;
       //   file_put_contents('result.txt', 1);
           };
      ?>
      <br>
      <?php if (!empty($_GET["q1"])&& $_GET["q1"]!== $answer1){echo "Ответ на вопрос: \"$temp1\" -Не правильно!";
        //  file_put_contents('result.txt', 0);
          $_SESSION['a']=0;
      };?>
      <br>
      <?php if (!empty($_GET["q2"])&& $_GET["q2"]== $answer2){echo "Ответ на вопрос: \"$temp2\" - Правильный!";
       //   file_put_contents('result1.txt', 1);
          $_SESSION['b']=1;
      };?>
      <br>
      <?php if (!empty($_GET["q2"])&& $_GET["q2"]!== $answer2){echo "Ответ на вопрос: \"$temp2\" -Не правильно!";
        //  file_put_contents('result1.txt', 0);
          $_SESSION['b']=0;
      };?>
<form action="result.php" method="POST">
    <br>
    <p>Введите имя: <input name="name" type="text"></p>

    <p><input type='submit' value='Ввести'></p>
</form>
</body>


