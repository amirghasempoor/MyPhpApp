<?php 

$config = require('config.php');

$db = new Database($config['database']);

$heading = 'Notes';

$note = $db->query('select * from notes where id = :id', [
    'id' => $_GET['id']
    ])->findOrFail();

if (! $note) {
    abort(Response::NOT_FOUND);
}

if ($note['user_id'] !== 3) {
    abort(Response::FORBIDDEN);
}

require "views/note.view.php";