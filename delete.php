<?php
require 'database/QueryBuilder.php';

$db = new QueryBuilder();

$db->deleteNote($_GET['id']);

header("Location: /");