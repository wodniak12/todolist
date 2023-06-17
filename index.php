<?php
declare(strict_types=1);

namespace App;

include_once('./src/View.php');
include_once('./src/utils/debug.php');

const DEFAULT_ACTION = 'list';

$action = $_GET['action'] ?? DEFAULT_ACTION;
$viewParams = [];

if ($action === 'create') {
    $page = 'create';
    $created = false;

    if (!empty($_POST)) {
        $title = $_POST['title'] ?? '';
        $description = $_POST['description'] ?? '';

        $viewParams = [
            'title' => $title,
            'description' => $description,
        ];

        $created = true;
        $viewParams['created'] = $created;
    }
} else {
    $page = 'list';
    $viewParams['resultList'] = 'Wyświetlamy listę notatek';
}

$view = new View();
$view->render($page, $viewParams);
