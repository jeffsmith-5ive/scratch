<?php

class ContactController extends Controller {
    public function index() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $submitted = false;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // In a real app, send email or save to DB here
            $submitted = true;
        }

        $data = [
            'submitted' => $submitted
        ];

        $this->render('contact/index', $data);
    }
}
