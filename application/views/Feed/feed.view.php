<?php
echo '<?xml version="1.0" encoding="utf-8"?>';
?>
<rss version="2.0"
     xmlns:dc="http://purl.org/dc/elements/1.1/"
     xmlns:sy="http://purl.org/rss/1.0/modules/syndication/"
     xmlns:admin="http://webns.net/mvcb/"
     xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
     xmlns:content="http://purl.org/rss/1.0/modules/content/">
    <channel>
        <title><?php echo $name; ?></title>
        <link>
        <?php echo $url; ?>
        </link>
        <description><?php echo $description; ?></description>
        <dc:language>en</dc:language>
        <dc:creator><?php echo $email; ?></dc:creator>
        <dc:rights>Copyright <?php echo gmdate("Y", time()); ?>
        </dc:rights>
        <admin:generatorAgent rdf:resource="<?php echo $url; ?>" />

        <?php foreach($articles as $article): ?>
            <item>
                <title><?php echo $article->getTitle(); ?></title>
                <link><?php echo anchor('news/show/' . $article->getId()); ?></link>
                <guid><?php echo $article->getId(); ?></guid>
                <description><?php echo $article->getBody(); ?></description>
                <pubDate><?php echo $article->getCreatedAt(); ?></pubDate>
            </item>
        <?php endforeach; ?>
    </channel>
</rss>