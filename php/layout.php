<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

            <article>
                <h2><?= $row['article_title'] ?></h2>
                <img src="<?= $row['image_path'] ?><?= $row['image_name'] ?>" width="320" height="280" alt="<?= $row['image_alt'] ?>" />
                <figure>
                    <figcaption>
                        <?= $row['article_caption'] ?>
                    </figcaption>
                </figure>
            </article>  