<?php

/**
 * A Form rendering and validation object
 * 
 * 
 * @package lightvc
 * @author Miguel Rojas
 * @since 2012-01-12
 * */
class Eng_Form {

    protected $elements;
    protected $method;
    protected $action;
    protected $name;

    public function __construct($options = array()) {
        $this->name   = isset($options['name']) ? $options['name'] : 'Eng_form';
        $this->method = isset($options['method']) ? $options['method'] : 'post';
        $this->action = isset($options['action']) ? $options['action'] : '';

        if (isset($options['elements']) && is_array($options['elements'])) {
            foreach ($options['elements'] as $element) {
                $this->addElement($element);
            }
        }
    }

    public function setAction($action) {
        $this->action = $action;
    }
    
    public function getAction() {
        return $this->action;
    }
    
    public function setName($name) {
        $this->name = $name;
    }
    
    public function getName() {
        return $this->name;
    }

    public function setMethod($method) {
        $this->method = $method;
    }
    
    public function getMethod() {
        return $this->method;
    }
    
    public function addElement($element) {
        $this->elements[$element->getName()] = $element;
    }

    public function getElement($name) {
        return $this->elements[$name];
    }

    public function getElements() {
        return $this->elements;
    }

    public function setValue($name, $value) {
        if (isset($this->elements[$name])) {
            $this->elements[$name]->setValue($value);
        }
    }

    public function __toString() {
        $html = sprintf('<form action="%s" method="%s" name="%s" id="%s">', $this->action, $this->method, $this->name, $this->name
        );

        foreach ($this->elements as $element) {
            $html .= $element;
        }

        $html .= '<input class="submit" type="submit" /></form>';

        return $html;
    }

    public function bind($data = false) {
        if ($data) {
            foreach ($this->elements as $element) {
                $element->setValue($data);
            }
        }
    }

    public function isValid() {
        $aux = true;

        foreach ($this->elements as $element) {
            if (!$element->isValid()) {
                $aux = false;
            }
        }

        return $aux;
    }
    
    public function getObject() {
        $obj = new stdClass();

        foreach ($this->elements as $element) {
            $name = $element->getName();
            $obj->$name = $element->getValue();
        }
        
        return $obj;
    }

}