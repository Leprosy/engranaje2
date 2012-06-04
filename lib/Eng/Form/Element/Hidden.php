<?php

/**
 * A Form Element object representing a hidden input
 * 
 * 
 * @package lightvc
 * @author Miguel Rojas
 * @since 2012-01-12
 * */
class Eng_Form_Element_Hidden extends Eng_Form_Element {
    public function __toString() {
        $html = sprintf('<input type="hidden" value="%s" name="%s" id="%s" />',
                $this->value,
                $this->name,
                $this->name);

        return parent::__toString() . $html;
    }
}