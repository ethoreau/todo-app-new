<?php
namespace TodoApp;

class Todo {

    /**
     * @var state
     */
    protected $state;

    /**
     * @var title
     */
    protected $title;

    /**
     * @var description
     */
    protected $description;

    /**
     * @var createdDate
     */
    protected $createdDate;

    /**
     * @var updateDate
     */
    protected $updateDate;

    /**
     * @var id
     */
    protected $id;

    public function __construct($state = "new", $title = "Todo Title", $descr = "", $createdDate = "", $id = "") {
        $this->setState($state);
        $this->setTitle($title);
        if (empty($createdDate)) {
            $this->createdDate = date('d-m-Y H:i:s');
        }
        else {
            $this->setCreatedDate($createdDate);
        }
        
        if (empty($id)) {
            $this->setId(time());
        }
        else {
            $this->setId(strtotime($id));
        }
    }

    /**
     * @param id string
     * 
     * Get a todo by its id
     */
    public static function getTodoById($searchId) {
        $jsonContent = file_get_contents(App::FAKE_DB);
        $data = json_decode($jsonContent, true);
      
        foreach ($data as $todo) {
            if ($todo['id'] === $searchId) {
                return $todo; exit;
            }
        }

        return false;
    }

    /**
     * @param $state ["new", "deleted"]
     * 
     * Change state of todo
     */
    public function setState($state = "") {
        if (!empty($state)) {
            $this->state = $state;
        }
        else {
            if ($this->state === "new") {
                $this->state = "deleted";
            }
            else {
                $this->state = "new";
            }
        }
        
    }

    /**
     * Get state of todo
     */
    public function getState() {
        return $this->state;
    }

    /**
     * @param $title string
     * 
     * Change title of todo
     */
    public function setTitle($title) {
        $this->title = $title;
    }

    /**
     * Get title of todo
     */
    public function getTitle() {
        return $this->title;
    }

    /**
     * Get description of todo
     */
    public function getDescription() {
        return $this->description;
    }

    /**
     * Set description of todo
     */
    public function setDescription($description) {
        $this->description = $description;
    }
    
    /**
     * Get created date of todo
     */
    public function getcreatedDate() {
        return $this->createdDate;
    }

    /**
     * Set created date of todo
     */
    public function setCreatedDate($createdDate) {
        $this->createdDate = $createdDate;
    }

    /**
     * Get update date of todo
     */
    public function getUpdateDate() {
        return $this->updateDate;
    }

    /**
     * Set id of todo
     */
    public function setId($id) {
        $this->id = $id;
    }

    /**
     * Get id of todo
     */
    public function getId($id) {
        return $this->id;
    }

}