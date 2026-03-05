<?php

class Controller {
    protected function render($view, $data = []) {
        // Extract data to make variables available in the view
        extract($data);
        
        // Start output buffering for the specific view
        ob_start();
        $viewFile = BASE_PATH . '/app/views/' . $view . '.php';
        if (file_exists($viewFile)) {
            require $viewFile;
        } else {
            echo "View '$view' not found.";
        }
        $content = ob_get_clean();
        
        // Require the main layout, passing the $content
        require BASE_PATH . '/app/views/layouts/main.php';
    }

    protected function json($data, $statusCode = 200) {
        http_response_code($statusCode);
        header('Content-Type: application/json');
        echo json_encode($data);
        exit;
    }
}
