<?php
    $link = mysqli_connect(
        "127.0.0.1",
        "root",
        "root",
        "internetshop_course"
    );
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    if (!$link) print("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error() . "<br>");
    else print("Соединение установлено успешно<br>");
?>