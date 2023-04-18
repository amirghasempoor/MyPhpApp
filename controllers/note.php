<?php 

$config = require('config.php');

$db = new Database($config['database']);

$heading = 'Notes';

$note = $db->query('select * from notes where id = :id', [
    'id' => $_GET['id']
    ])->findOrFail();

authorize($note['user_id'] === 3);

require "views/note.view.php";