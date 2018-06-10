<?php
namespace App;

use Aura\SqlQuery\QueryFactory;
use League\Plates\Engine;
use PDO;

class HomeController
{
    private $view;
    private $queryFactory;
    private $pdo;

    public function __construct(Engine $view, QueryFactory $queryFactory, PDO $pdo)
    {
        $this->view = $view;
        $this->queryFactory = $queryFactory;
        $this->pdo = $pdo;
    }

    public function index()
    {
        $select = $this->queryFactory->newSelect();
        $select->cols(["*"])
            ->from('notes');

        $sth = $this->pdo->prepare($select->getStatement());
        $sth->execute($select->getBindValues());
        $notes = $sth->fetchAll(PDO::FETCH_ASSOC);

        echo $this->view->render('notes', ['notes' => $notes]);
    }


    public function show($id)
    {
        $select = $this->queryFactory->newSelect();
        $select->cols(["*"])
            ->from('notes')
            ->where('id=:id')
            ->bindValues(['id' => $id]);

        $sth = $this->pdo->prepare($select->getStatement());
        $sth->execute($select->getBindValues());
        $note = $sth->fetch(PDO::FETCH_ASSOC);

        echo $this->view->render('show', ['note' => $note]);
    }

    public function edit($id)
    {
        $select = $this->queryFactory->newSelect();
        $select->cols(["*"])
            ->from('notes')
            ->where('id=:id')
            ->bindValues(['id' => $id]);

        $sth = $this->pdo->prepare($select->getStatement());
        $sth->execute($select->getBindValues());
        $note = $sth->fetch(PDO::FETCH_ASSOC);

        echo $this->view->render('edit', ['note' => $note]);
    }

    public function create()
    {
        echo $this->view->render('create');
    }

    public function store()
    {
        $insert = $this->queryFactory->newInsert();

        $insert->into('notes')
            ->cols([
                'title' => $_POST['title'],
                'content' => $_POST['content']
            ]);

        $sth = $this->pdo->prepare($insert->getStatement());
        $sth->execute($insert->getBindValues());

        header("Location: /notes");
    }

    public function update($id)
    {
        $update = $this->queryFactory->newUpdate();

        $update->table('notes')
            ->cols([
                'id' => $id,
                'title' => $_POST['title'],
                'content' => $_POST['content']
            ])
            ->where('id = :id');
        $sth = $this->pdo->prepare($update->getStatement());
        $sth->execute($update->getBindValues());

        header("Location: /notes");
    }

    public function delete($id)
    {
        $delete = $this->queryFactory->newDelete();

        $delete
            ->from('notes')
            ->where('id = :id')
            ->bindValue('id', $id);
        $sth = $this->pdo->prepare($delete->getStatement());
        $sth->execute($delete->getBindValues());

        header("Location: /notes");
    }

}