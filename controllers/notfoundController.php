<?php
class notfoundController extends controller {

    public function index() {
        $dados = array();
        $this->loadTemplate('404', $dados);
    }

}