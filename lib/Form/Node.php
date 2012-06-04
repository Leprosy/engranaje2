<?php

class Form_Node extends Eng_Form {
    public function __construct() {
        parent::__construct(
                array(
                    'name' => 'node_form',
                    'elements' => array(
                        new Eng_Form_Element_Hidden(array(
                            'name' => 'id'
                        )),
                        new Eng_Form_Element_Hidden(array(
                            'name' => 'user_id',
                            'validator' => new Eng_Validator_Num()
                        )),
                        new Eng_Form_Element_Text(array(
                            'name' => 'slug',
                            'label' => 'slug',
                            'attribs' => 'size="32"',
                            'validator' => new Eng_Validator_NotNull()
                        )),
                        new Eng_Form_Element_Text(array(
                            'name' => 'created_at',
                            'label' => 'created_at',
                            'attribs' => 'size="32"',
                            'validator' => new Eng_Validator_NotNull()
                        )),
                        new Eng_Form_Element_Text(array(
                            'name' => 'status',
                            'label' => 'status',
                            'attribs' => 'size="4"',
                            'validator' => new Eng_Validator_NotNull()
                        )),
                        new Eng_Form_Element_Text(array(
                            'name' => 'title',
                            'desc' => 'Este es el título del contenido',
                            'label' => 'content_title',
                            'attribs' => 'size="32"',
                            'validator' => new Eng_Validator_NotNull()
                        )),
                        new Eng_Form_Element_TextArea(array(
                            'name' => 'content',
                            'label' => 'content',
                            'attribs' => 'cols="60" rows="20"',
                            'validator' => new Eng_Validator_NotNull()
                        )),
                        new Eng_Form_Element_TextArea(array(
                            'name' => 'description',
                            'label' => 'description',
                            'attribs' => 'cols="60" rows="10"',
                            'validator' => new Eng_Validator_NotNull()
                        ))
                    )
                ))
            ;
    }
}