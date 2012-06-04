<?php

/**
 * A Form Element object
 * 
 * 
 * @package lightvc
 * @author Miguel Rojas
 * @since 2012-01-12
 * */
class Eng_Form_Element {

    protected $value;
    protected $name;
    protected $label;
    protected $validator;
    protected $filter;
    protected $error;
    protected $desc;
    protected $attribs;

    public function __construct($options = array()) {
        $this->name      = isset($options['name']) ? $options['name'] : 'Eng_form_element';
        $this->value     = isset($options['value']) ? $options['value'] : false;
        $this->label     = isset($options['label']) ? $options['label'] : $this->name;
        $this->desc      = isset($options['desc']) ? $options['desc'] : false;
        $this->validator = isset($options['validator']) ? $options['validator'] : false;
        $this->filter    = isset($options['filter']) ? $options['filter'] : false;
        $this->default   = isset($options['default']) ? $options['default'] : false;
        $this->attribs   = isset($options['attribs']) ? $options['attribs'] : false;
        $this->error     = false;
    }

    public function __toString() {
        return $this->error ? '<p class="form_error">' . $this->error . '</p>' : '';
    }

    public function getValue() {
        if ($this->value=='' && $this->default) {
            return $this->default;
        }

        if ($this->filter && method_exists($this->filter, 'doFilter')) {
            return $this->filter->doFilter($this->value);
        } else {
            return $this->value;
        }
    }
    
    public function setValue($value = false) {
        if (is_array($value)) {
            //bind
            if (isset($value[$this->name])) {
                $this->value = $value[$this->name];
            }
        } else {
            $this->value = $value;
        }
    }
    
    public function getName() {
        return $this->name;
    }
    
    public function setName($name) {
        $this->name = $name;
    }
    
    public function getLabel() {
        return $this->label;
    }
    
    public function setLabel($label) {
        $this->label = $label;
    }
    
    public function isValid() {
        if ($this->validator && method_exists($this->validator, 'isValid')) {
            $aux = $this->validator->isValid($this->value);
            if ($aux) {
                $this->error = false;
                return true;
            } else {
                $this->error = 'Elemento invalido';
                return false;
            }
        } else {
            return true;
        }
    }
}