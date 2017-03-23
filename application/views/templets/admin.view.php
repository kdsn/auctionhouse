<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {% block head %}
    <title>{% block title %}{% endblock %} - AuctionHouse</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <link rel="stylesheet" href="public/stylesheets/style.css" />
    <link rel="stylesheet" href="public/stylesheets/admin.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    {% endblock %}
</head>
<body>





<header>
    <nav class="navbar navbar-inverse nav-color" id="top-menu">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#top-nav" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="top-nav">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user fa-icon" aria-hidden="true"></i> {{ user }} <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Ret adgangskoden</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="/logout"><i class="fa fa-sign-out fa-icon" aria-hidden="true"></i> Log ud</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
    <nav class="main-nav">
        <div class="container">
            <img class="navbar-left sm-space-top" src="public/images/ah-blacknblue.png" height="85px">
            <ul class="nav nav-pills navbar-right">
                <li role="presentation"><a href="/admin">Dashboard</a></li>
                <li role="presentation"><a href="/">CMS</a></li>
                <li role="presentation"><a href="/ordre-liste">Shop</a></li>
                <li role="presentation"><a href="/">Auktioner</a></li>
                <li role="presentation"><a href="/">Brugere</a></li>
            </ul>
        </div>
    </nav>
    <hr>
</header>





<!-- Begin page content -->
<div class="container">
    {% block content %}{% endblock %}
</div>

<footer class="footer">
    <div class="bg-copy dropshadow">
        <div class="container text-center lh50">
            {% block footer %}
            <div class="col-md-6">
                Copyright &copy; {{ "now"|date('Y') }} - Alle rettigheder forebeholdes<a href="http://<?=$_SERVER['HTTP_HOST'];?>"><?=strtoupper($_SERVER['HTTP_HOST']);?></a>.
            </div>
            <div class="col-md-6 text-right">
                Leveret af <a>Online Presence</a> - Hostet hos <a>Hosting corp</a>
            </div>
            {% endblock %}
        </div>
    </div>
</footer>

<!-- Latest compiled and minified JavaScript -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
{% block script %}{% endblock %}
</body>
</html>