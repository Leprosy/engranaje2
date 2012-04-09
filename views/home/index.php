<?php
$this->setLayoutVar('pageTitle', 'Dashboard');
?>

<?php var_dump($post->getFields()); ?>
<hr />
<?php var_dump($post->getUser_Object()->getFields()); ?>

<?php echo $form ?>