<?php

function runmodel($request) {
    $data = $request['command']($request);
    return $data;
}

function create($request) {
    if ($_POST) {
        //Данные получены в POST, их нужно тщательно проверить,
        //здесь в примере они берутся без особой проверки (только на пустоту)
        //нужно написать и вызвать здесь функцию проверки полученных даныых
        $data['user'] = trim(htmlspecialchars($_POST['user'], ENT_QUOTES));
        $data['message'] = trim(htmlspecialchars($_POST['message'], ENT_QUOTES));
        if (empty($data['user']) || empty($data['message'])) {
            $data['error'] = 'Все поля должны быть заполнены';
            return $data;
        }
        if (!$mysqli = connect()) {
            $data['error'] = 'Не удалось подключиться к базе данных';
            return $data;
        }
        $data['user'] = mysqli_real_escape_string($mysqli, $data['user']);
        $data['message'] = mysqli_real_escape_string($mysqli, $data['message']);
        $sql = "INSERT INTO guestbook (user, message) VALUES ('{$data['user']}','{$data['message']}')";
        if ($result = mysqli_query($mysqli, $sql)) {
            //Данные добавлены, перезапрос 1 страницы, где они отобразятся
            header("Location: http://{$_SERVER['SERVER_NAME']}{$_SERVER['SCRIPT_NAME']}?model={$request['model']}&page=1");
            exit();
        } else {
            $data['error'] = 'Не удалось добавить данные';
        }
    } else {
        //данные по умолчанию для формы добавления будут пустыми 
        $data['user'] = '';
        $data['message'] = '';
    }
    return $data;
}

function read($request) {
    if (!$mysqli = connect()) {
        $data['error'] = 'Не удалось подключиться к базе данных';
        return $data;
    }
    $sql = 'SELECT COUNT(*) FROM guestbook';
    if (!($result = mysqli_query($mysqli, $sql))) {
        $data['error'] = 'Ошибка запроса количества сообщений';
        return $data;
    }
    $row = mysqli_fetch_row($result);
    $itemsCount = $row[0];
    mysqli_free_result($result);
    $pagesCount = ceil($itemsCount / ITEMSPERPAGE);
    if ($request['page'] > $pagesCount) {
        $data['error'] = 'Запрошенная Вами страница не найдена';
        return $data;
    }
    $firstRow = ($request['page'] - 1) * ITEMSPERPAGE;
    $sql = "SELECT id, user, message, messagetime FROM guestbook ORDER BY id DESC LIMIT $firstRow," . ITEMSPERPAGE;
    if (!($result = mysqli_query($mysqli, $sql))) {
        $data['error'] = 'Ошибка запроса сообщений';
        return $data;
    }
    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_close($mysqli);
    return $data;
}

function update($request) {
    if ($_POST) {
        //Данные получены в POST, их нужно тщательно проверить,
        //здесь в примере они берутся без особой проверки (только на пустоту)
        //нужно написать и вызвать здесь функцию проверки полученных даныых
        $data['user'] = trim(htmlspecialchars($_POST['user'], ENT_QUOTES));
        $data['message'] = trim(htmlspecialchars($_POST['message'], ENT_QUOTES));
        if (empty($data['user']) || empty($data['message'])) {
            $data['error'] = 'Все поля должны быть заполнены';
            return $data;
        }
        if (!$mysqli = connect()) {
            $data['error'] = 'Не удалось подключиться к базе данных';
            return $data;
        }
        $data['user'] = mysqli_real_escape_string($mysqli, $data['user']);
        $data['message'] = mysqli_real_escape_string($mysqli, $data['message']);
        $sql = "UPDATE guestbook SET user = '{$data['user']}', message = '{$data['message']}' WHERE id = '{$request['id']}'";

        if ($result = mysqli_query($mysqli, $sql)) {
            //Данные изменены, перезапрос текущей страницы, где они были
            header("Location: http://{$_SERVER['SERVER_NAME']}{$_SERVER['SCRIPT_NAME']}?model={$request['model']}&page={$request['page']}");
            exit();
        } else {
            $data['error'] = 'Не удалось добавить данные';
        }
    } else {
        if (!$mysqli = connect()) {
            $data['error'] = 'Не удалось подключиться к базе данных';
            return $data;
        }
        //данные для формы редактирования 

        $sql = "SELECT id, user, message, messagetime FROM guestbook WHERE id = '{$request['id']}'";

        if (!($result = mysqli_query($mysqli, $sql))) {
            $data['error'] = 'Ошибка запроса количества сообщений';
            return $data;
        }
        $data = mysqli_fetch_assoc($result);
    }
    return $data;
}

function delete($request) {
    if (!$mysqli = connect()) {
        $data['error'] = 'Не удалось подключиться к базе данных';
        return $data;
    }
    $sql = "DELETE FROM guestbook WHERE id = '{$request['id']}'";
    if ($result = mysqli_query($mysqli, $sql)) {
        //Данные удалены, перезапрос текущей страницы, где они были
        header("Location: http://{$_SERVER['SERVER_NAME']}{$_SERVER['SCRIPT_NAME']}?model={$request['model']}&page={$request['page']}");
        exit();
    } else {
        $data['error'] = 'Не удалось добавить данные';
    }
}

function connect() {
    if (!($mysqli = mysqli_connect(HOST, USER, PASSWORD, DATABASE)))
        return false;
    if (!mysqli_set_charset($mysqli, 'utf8'))
        return false;
    return $mysqli;
}

function pagination($request) {
    if (!$mysqli = connect()) {
        $data['error'] = 'Не удалось подключиться к базе данных';
        return $data;
    }
    $sql = 'SELECT COUNT(*) FROM guestbook';
    if (!($result = mysqli_query($mysqli, $sql))) {
        $data['error'] = 'Ошибка запроса количества сообщений';
        return $data;
    }
    $row = mysqli_fetch_row($result);
    $itemsCount = $row[0];
    mysqli_free_result($result);
    $pagesCount = ceil($itemsCount / ITEMSPERPAGE);
    if ($request['page'] > $pagesCount) {
        $data['error'] = 'Запрошенная Вами страница не найдена';
    }
    return $pagesCount;
}
