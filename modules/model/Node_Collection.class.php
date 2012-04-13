<?php

/**
* This is the starter class for Node_Collection_Generated.
 *
 * @see Node_Collection_Generated, CoughCollection
 **/
class Node_Collection extends Node_Collection_Generated {
    static function getList($options = null) {
        $page = isset($options['page']) ? $options['page'] : 1;

        $sql = 'SELECT * FROM ' . Node::getTableName() . 
                    ' LIMIT ' . ENG_PAGESIZE .
                    ' OFFSET ' . ENG_PAGESIZE * ($page - 1);

        $nodes = new Node_Collection();
        $nodes->loadBySql($sql);
        
        return $nodes;
    }
}