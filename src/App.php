<?php
namespace TodoApp;

class App {

    /**
     * @var todos
     * All todos of the app
     */
    protected $todos;

    /**
     * @var fakeDb string
     * 
     * URL for fake data
     */
    const FAKE_DB = "https://my-json-server.typicode.com/ethoreau/todo-app/todos";

    public function __construct() {
        $this->todos = [];
    }

    public function getAllTodos() {
        $jsonContent = file_get_contents(self::FAKE_DB);
        return json_decode($jsonContent, true);
    }
}