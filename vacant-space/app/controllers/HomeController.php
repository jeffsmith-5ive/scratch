<?php

class HomeController extends Controller {
    public function index() {
        $featuredBeers = array_slice(Database::getBeers(), 0, 3);

        $this->render('home/index', [
            'featuredBeers' => $featuredBeers
        ]);
    }
}
