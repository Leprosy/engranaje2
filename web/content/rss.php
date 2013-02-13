<?php echo '<?xml version="1.0" encoding="UTF-8" ?>' ?>
<rss xmlns:content="http://purl.org/rss/1.0/modules/content/"
     xmlns:wfw="http://wellformedweb.org/CommentAPI/"
     xmlns:dc="http://purl.org/dc/elements/1.1/"
     xmlns:atom="http://www.w3.org/2005/Atom"
     xmlns:sy="http://purl.org/rss/1.0/modules/syndication/"
     xmlns:slash="http://purl.org/rss/1.0/modules/slash/" version="2.0">
    <channel>
        <title>Leprosystems</title>
        <description>Letras, números y dibujos por doquier. QUIQUID LATINE DICTUM SIT ALTUM VIDITUR</description>
        <link>http://blog.l3pro.com/</link>
        <lastBuildDate>Mon, 06 Sep 2010 00:01:00 +0000 </lastBuildDate>
        <language>es</language>
        <pubDate><?php echo date(DATE_RSS, strtotime('Y-m-d 00:00')) ?> </pubDate>
    	<sy:updatePeriod>hourly</sy:updatePeriod>
    	<sy:updateFrequency>1</sy:updateFrequency>
    	<generator>http://blog.l3pro.com/</generator>
    
        <?php foreach ($this->posts as $i => $post) : ?><item>
            <title><?php echo $post->title ?></title>
            <description><?php echo $post->description; ?></description>
            <link><?php echo Html::permalink($post) ?></link>
            <guid><?php echo $post->slug ?></guid>
            <author>Miguel Rojas</author>
            <?php foreach ($post->terms as $term) : ?>
            <category><?php echo $term->name ?></category>
            <?php endforeach; ?>
            <pubDate><?php echo date(DATE_RSS, strtotime($post->published_at)); ?></pubDate>
        </item>
        <?php endforeach; ?>

    </channel>
</rss>