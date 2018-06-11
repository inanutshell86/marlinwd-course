<?php
namespace App;

use League\Plates\Engine;
use PDO;

class HomeController
{
    private $view;
    private $queryFactory;
    private $pdo;

    public function __construct(Engine $view, Database $db)
    {
        $this->view = $view;
        $this->db = $db;
    }

    public function index()
    {
        $notes = $this->db->all('notes');

        echo $this->view->render('notes', ['notes' => $notes]);
    }


    public function show($id)
    {
        $note = $this->db->getItem('notes', $id);

        echo $this->view->render('show', ['note' => $note]);
    }

    public function edit($id)
    {
        $note = $this->db->editItem('notes', $id);

        echo $this->view->render('edit', ['note' => $note]);
    }

    public function create()
    {
        echo $this->view->render('create');
    }

    public function store()
    {
        $this->db->storeItem('notes', $_POST);

        header("Location: /notes");
    }

    public function update($id)
    {
        $this->db->updateItem('notes', $id, $_POST);

        header("Location: /notes");
    }

    public function delete($id)
    {
        $this->db->deleteItem('notes', $id);

        header("Location: /notes");
    }

}