<div>
    <?php
    if (isset($data['error'])) {
        echo $data['error'];
    } else {
        foreach ($data as $item) {
            ?>
            <div>
                <p><?= $item['user'] ?> <?= $item['messagetime'] ?></p>
                <p><?= $item['message'] ?></p>
                <p><a href="index.php?model=<?= $request['model'] ?>&command=create&page=<?= $request['page'] ?>">Добавить сообщение</a> 
                    <a href="index.php?model=<?= $request['model'] ?>&command=update&page=<?= $request['page'] ?>&id=<?= $item['id'] ?>">Редактировать сообщение</a> 
                    <a href="index.php?model=<?= $request['model'] ?>&command=delete&page=<?= $request['page'] ?>&id=<?= $item['id'] ?>">Удалить сообщение</a></p>
            </div>
            <?php
        }

        for ($i = 1; $i <= pagination($request); $i++) {//ссылки для перехода по страницам
            if ($i == $request['page']) {
                echo $i, ' ';
            } else {
                echo "<a href=\"{$_SERVER['SCRIPT_NAME']}?model={$request['model']}&page=$i\">$i</a> ";
            }
        }
    }
    ?>
</div>