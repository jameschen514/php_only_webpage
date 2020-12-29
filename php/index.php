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

$page = $_GET['page'];

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
            <div class="main-stage">
                <div class="main-stage-image">
                    <img src="static/images/IMG_0170.jpg" width="100%" height="auto" alt="Main Image" />
                </div>
                <div class="main-stage-btnradio">
                    <ul>
                        <li><a href=""></a></li>
                        <li><a href=""></a></li>
                        <li><a href=""></a></li>
                        <li><a href=""></a></li>
                    </ul>
                </div>
            </div>
        </section>
        <section>
            <?php 
                // 480x320    
                while ($row = $result->fetch_assoc()) {
            ?>
            <article>
                <h2><?= $row['image_id'] ?></h2>
                <img src="<?= $row['image_path'] ?><?= $row['image_name'] ?>" width="320" height="280" alt="<?= $row['image_alt'] ?>" />
                <figure>
                    <figcaption>
                        <?= $row['image_caption'] ?>
                    </figcaption>
                </figure>
            </article>        
            <?php
                }
            ?>
        </section>
    </main>
    <?php include 'include/footer.php'; ?>
</body>
</html>

