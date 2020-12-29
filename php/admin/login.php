<?php

// get time
$time = date("Y-m-d H:i:s");
// generate session id
$session_id = sha1($time);
// login

// redirect to admin page with get method for sessionid

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
            <form action="login.php" method="POST">
                <div class="login-wrapper">
                    <div class="login label">
                        Username: <input type="text" id="login-username" name="login-username" /> 
                    </div>
                    <div class="login password">
                        Password: <input type="password" width="20" />
                    </div>
                    <div class="login submit">
                        <input type="submit" value="Submit" />
                    </div>
                </div>
            </form>
            
        </section>
    </main>
    <?php include '../include/footer.php'; ?>
</body>
</html>

