<?php
if (!session_status()) {
    session_start();
}

require '../database/QueryBuilder.php';
require '../components/Auth.php';

$db = new QueryBuilder();

$auth = new Auth($db);
//$auth->register("john.doe@ya.ru", "123456");
if ($auth->login("john.doe@ya.ru", "123456")) {
    echo "ok";
} else {
    echo "There is no user with this email and password";
}
exit;