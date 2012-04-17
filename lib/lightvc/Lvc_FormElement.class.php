<?php

/**
 * A Form Element object
 * 
 * 
 * @package lightvc
 * @author Miguel Rojas
 * @since 2012-01-12
 * */
class Lvc_FormElement {

    protected $value;
    protected $name;
    protected $label;
    protected $validator;
    protected $filter;
    protected $error;
    protected $desc;
    protected $attribs;

    public function __construct($options = array()) {
        $this->name      = isset($options['name']) ? $options['name'] : 'lvc_form_element';
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


/**
 * A Form Element object representing an input text area box
 * 
 * 
 * @package lightvc
 * @author Miguel Rojas
 * @since 2012-01-12
 * */
class Lvc_FormElementTextArea extends Lvc_FormElement {
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

/**
 * A Form Element object representing an input text box
 * 
 * 
 * @package lightvc
 * @author Miguel Rojas
 * @since 2012-01-12
 * */
class Lvc_FormElementText extends Lvc_FormElement {
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

/**
 * A Form Element object representing a select element
 * 
 * 
 * @package lightvc
 * @author Miguel Rojas
 * @since 2012-01-12
 * */
class Lvc_FormElementSelect extends Lvc_FormElement {
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

/**
 * A Form Element object representing a hidden input
 * 
 * 
 * @package lightvc
 * @author Miguel Rojas
 * @since 2012-01-12
 * */
class Lvc_FormElementHidden extends Lvc_FormElement {
    public function __toString() {
        $html = sprintf('<input type="hidden" value="%s" name="%s" id="%s" />',
                $this->value,
                $this->name,
                $this->name);

        return parent::__toString() . $html;
    }
}


/**
 * A Form Element object representing a file upload input
 * 
 * 
 * @package lightvc
 * @author Miguel Rojas
 * @since 2012-01-12
 * */
class Lvc_FormElementFile extends Lvc_FormElement {
    protected $upload;

    public function __construct($options = array()) {
        parent::__construct($options);
        $this->upload = isset($options['upload']) ? $options['upload'] : '/tmp/';
    }

    public function __toString() {
        $html = sprintf('<p><label for="%s">%s</label> <input type="file" name="%s__filename" id="%s" /><input type="hidden" value="%s" name="%s"><small>%s</small></p>',
                $this->name,
                $this->label,
                $this->name,
                $this->name,
                $this->value,
                $this->name,
                $this->desc);
        
        return parent::__toString() . $html;
    }

    public function setValue($value = false) {
        //Bind
        if (is_array($value)) {
            if (isset($value[$this->name])) {
                $this->value = $value[$this->name];

                //there is a file. upload
                $file = $this->name . '__filename';

                if (isset($_FILES[$file]['name']) && $_FILES[$file]['name']!='') {
                    $target = $this->upload . basename($_FILES[$file]['name']);

                    /* Directory created */
                    if (!file_exists(dirname($target))) {
                        if (!mkdir(dirname($target))) {
                            throw new Exception('Error creating directory '. dirname($target));
                        }
                    }
                    if (!move_uploaded_file($_FILES[$file]['tmp_name'], $target)) {
                        throw new Exception('Error moving ' . $_FILES[$file]['tmp_name'] . ' to ' . $target);
                    }

                    $this->value = $_FILES[$file]['name'];
                } 
            }
        } else {
            $this->value = $value;
        }
    }
}