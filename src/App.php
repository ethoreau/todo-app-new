<?php
namespace TodoApp;

class App {

    /**
     * @var todos
     * All todos of the app
     */
    protected $todos;

    public function __construct() {
        // get all todos from mock api
        $this->todos = $this->getAllTodos();
    }

    /**
     * Get all todos
     */
    public function getAllTodos() {
        return array_merge($this->getNewTodos(), $this->getDeletedTodos());
    }

    /**
     * @param id string
     * 
     * Get a todo by its id
     */
    public function getTodoById($searchId) {
        // $todo = FakeData::getTodoById($searchId);
        return isset($this->todos[$searchId]) ? $this->todos[$searchId] : false;
    }

    public function getUpdatedList() {
        return $this->todos = $this->getAllTodos();
    }

    /**
     * Get all new todos
     */
    private function getNewTodos() {
        $todos = FakeData::getData();

        $new = [];
        foreach ($todos as $todo) {
            if (!$todo['deleted']) {
                $new[] = $todo;
            }
        }
        return $new;
    }

    /**
     * Get all deleted todo
     */
    private function getDeletedTodos() {
        $todos = FakeData::getData();

        $deleted = [];
        foreach ($todos as $todo) {
            if ($todo['deleted']) {
                $deleted[] = $todo;
            }
        }
        return $deleted;
    }

    /**
     * Delete todo
     * @param $id
     */
    public function deleteTodo($id) {
        $resp = FakeData::updateTodoById($id, ['deleted' => true]);
        return (isset($resp) && !empty($resp)) ? json_decode($resp, true) : false;
    }

    /**
     * Get todos
     */
    public function getTodos() {
        return $this->todos;
    }
}
