<?php

class VisionController extends Controller {
    public function index() {
        $beers = Database::getBeers();
        $this->render('vision/index', [
            'beers' => $beers
        ]);
    }
}
