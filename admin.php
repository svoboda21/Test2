<?php
     if(!empty($_FILES)){
        header("Location: test.php");
        $name = basename($_FILES['filename']['name']);
        move_uploaded_file($_FILES['filename']['tmp_name'], "$name");
        $array=$_FILES['filename']['name'];
        file_put_contents("list.php",  $array." ",FILE_APPEND);
        if (file_exists($name)){
            echo "Файл $name загружен";
        } else {
            echo 'Файл не загружен';
        }
    }
    file_put_contents('temp.txt',null);
    file_put_contents('temp1.txt',null);
    file_put_contents('temp2.txt',null);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Тест</title>
</head>
<body>
<form enctype="multipart/form-data" action="admin.php" method="POST">
    <div>Загрузите тест</div>
    <div><input name="filename" type="file" /> </div>
    <br />
    <div><input type="submit" value="Загрузить"></div>
</form>
</body>
</html>