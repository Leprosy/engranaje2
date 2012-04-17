<?php

/**
 * A Filter interface
 * 
 * 
 * @package lightvc
 * @author Miguel Rojas
 * @since 2012-01-12
 * */
class Lvc_Filter {
    
    protected $filter;

    public function __construct($type, $options = array()) {
        $classname = 'Lvc_Filter' . $type;
        $this->filter = new $classname($options);
    }

    public function doFilter($data) {
        return $this->filter->doFilter($data);
    }
}

/**
 * A Numeric Filter
 * 
 * 
 * @package lightvc
 * @author Miguel Rojas
 * @since 2012-01-12
 * */
class Lvc_FilterNum {
    public function doFilter($data) {
        return (int)($data);
    }
}