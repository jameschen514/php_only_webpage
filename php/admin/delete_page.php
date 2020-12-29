<?php 

$time = date("Y-m-d H:i:s");
// generate session id
$session_backup = sha1($time);
$page = null;
$checked = null;

if (isset($_GET['page']))
    $page = $_GET['page'];
else
    die ("Error: an error has occurred while visiting the page.");

if (isset($_SESSION['session'])) {
    $session_id = $_SESSION['session'];
    //echo $session_id;
} else {
    $session_id = $session_backup;
    //echo $session_id;
}

$db_host = 'localhost';
$db_user = 'root';
$db_password = 'root';
$db_db = 'personal';
$db_port = 8089;

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

$page_id = null;

if (isset($page) && isset($session_id))
{
    switch($page) {
        case "home":
            $page_id = 1; 
            // get data from cms_page, cms_article and cms_image
            $query = "select article_id, article_title, article_caption, image_path, image_name, image_width, image_height, image_alt from cms_article, cms_image where article_id = article_image_id = $page_id";
            if (!$mysqli->query($query)) 
            {
                echo "Table creation failed: (" . $mysqli->errno . ") " . $mysqli->error;
            }
            else {
                $result = $mysqli->query($query);
            }
            // populate form using data from previous step
            
            break;
        case "gallery":
            $page_id = 2;
            echo "This opens the edit gallery page";
            break;
        case "contactme":
            $page_id = 3;
            echo "This opens the edit contact me page";
            break;
        default:
            die("Error: an error has occurred while getting data for the page.");
    }
    // define all variables
    
    // set page data
    
    // load data from database into form
    
    // define form
    
    // save
}
else
{
    die("Error: page configuration is not available or required data unavailable.");
}

$mysqli->close();

?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<html lang="en">
<head>
<meta charset="utf-8" />
<title>Edit <?= $page ?></title>
<?php include 'include/head.php'; ?>
</head>
<body>
    <?php include 'include/header.php'; ?>
    <main>
        <section>
            <form action="delete_page.php" method="POST">
                <table>
                    <thead>
                        <tr>
                            <td></td>
                            <td>Image Name</td>
                            <td>Image Status</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            while ($row[$page_id] = $result->fetch_assoc()) {
                                if ($row[$page_id]['image_status'] == 1 || $_POST['image_status'] == 1) {
                                    $checked = 'checked';
                                } else {
                                    $checked = 'unchecked';
                                }
                                $index = $row[$page_id]['image_id'];
                                
                        ?>
                        <tr>
                            <td width="15"><?= $index ?></td>
                            <td width="20"><input type="checkbox" id="images_<?= $index ?>" name="images_<?= $index ?>" /></td>
                            <td width="80"><?= $row[$page_id]['image_name'] ?></td>
                        </tr>
                        <?php } ?>
                        <?php 
                            print_r($_POST['images']);
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td><input type="submit" value="Delete" /></td>
                        </tr>
                    </tfoot>
                </table>
            
            </form>
        </section>
    </main>
    <?php include 'include/footer.php'; ?>
</body>
</html>

