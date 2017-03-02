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

                {% if user %}
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user fa-icon" aria-hidden="true"></i> {{ user }} <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="/profil">Profil</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Gå til auktioner du følger</a></li>
                        <li><a href="#">Gå til ønskeseddel</a></li>
                        <li><a href="#">Ret adgangskoden</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="/logout"><i class="fa fa-sign-out fa-icon" aria-hidden="true"></i> Log ud</a></li>
                    </ul>
                </li>

                {% else %}
                <li><a href="/login"><i class="fa fa-sign-in fa-icon" aria-hidden="true"></i> Log ind / Register</a></li>
                {% endif %}


                <li><a href="/kurv"><i class="fa fa-shopping-cart fa-icon" aria-hidden="true"></i> Kurv</a></li>
                <li><a href="kassen"><i class="fa fa-rocket fa-icon" aria-hidden="true"></i> Gå til kassen</a></li>
                <!--
                <li><i class="fa fa-search" aria-hidden="true"></i> Søg</li>
                -->
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<nav class="main-nav">
    <div class="container">
        <img class="navbar-left sm-space-top" src="public/images/ah-blacknblue.png" height="85px">
        <ul class="nav nav-pills navbar-right">
            <li role="presentation"><a href="/">Forside</a></li>
            <li role="presentation"><a href="/auktioner">Auktioner</a></li>
            <li role="presentation"><a href="/shop">Shop</a></li>
            <li role="presentation"><a href="/kontakt">Kontakt</a></li>
        </ul>
    </div>
</nav>
<div class="title-area nav-color">
    <div class="container">
        {% block header %}{% endblock %}
    </div>
</div>
</header>





<!-- Begin page content -->
<div class="container">
    {% block content %}{% endblock %}
</div>

<footer class="footer">
    <div class="row bg-blue high-225">
        <div class="container">
            <div class="col-md-3">
                <h3 class="widget-title footer-title">Social networks</h3>
                <span class="fa-stack fa-lg">
                  <i class="fa fa-circle fa-stack-2x fa-inverse"></i>
                  <i class="fa fa-facebook fa-stack-1x fa-norm"></i>
                </span>
                <span class="fa-stack fa-lg">
                  <i class="fa fa-circle fa-stack-2x fa-inverse"></i>
                  <i class="fa fa-twitter fa-stack-1x fa-norm"></i>
                </span>
                <span class="fa-stack fa-lg">
                  <i class="fa fa-circle fa-stack-2x fa-inverse"></i>
                  <i class="fa fa-linkedin fa-stack-1x fa-norm"></i>
                </span>
                <span class="fa-stack fa-lg">
                  <i class="fa fa-circle fa-stack-2x fa-inverse"></i>
                  <i class="fa fa-skype fa-stack-1x fa-norm"></i>
                </span>

            </div>

            <div class="col-md-3">
                <h3 class="widget-title footer-title">Nyheds brev</h3>
                <form>
                    <input type="email" class="form-control" placeholder="Email adresse">
                    <div class="text-right">
                        <input type="submit" class="btn btn-primary sm-space-top" value="Tilmeld">
                    </div>
                </form>

            </div>

            <div class="col-md-3">
                <h3 class="widget-title footer-title">Relevante eksterne links</h3>
                <p class="lead lead-smaller">
                    <a href="http://trustpilot.dk" target="_blank" class="font-fff">TrustPilot</a><br />
                </p>
            </div>

            <div class="col-md-3">
                <h3 class="widget-title footer-title">Nyeste auktioner</h3>
                <div class="media">
                    <div class="media-left">
                        <a href="#">
                            <img alt="64x64" class="media-object" data-src="holder.js/64x64" style="width: 64px; height: 64px;" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iNjQiIGhlaWdodD0iNjQiIHZpZXdCb3g9IjAgMCA2NCA2NCIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+PCEtLQpTb3VyY2UgVVJMOiBob2xkZXIuanMvNjR4NjQKQ3JlYXRlZCB3aXRoIEhvbGRlci5qcyAyLjYuMC4KTGVhcm4gbW9yZSBhdCBodHRwOi8vaG9sZGVyanMuY29tCihjKSAyMDEyLTIwMTUgSXZhbiBNYWxvcGluc2t5IC0gaHR0cDovL2ltc2t5LmNvCi0tPjxkZWZzPjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+PCFbQ0RBVEFbI2hvbGRlcl8xNWE2ZGI0NDBmZSB0ZXh0IHsgZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjEwcHQgfSBdXT48L3N0eWxlPjwvZGVmcz48ZyBpZD0iaG9sZGVyXzE1YTZkYjQ0MGZlIj48cmVjdCB3aWR0aD0iNjQiIGhlaWdodD0iNjQiIGZpbGw9IiNFRUVFRUUiLz48Zz48dGV4dCB4PSIxMy40Njg3NSIgeT0iMzYuNSI+NjR4NjQ8L3RleHQ+PC9nPjwvZz48L3N2Zz4=" data-holder-rendered="true">
                        </a>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">Top aligned media</h4>
                        <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante.</p>
                        <button class="btn btn-primary">Gå til auktionen</button>
                    </div>
                </div>
    </div>
        </div>
    </div>

    <div class="row high-150">
        <div class="container">
            <div class="col-md-6">
                <h3 class="widget-title">Betingelser og FAQ</h3>
                <div class="col-md-6 no-gutter-left">
                    <p class="lead lead-smaller">
                        <a>Vores forretningsbetingelser</a><br />
                        <a>Local Shipping</a>
                    </p>
                </div>
                <div class="col-md-6">
                    <p class="lead lead-smaller">
                        <a>FAQ</a><br />
                        <a>Sitemap</a>
                    </p>
                </div>
            </div>
            <div class="col-md-6">
                <h3 class="widget-title">Betalings mulighedder</h3>
                <i class="fa fa-cc-amex fa-4" aria-hidden="true"></i>
                <i class="fa fa-cc-stripe fa-4" aria-hidden="true"></i>
                <i class="fa fa-cc-visa fa-4" aria-hidden="true"></i>
                <i class="fa fa-cc-paypal fa-4" aria-hidden="true"></i>
                <i class="fa fa-cc-mastercard fa-4" aria-hidden="true"></i>
                <i class="fa fa-cc-discover fa-4" aria-hidden="true"></i>
            </div>
        </div>
    </div>

    <div class="row high-50 bg-copy dropshadow">
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