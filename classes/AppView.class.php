<?php

class AppView extends Eng_View {

    public function requireCss($cssFile) {
        $this->controller->requireCss($cssFile);
    }

}