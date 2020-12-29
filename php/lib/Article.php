<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Article
 *
 * @author jchen
 */

class Article {
    
    public $title;
    public $caption;
    
    // Methods
    function set_title($title) {
      $this->title = $title;
    }
    function get_title() {
      return $this->title;
    }
    function set_caption($caption) {
      $this-> caption = $caption;
    }
    function get_caption() {
      return $this->caption;
    }
    
    function get_article_images($page, $article) {
        
        $db_host = 'localhost';
        $db_user = 'root';
        $db_password = 'root';
        $db_db = 'personal';
        $db_port = 8089;

        // open a connection
        $mysqli = new mysqli(
          $db_host,
          $db_user,
          $db_password,
          $db_db
        );

        if ($mysqli->connect_error) {
          echo 'Errno: '.$mysqli->connect_errno;
          echo '<br>';
          echo 'Error: '.$mysqli->connect_error;
          exit();
        }

        $result = null;
        
        $page = $_GET['page'];
        
        /*
        if (empty($article)) {
            $article = 1;
            $query = "select article_id, article_title, article_caption, image_id, image_path, image_name, image_width, image_height, image_alt, image_status from cms_article, cms_image where article_id = '$page' && article_image_id = '$article'";
        } else {
            $query = "select article_id, article_title, article_caption, image_id, image_path, image_name, image_width, image_height, image_alt, image_status from cms_article, cms_image where article_id = '$page'";
        }
        */
        $query = "select * from cms_images";
        //$query = "select * from cms_page, cms_article, cms_image where page_id = '$page' && article_id = '$page' && article_image_id = '$page'";
        //$query = "call getArticles('$page')";
        
        // execute the statement
        // get the result
        // consolidate data into an object
        
        if (!$mysqli->query($query)) 
        {
            echo "Error: an error occurred while loading information of the page";
            //echo "Get data failed: (" . $mysqli->errno . ") " . $mysqli->error;
        }
        else {
            $result = $mysqli->query($query);
        }
        
        // close connection
        $mysqli->close();
        
        return $result;
    }
}

