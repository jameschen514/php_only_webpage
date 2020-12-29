<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of getArticle
 *
 * @author jchen
 */
require_once 'lib/Article.php';

header("Content-Type:application/json");

$data = null;

$article = new Article();

$page_id = $_GET['page'];

$result = $article -> get_article_images($page_id);

if (!empty($_GET['article'])) {
    $data = $_GET['article'];
} else {
    die("Error: an error has occurred while loading section of the page.");
}

$resultant = null;
$i = 0;

foreach ($result as $key => $value)
{
    $resultant[$key] = $value;
    $i++;
}

//$json = json_encode($resultant);

echo json_encode($resultant);

//print_r($resultant);

?>