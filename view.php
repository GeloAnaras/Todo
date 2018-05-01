<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <form action="add" method="post">
            <input type="text" name="text" placeholder="type text here">
            <input type="submit">
        </form>
        <ul>
           <?php for($i=0;$i<count($data);$i++): ?>
           
            <li><?= $data[$i]["text"] ?>
                <a href="<?= PROJROOT ?>del?<?= $data[$i]["id"] ?>">X</a>
            </li>
            
            <?php endfor; ?>
        </ul>
    </div>
</body>
</html>