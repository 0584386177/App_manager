<?php

class Controller{
    public function view($view, $data = []) {
        // Kết nối với view và truyền dữ liệu
        extract($data);
        require_once "app/views/{$view}.php";
    }

    public function model($model) {
        // Tạo đối tượng model và trả về
        require_once "app/models/{$model}.php";
        return new $model();
    }
}