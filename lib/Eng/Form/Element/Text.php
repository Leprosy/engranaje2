<?php

/**
 * A Form Element object representing an input text box
 * 
 * 
 * @package lightvc
 * @author Miguel Rojas
 * @since 2012-01-12
 * */
class Eng_Form_Element_Text extends Eng_Form_Element {
    public function __toString() {
        $html = sprintf('<p><label for="%s">%s</label> <input %s type="text" value="%s" name="%s" id="%s" /><small>%s</small></p>',
                $this->name,
                $this->label,
                $this->attribs,
                $this->value,
                $this->name,
                $this->name,
                $this->desc);

        return parent::__toString() . $html;
    }
}