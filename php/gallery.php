<?php

/**
 * Description of Index
 *
 * @author jchen
 */

//$articles = new Article();

//$data = $articles->init();



require_once 'lib/Article.php';

$article = new Article();

$page = 1;

$result = $article -> get_article_images($page);

//$result -> data_seek(0);


?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>Home</title>
<?php include 'include/head.php'; ?>
</head>
<body>
    <?php include 'include/header.php'; ?>
    <main>
        <section>
            <?php 
                // 480x320    
                while ($row = $result->fetch_assoc()) {
            ?>
            <article>
                <h2><?= $row['article_title'] ?></h2>
                <img src="<?= $row['image_path'] ?><?= $row['image_name'] ?>" width="320" height="280" alt="<?= $row['image_alt'] ?>" />
                <figure>
                    <figcaption>
                        <?= $row['article_caption'] ?>
                    </figcaption>
                </figure>
            </article>        
            <?php
                }
            ?>
        </section>
    </main>
    <?php include 'include/footer.php'; ?>
    <script type="text/javascript" src="static/scripts/jquery.min.js"></script>
    <script type="text/javascript" src="static/scripts/main.js"></script>
</body>
</html>

