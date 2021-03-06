
<!DOCTYPE html>
<html>
    <head>      
         <meta name="keywords" content="sokoban, solve, task, online, free, сокобан, решать, задачи, онлайн">
         <meta name="description" content="Сокобан решать и составлять задачи онлайн. База задач сокобан. Турниры сокобан.">
         <meta charset="utf-8">
         <meta name="viewport" content="width=device-width, initial-scale=1">
         <title>Sokoban</title>
         <link rel="stylesheet" type="text/css" href="css/index.css">
         <link rel="stylesheet" type="text/css" href="css/header.css">
         <link rel="stylesheet" type="text/css" href="css/footer.css">
         <link rel="icon" href="http://a0652986.xsph.ru/pics/favicon.png" type="image/png">
    </head>
    <body>
        <?php>
            require './modules/MySql.php';
            require './modules/User.php';
            require './modules/Content.php';
            
            DeleteOldSessions(60 * 30);
            CreateUserSession();
            
            
            $link = MySqlConnect();
            AddVisiting($link, "index.php");

            $enterHeaderWord = $_SESSION['login'];
            $enterHeaderWordRef = "profile.php";
            if ($enterHeaderWord == "") 
            {
                $enterHeaderWord = "войти";
                $enterHeaderWordRef = "registration.php";
            }
        ?>
        
        <header class="header">   
            <div class="headerBlock"><a class="headerWord" href="index.php">главная</a></div>
            <div class="headerBlock"><a class="headerWord" href="play.php">играть</a></div>
            <div class="headerBlock"><a class="headerWord" href="1">создать</a></div>
            <div class="headerBlock"><a class="headerWord" href="review.php">отзывы</a></div>
            <div class="headerBlock"><a class="headerWord" href=<?php echo $enterHeaderWordRef;?>><?php echo $enterHeaderWord?></a></div>
        </header>
        
        <p class = mainText>
            На этом сайте вы сможете решать головоломки сокобан онлайн! 
            Наша база задач сокобан очень велика, так что найдутся задачи любой сложности и на любой вкус.
            Чем больше задач вы решите - тем больше желтых квадратиков появится в вашем профиле :).
            Следите за новостями, чтобы не пропустить турниры. Желаем удачи!
        </p>
        
        <h1>Новости</h1>
        
        <?php
            PrintNews($link, 10, "ru");
        ?>
        
        <br>
        <!--<?php
            $onlineUsers = "Пользователей онлайн";
            echo "<br><span class=\"online\">" . $onlineUsers . ": " . OnlineUsers(180) . "</span><br>";
            //                                                          время последней активности
        ?>-->
        
        <footer class="footer">
            <div class="footer">По всем вопросам и пожеланиям обращаться по почте socoban1@yandex.ru</div>
        </footer>

    </body>
</html>
