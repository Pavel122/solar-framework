<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo !isset($title) ? (!empty($this->title) ? $this->title : 'Default template') : $title; ?></title>

    <!-- Global stylesheet -->
    <link rel="stylesheet" href="/public/css/global.css">
    <!-- Bootstrap stylesheet -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

    <!-- Bootstrap and another js files -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</head>
<body>
<div class="wrapper">
    <!-- Header -->
    <header class="header">
        <nav class="navbar navbar-fixed-top navbar-inverse" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu">
                        <span class="sr-only">Навигация</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/"><?=$this->site['name']?></a>
                </div>

                <div class="collapse navbar-collapse" id="menu">
                    <ul class="nav navbar-nav">
                        <li><a href="/">Главная</a></li>
                        <li><a href="/posts/last">Последние посты</a></li>
                    </ul>
                    <form class="navbar-form navbar-left" role="search">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Поиск">
                        </div>
                        <button type="submit" class="btn btn-default">Искать</button>
                    </form>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="/get/vip" data-toggle="tooltip" data-placement="bottom" title="Первый VIP-статус беслатный">Получить VIP</a></li>
                        <li class="dropdown">
                            <a href="" class="dropdown-toggle" data-toggle="dropdown">Аккаунты <b class="caret"></b></a>
                            <ul class="dropdown-menu dropdown-inverse">
                                <li><a href="/users/registration">Регистрация</a></li>
                                <li><a href="/users/login">Войти</a></li>
                                <li class="divider"></li>
                                <li><a href="/users/verification">Верификация</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!-- Header -->

    <!-- Content-->
    <div class="jumbotron" style="background: transparent">
        <div class="container content">
            <?=!isset($ctx) ? require_once '../404.php' : $ctx ?>
        </div>
    </div>
    <!-- Content -->

    <!-- Footer -->
    <footer class="footer">
        <nav role="navigation" class="navbar">
            <div class="container">
                <div class="row">
                    <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                        <ul class="list-unstyled">
                            <li>GitHub</li>
                            <li><a href="/page/about">About us</a></li>
                            <li><a href="#">Blog</a></li>
                            <li><a href="/page/contact">Contact & support</a></li>
                            <li><a href="#">Enterprise</a></li>
                            <li><a href="#">Site status</a></li>
                        </ul>
                    </div>
                    <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                        <ul class="list-unstyled">
                            <li>Applications</li>
                            <li><a href="#">Product for Mac</a></li>
                            <li><a href="#">Product for Eclipse</a></li>
                            <li><a href="#">Product mobile apps</a></li>
                            <li><a href="#">Product for idiotic Windows</a></li>
                        </ul>
                    </div>
                    <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                        <ul class="list-unstyled">
                            <li>Services</li>
                            <li><a href="#">Web analytics</a></li>
                            <li><a href="#">Presentations</a></li>
                            <li><a href="#">Code snippets</a></li>
                            <li><a href="#">Job board</a></li>
                        </ul>
                    </div>
                    <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                        <ul class="list-unstyled">
                            <li>Documentation</li>
                            <li><a href="#">Product Help</a></li>
                            <li><a href="#">Developer API</a></li>
                            <li><a href="#">Product Markdown</a></li>
                            <li><a href="#">Product Pages</a></li>
                        </ul>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-xs-8">
                        <ul class="list-unstyled list-inline pull-left">
                            <li><a href="#">Terms of Service</a></li>
                            <li><a href="/page/contact">Contact Us</a></li>
                            <li><a href="#">Privacy</a></li>
                        </ul>
                    </div>
                    <div class="col-xs-4">
                        <p class="text-muted pull-right">© <?=$this->site['create_year']?> &ndash; <?=date('Y')?> &laquo;<?=$this->site['name']?>&raquo;. All rights reserved</p>
                    </div>
                </div>
            </div>
        </nav>
    </footer>
    <!-- Footer -->

    <!-- Modal -->
    <div id="error" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" data-dismiss="modal">x</button>
                    <h4 class="modal-title" id="error-title"></h4>
                </div>
                <div class="modal-body" id="error-body"></div>
                <div class="modal-footer">
                    <button class="btn btn-danger btn-md" data-dismiss="modal">Закрыть</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
</div>
</body>
</html>