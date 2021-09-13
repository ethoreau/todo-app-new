<?php 
namespace TodoApp;

class FakeData {

    /**
     * @var url
     * 
     * Fake data's url
     */
    const API_URL = "https://613f4a39e9d92a0017e175db.mockapi.io";

    /**
     * get all todos from mock api
     * @return array of all the todos
     */
    public static function getData($sortby = "createdDate", $order = "desc") {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, self::API_URL.'/todos?sortBy='.$sortby.'&order='.$order);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $data = curl_exec($ch);
        curl_close($ch);

        return json_decode($data, true);
    }

    /**
     * @param $data array of todo's data
     * @return $resp string when all's fine, false otherwise
     */
    public static function addTodo($data) {
        if (is_array($data) && !empty($data)) {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, self::API_URL.'/todos');
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $headers = array(
                "Content-Type: application/json",
            );
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

            $resp = curl_exec($ch);
            curl_close($ch);
        }
        return (isset($resp) && !empty($resp)) ? json_decode($resp, true) : false;
    }

    /**
     * @param $id todo's id to find
     * @return array of todo's data found, false otherwise
     */
    public static function getTodoById($id) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, self::API_URL.'/todos/'.$id);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $found = curl_exec($ch);
        curl_close($ch);

        return (isset($found)) ? json_decode($found, true) : false;
    }

    /**
     * @param $id todo's id
     * @param $data updated data
     * @return string with updated data
     */
    public static function updateTodoById($id, $data) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, self::API_URL.'/todos/'.$id);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $headers = array(
            "Content-Type: application/json",
            "Content-Length: " . strlen(json_encode($data))
        );
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        $resp = curl_exec($ch);
        curl_close($ch);

        return (!empty($resp)) ? $resp : false;
    }
}