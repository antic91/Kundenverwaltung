<?php 

include("../logic/main.php");

    if(isset($_GET["login"])){
        echo $_SERVER['PHP_SELF'];
        session_destroy();
        header('Location: ./login.php');
    }
    
    if(isset($_GET["register"])){
        session_destroy();
        header('Location: ./register.php');
    }

    if(isset($_GET["logout"])){
        session_unset();
        session_destroy();
        echo"da";
        header('Location: ./index.php');
    }

?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style.css">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>
<body id="body" class="displayFlex">

<header class="header_wrapper displayFlex">

    <?php if(count($_SESSION)>0 && array_key_exists("logged",$_SESSION) && $_SESSION["logged"]):?>

        <form class="logged displayFlex" method="GET" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <h1>Welcome <?php echo $_SESSION["user"]?> </h1>
            <input class="btnsHeader" type="submit" name="logout" id="logout" value="Logout">
        </form>

    <?php else:?>   

        <form class="loggedNot displayFlex" method="GET" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <input class="btnsHeader" type="submit" name="login" id="login" value="Login">
            <input class="btnsHeader" type="submit" name="register" value="Register">
        </form>

    <?php endif?>   
</header>