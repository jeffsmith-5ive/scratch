<?php

class ErdController extends Controller {
    public function index() {
        // Serve the ERD viewer directly
        $erdFile = BASE_PATH . '/public/erd.html';
        if (file_exists($erdFile)) {
            header('Content-Type: text/html; charset=utf-8');
            readfile($erdFile);
            exit;
        } else {
            echo "ERD view not found.";
        }
    }
}
