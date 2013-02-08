<?php 
$url = BASE_URL . $_GET['url'];
$content = '
<article>
    <img class="main" src="' . SERVER_URL . 'media/view/' . $this->post->media . '?s=915x300" />
    <h1>' . $this->post->title . '</h1>
    <p class="meta">Publicado el ' . $this->post->published_at . '</p>
    <section class="content">
        ' . $this->post->content . '
    </section>
</article>

<div id="social">
    <a href="https://twitter.com/share" class="twitter-share-button" data-lang="es">Twittear</a>
    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
    <iframe src="//www.facebook.com/plugins/like.php?href=' . $url . '&amp;send=false&amp;layout=button_count&amp;width=150&amp;show_faces=false&amp;font=arial&amp;colorscheme=light&amp;action=like&amp;height=21&amp;appId=173861706020705" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:150px; height:21px;" allowTransparency="true"></iframe>
</div>

<div id="comment">
    <h3>Ingresa tu comentario</h3>
    <div id="commentform">
        <input type="hidden" id="node_id" value="' .$this->post->id . '" class="comm_data" />
        <ul>
            <li><input type="text" id="user" placeholder="Nombre..." class="comm_data" /></li>
            <li><input type="text" id="mail" placeholder="E-mail..." class="comm_data" /></li>
            <li><textarea rows="6" id="content" placeholder="Comentario..." class="comm_data"></textarea></li>
            <li><input type="button" class="button" value="Enviar" onclick="sendComment()" /></li>
        </ul>
    </div>
</div>

<div id="comments">
    <h3>' . count($this->comments) . ' comentario' . (count($this->comments)!=1 ? 's' : ''). '</h3>';
if ($this->comments) {
    foreach($this->comments as $comment) {
        $content .= '
            <article>
                <img src="http://www.gravatar.com/avatar/' . md5(strtolower(trim($comment->mail))) . '?s=64&d=retro" />
                <p><strong>' . $comment->user . '</strong> Dijo hace ' . Html::reldate($comment->published_at). '</p>
                <p>'. $comment->content . '</p>
            </article>';
    }
}

$content .= '</div>
';

if (isset($_GET['ajax'])) {
    die($content);
}
?>


<!DOCTYPE html>
<html lang="en" dir="ltr" itemscope itemtype="http://schema.org/Article">
    <?php include('header.php') ?>

    <body>
        <div class="page inside">
            <header>
                <h1><a href="<?php echo BASE_URL ?>">Leprosystems</a></h1>
            </header>

            <section class="main">
                <?php echo $content; ?>
            </section>

            <?php include('footer.php') ?>
        </div>
    </body>
</html>
