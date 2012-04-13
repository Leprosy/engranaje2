<?php
$this->setLayoutVar('pageTitle', 'Contenido');
?>

<?php if (count($posts)) : ?>
    <?php 
        $keys = array_keys(current($posts)->getFields());
    ?>

    <table class="data">
        <tr>
            <?php foreach ($keys as $key) : ?>
            <th><?php echo $key ?></th>
            <?php endforeach; ?>
            <th></th>
        </tr>
        <?php foreach ($posts as $post) : ?>
        <tr>
            <?php foreach ($post->getFields() as $data) : ?>
            <td><?php echo $data ?></td>
            <?php endforeach; ?>
            <td>
                <a href="<?php echo Lvc::url('post/edit/' . $post->getId()) ?>">Edit</a> - 
                <a href="">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
<?php else: ?>
<p class="center">No hay contenido</p>
<?php endif; ?>

<a href="<?php echo Lvc::url('post/new') ?>">Crear nuevo contenido</a>