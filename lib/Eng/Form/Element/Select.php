<?php

/**
 * A Form Element object representing a select element
 * 
 * 
 * @package lightvc
 * @author Miguel Rojas
 * @since 2012-01-12
 * */
class Eng_Form_Element_Select extends Eng_Form_Element {
    protected $items;

    public function __construct($options = array()) {
        parent::__construct($options);
        
        $this->items = array();

        if (isset($options['items']) && is_array($options['items'])) {
            foreach ($options['items'] as $value => $rep) {
                $this->items[$value] = $rep;
            }
        }
    }
    
    public function __toString() {
        $html = sprintf('<p><label for="%s">%s</label> <select name="%s" id="%s" %s>', 
                $this->name,
                $this->label,
                $this->name, 
                $this->name,
                $this->attribs);

        foreach ($this->items as $value => $rep) {
            $html .= sprintf('<option %s value="%s">%s</option>',
                    $this->value == $value ? 'selected="true"' : '',
                    $value, 
                    $rep    
            );
        }
        $html .= '</select><small>'.$this->desc.'</small></p>';
        return parent::__toString() . $html;
    }
}
