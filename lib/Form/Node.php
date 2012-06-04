<?php

class NodeForm extends Lvc_Form {
    public function __construct() {
        parent::__construct(
                array(
                    'name' => 'node_form',
                    'elements' => array(
                        new Lvc_FormElementHidden(array(
                            'name' => 'id'
                        )),
                        new Lvc_FormElementHidden(array(
                            'name' => 'user_id',
                            'validator' => new Lvc_Validator('Num')
                        )),
                        new Lvc_FormElementText(array(
                            'name' => 'slug',
                            'label' => 'slug',
                            'attribs' => 'size="32"',
                            'validator' => new Lvc_Validator('NotNull')
                        )),
                        new Lvc_FormElementText(array(
                            'name' => 'created_at',
                            'label' => 'created_at',
                            'attribs' => 'size="32"',
                            'validator' => new Lvc_Validator('NotNull')
                        )),
                        new Lvc_FormElementText(array(
                            'name' => 'status',
                            'label' => 'status',
                            'attribs' => 'size="4"',
                            'validator' => new Lvc_Validator('NotNull')
                        )),
                        new Lvc_FormElementText(array(
                            'name' => 'title',
                            'label' => 'content_title',
                            'attribs' => 'size="32"',
                            'validator' => new Lvc_Validator('NotNull')
                        )),
                        new Lvc_FormElementTextArea(array(
                            'name' => 'content',
                            'label' => 'content',
                            'attribs' => 'cols="60" rows="20"',
                            'validator' => new Lvc_Validator('NotNull')
                        )),
                        new Lvc_FormElementTextArea(array(
                            'name' => 'description',
                            'label' => 'description',
                            'attribs' => 'cols="60" rows="10"',
                            'validator' => new Lvc_Validator('NotNull')
                        ))
                    )
                ))
            ;
    }
}