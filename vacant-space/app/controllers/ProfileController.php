<?php

class ProfileController extends Controller {
    public function index() {
        $user = $_SESSION['user'];
        $this->render('profile/index', [
            'user' => $user
        ]);
    }
}
