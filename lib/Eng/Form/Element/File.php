<?php

/**
 * A Form Element object representing a file upload input
 * 
 * 
 * @package lightvc
 * @author Miguel Rojas
 * @since 2012-01-12
 * */
class Eng_Form_Element_File extends Eng_Form_Element {
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