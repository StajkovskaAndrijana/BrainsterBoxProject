<?php
    require 'games.php';

    if(isset($_GET['gameIndex']) && isset($games[$_GET['gameIndex']])) {
        $gameIndex = $_GET['gameIndex'];
        $game = $games[$gameIndex];
    } else {
        header("Location: index.php");
        die();
    }
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Brainster Box</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/bootstrap-3.3.7-dist/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css?<?php echo time(); ?>" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
</head>

<body>
    <div id="bg-up-game"></div>
    <nav class="navbar navbar-default navbar-fixed-top" id="nav-game">
        <div class="container-fluid">
            <div class="flex-nav">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 navbar-header sidenav">
                    <i class="fas fa-bars" data-toggle="modal" data-toggle="modal" data-target="#sidebar-left"> Мени</i>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 navbar-brand text-center">
                    <a href="#">
                        <img class='center-block' src="assets/img/logo.png">
                    </a>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 buttons">
                    <a class="hidden-sm hidden-xs" href="https://www.brainster.io/business">
                        <button class="btn first"><strong>Обуки за компании</strong></button>
                    </a>
                    <a class="hidden-sm hidden-xs" href="https://www.brainster.io/business">
                        <button class="btn second"><strong>Вработи наши студенти</strong></button>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="modal fade left" id="sidebar-left" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <img class="modal-title" src="assets/img/logo.png" width="40%">
                        <i class="fa fa-times close" aria-hidden="true" data-dismiss="modal"> Затвори</i>
                    </div>
                    <div class="modal-body">
                        <ul class="list-group">
                            <li>
                                <a href="registration.html" class="yellow"><strong>Регистрирај се</strong></a>
                            </li>
                            <li>
                                <a href="login.html" class="yellow"><strong>Најави се</strong></a>
                            </li>
                            <li>
                                <a href="https://brainster.co/about" class="black"><strong>За нас</strong></a>
                            </li>
                            <li>
                                <a href="https://www.facebook.com/pg/brainster.co/photos/"
                                    class="black"><strong>Галерија</strong></a>
                            </li>
                            <li>
                                <a href="https://brainster.co/contact" class="black"><strong>Контакт</strong></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row main">
            <div class="button-box text-center">
                <a class="hidden-lg hidden-md" href="https://www.brainster.io/business">
                    <button class="btn first"><strong>Обуки за компании</strong></button>
                </a>

                <a class="hidden-lg hidden-md" href="https://www.brainster.io/business">
                    <button class="btn second"><strong>Вработи наши студенти</strong></button>
                </a>
            </div>
        </div>

        <div class="row title">
            <div class="col-md-12">
                <h1><strong><?=$game['title']?></strong></h1>
            </div>
        </div>

        <div class="row grey">
            <div class="col-md-3 col-sm-12 col-xs-12">
                <div class="media">
                    <div class="media-left">
                        <i class="far fa-clock"></i>
                    </div>
                    <div class="media-body">
                        <h5><strong>Времетраење</strong></h5>
                    </div>
                    <p style='color: #989898; padding-left:31px'><?=$game['time']?></p>
                </div>
            </div>
            <div class="col-md-3 col-sm-12 col-xs-12">
                <div class="media">
                    <div class="media-left">
                        <i class="fas fa-user-friends"></i>
                    </div>
                    <div class="media-body">
                        <h5><strong>Големина на група</strong></h5>
                    </div>
                </div>
                <p style='color: #989898; padding-left:35px'><?=$game['group_size']?></p>
            </div>
            <div class="col-md-3 col-sm-12 col-xs-12">
                <div class="media">
                    <div class="media-left">
                        <i class="fas fa-landmark"></i>
                    </div>
                    <div class="media-body">
                        <h5><strong>Ниво на фасилитирање</strong></h5>
                    </div>
                </div>
                <p style='color: #989898; padding-left:31px'><?=$game['level']?></p>
            </div>
            <div class="col-md-3 col-sm-12 col-xs-12">
                <div class="media">
                    <div class="media-left">
                        <i class="fas fa-paint-roller"></i>
                    </div>
                    <div class="media-body">
                        <h5><strong>Материјали</strong></h5>
                    </div>
                </div>
                <p style='color: #989898; padding-left:31px'><?=$game['materials']?></p>
            </div>
        </div>

        <div class="row text">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <p><?=$game['text']?></p>
            </div>
        </div>

        <div class="row steps">
            <div class="col-lg-12 col-md-12 col=sm-12 col-xs-12">
                <?php
                    $steps = $game['steps'];
                    foreach($steps as $key => $value) {
                        echo "<p><b>$key</b></p>";
                        for($i = 0; $i < count($value); $i++) {
                            if(is_array($value[$i])) {
                                for ($row = $i; $row < count($value); $row++) {
                                    echo "<ul>";
                                    for ($col = 0; $col < count($value[$i]); $col++) {
                                        echo "<li>".$value[$row][$col]."</li>";
                                    }
                                    echo "</ul>";
                                }
                            } else {
                                echo "$value[$i] <br><br>";
                            }
                        }
                    }
                ?>
            </div>
        </div>

        <div class="row future-game">
            <h2 class="text-center text-uppercase white"><strong>Future-proof your organization</strong></h2>
            <h5 class="col-md-6 col-md-offset-3 text-center white">Find out how to unlock progress in your business.
                Understand your current state, identify opportunity areas and prepare to take charge of your
                organization's future.</h5>
        </div>

        <div class="row assessment">
            <a href="https://brainsterquiz.typeform.com/to/kC2I9E">
                <button class="btn center-block"><strong>Take the assessment</strong></button>
            </a>
        </div>
    </div>

    <div class="container-fluid footer">
        <div class="container">
            <div class="row flex-footer">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 contacts">
                    <a class="white about" href="https://brainster.co/about">About us</a>
                    <a class="white contact" href="https://brainster.co/contact">Contact</a>
                    <a class="white" href="https://www.facebook.com/pg/brainster.co/photos/">Galery</a>
                </div>
                <div class="text-center col-lg-4 col-md-4 col-sm-12 col-xs-12 footer-logo">
                    <a href="#">
                        <img src="assets/img/logo.png">
                    </a>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 social">
                    <a href="https://www.linkedin.com/school/brainster-co/">
                        <i class="fab fa-linkedin-in yellow"></i>
                    </a>
                    <a href="https://twitter.com/BrainsterCo">
                        <i class="fab fa-twitter yellow"></i>
                    </a>
                    <a href="https://www.facebook.com/brainster.co">
                        <i class="fab fa-facebook-f yellow"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div id="bg-down-game"></div>
</body>
<script src="assets/js/jquery-3.3.1.min.js"></script>
<script src="assets/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
<script src="assets/js/nav-slider.js"></script>

</html>