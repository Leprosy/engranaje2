<?php

/**
 * A Form Element object representing an input text area box
 * 
 * 
 * @package lightvc
 * @author Miguel Rojas
 * @since 2012-01-12
 * */
class Eng_Form_Element_TextArea extends Eng_Form_Element {
    public function __toString() {
        $html = sprintf('<p><label for="%s">%s</label> <textarea %s name="%s" id="%s">%s</textarea><small>%s</small></p>',
                $this->name,
                $this->label,
                $this->attribs,
                $this->name,
                $this->name,
                $this->value,
                $this->desc);
        
        return parent::__toString() . $html;
    }
}