<?php
use PHPUnit\Framework\TestCase;
use TodoApp\FakeData;

class FakeDataTest extends TestCase {

    /**
     * Get todo by id
     */
    public function test_getTodoById() {
        // todo found
        $todoFound = FakeData::getTodoById(1);
        $this->assertNotEmpty($todoFound, "Todo found");

        // todo not found
        $todoNotFound = FakeData::getTodoById(-1);
        $this->assertFalse($todoNotFound, "Todo not found");
    }

    /**
     * Update a todo by its id
     */
    public function test_updateTodoById() {
        // todo updated
        $todoUpdated = FakeData::updateTodoById(1, ["title" => "New title"]);
        $this->assertNotEmpty($todoUpdated, "Todo updated");

        // todo not updated
        $todoNotUpdated = FakeData::updateTodoById(-1, ["title" => "New title"]);
        $this->assertFalse($todoNotUpdated, "Todo not updated");
    }

    /**
     * Add a todo
     */
    public function test_addTodo() {
        // add todo : ok
        $data = [
            "title" => "Todo Unit test",
            "description" => ""
        ];
        $todoOk = FakeData::addTodo($data);
        $this->assertNotEmpty($todoOk, "Todo added");

        // add todo : nok
        $data = [
            "description" => "Description todo unit test"
        ];
        $todoNok = FakeData::addTodo($data);
        $this->assertFalse($todoNok, "Todo not added");
    }

    /**
     * Get all todos
     */
    public function test_getData() {
        $todos = FakeData::getData();
        $this->assertNotEmpty($todos, "All todos found");
    }
}