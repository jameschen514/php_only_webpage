<?php
    // get session id from url redirected from login page
    
    $time = date("Y-m-d H:i:s");
    // generate session id
    $session_backup = sha1($time);

    if (!isset($_SESSION['session'])) {
        $_SESSION['session'] = $session_backup;
        $session_id = $_SESSION['session'];
    } else {
        die ("Error: an error occurred while trying to visit the page.");
    }
    
    $db_host = 'localhost';
    $db_user = 'root';
    $db_password = 'root';
    $db_db = 'personal';
    $db_port = 8089;
    
    /*
    $db_host = 'localhost';
    $db_user = 'php_user';
    $db_password = 'notsosecretpassword';
    $db_db = 'personal';
    $db_port = 3306;
    */

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

    echo 'Success: A proper connection to MySQL was made.';
    echo '<br>';
    echo 'Host information: '.$mysqli->host_info;
    echo '<br>';
    echo 'Protocol version: '.$mysqli->protocol_version;
    $result = null;
    if (!$mysqli->query("Select * from cms_page")) 
    {
        echo "Table creation failed: (" . $mysqli->errno . ") " . $mysqli->error;
    }
    else {
        $result = $mysqli->query("select page_id, page_name, page_status from cms_page");
    }
    $mysqli->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>HTML5 template</title>
<?php include '../include/head.php'; ?>
</head>
<body>
    <?php include '../include/header.php'; ?>
    <main>
        <section>
            <!-- Display list of pages -->  
            <!-- [ ] Page Name | Update | Delete -->
            <form action="admin.php" method="POST">
                <table width="700">
                    <thead>
                        <tr>
                            <td>Page ID</td>
                            <td>Page Name</td>
                            <td>Page Status</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $result->data_seek(0);
                            while ($row = $result->fetch_assoc()) {
                                if (isset($row['page_status'])) {
                                    $checked = 'checked';
                                } else {
                                    $checked = 'unchecked';
                                }
                        ?>
                        
                        
                        <tr>
                            <td><?= $row['page_id'] ?></td>
                            <td><a href="edit_page.php?page=<?= $row['page_name'] ?>"><?= ucfirst($row['page_name']) ?></td>
                            <td><input type="checkbox" name="status" checked="<?= $checked ?>" /></td>
                        </tr>
                        
                        <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3" align="center" class="submit"><input type="submit" name="submit" id="submit" value="Save" /></td>
                        </tr>
                    </tfoot>
                </table>
            </form>
        </section>
    </main>
    <?php include '../include/footer.php'; ?>
</body>
</html>

