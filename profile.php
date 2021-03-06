
<!DOCTYPE html>
<html>
    <head>      
         <meta name="keywords" content="sokoban, solve, task, online, free, сокобан, решать, задачи, онлайн">
         <meta name="description" content="Сокобан решать и составлять задачи онлайн. База задач сокобан. Турниры сокобан.">
         <meta charset="utf-8">
         <title>Sokoban</title>
         <link rel="stylesheet" type="text/css" href="css/profile.css">
         <link rel="stylesheet" type="text/css" href="css/header.css">
         <link rel="stylesheet" type="text/css" href="css/footer.css">
         <link rel="icon" href="http://a0652986.xsph.ru/pics/favicon.png" type="image/png">
    </head>
    <body>
        <?php>
            require './modules/MySql.php';
            require './modules/User.php';
            require './modules/Content.php';
            
            CreateUserSession();
            
            $link = MySqlConnect();
            AddVisiting($link, "profile.php");
            
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
        
        <h1><?php echo $_SESSION['login']; ?></h1>
        
        <?php 
            $tasks = GetTasks($link, 'difficulty');
            $solvedTasks = GetSolvedTasks($link, $_SESSION['login']);
            for ($i = 1; $i <= count($tasks); $i++)
            {
                $addedClass = "";
                if (in_array($tasks[$i]['ID'], $solvedTasks))
                    $addedClass = " solvedTask";
                if (($i == 1) || ($tasks[$i - 1]['difficulty'] != $tasks[$i]['difficulty']))
                    echo "<div><br><div class='difficulty'>Сложность: " . $tasks[$i]['difficulty'] . "</div><br>";
                $taskRef = "task.php?task=" . $tasks[$i]['pos'] . "&columnCount=" . $tasks[$i]['columnCount'] . "&rowCount=" . $tasks[$i]['rowCount'];
                echo "<div class='taskRefDiv" . $addedClass . "'><a class='taskRef' href=" . $taskRef . ">" . $tasks[$i]['ID'] . "</a></div>";
                if (($i == count($tasks)) || ($tasks[$i + 1]['difficulty'] != $tasks[$i]['difficulty']))
                echo "</div>";
            }
        ?>
		
		<form action="" class="exitForm" method="post">
			<input class="exitInput" name="exit" value="Выйти" type="submit">
        </form>
        
        <?php
        if (isset($_POST['exit']))
        {
            session_destroy();
            exit("<meta http-equiv='refresh' content='0; url= /index.php'>");
        }
        ?>
        
        <footer class="footer">
            <div class="footer">По всем вопросам и пожеланиям обращаться по почте socoban1@yandex.ru</div>
        </footer>

    </body>
</html>
