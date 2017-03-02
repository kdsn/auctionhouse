{% extends "templets/default.view.php" %}

{% block title %} Login / Registrer {% endblock %}
{% block head %}
{{ parent() }}

{% endblock %}
{% block content %}

{% if errors %}
    {% for error in errors %}
    <div class="alert alert-danger alert-dismissable">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Fejl!</strong> {{ error }}
    </div>
    {% endfor %}
{% endif %}
<div class="row sm-space-top">
    <div class="col-md-6">

        <form target="_self" method="post">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title lead">Login</h3>
                </div>
                <div class="panel-body">
                    <label for="username">Brugernavn</label>
                    <input type="text" name="username" id="username" class="form-control" value="{{ name }}">
                    <label for="pass">Adgangskode</label>
                    <input type="password" name="pass" id="pass" class="form-control">
                    <input type="hidden" name="token" value="{{ token }}">
                    <br>
                    <input type="checkbox"> <small>Husk mig</small><br>
                    <small><a href="#">Glemt din kode?</a></small>
                </div>
                <div class="panel-footer text-center">
                    <input type="submit" name="login" class="btn btn-default" value="Log ind">
                </div>
            </div>
        </form>
    </div>

    <div class="col-md-6">

        <form target="_self" method="post">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title lead">Register</h3>
                </div>
                <div class="panel-body">
                    <label id="user">Brugernavn</label>
                    <input type="text" name="user" id="user" class="form-control" value="{{ username }}">
                    <label for="email">Email adresse</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ email }}">
                    <label for="Adgangskode">Adgangskode</label>
                    <input type="password" name="Adgangskode" id="Adgangskode" class="form-control">
                    <label for="re_pass">Gentag adgangskode</label>
                    <input type="password" name="re_pass" id="re_pass" class="form-control">
                    <input type="hidden" name="token" value="{{ token }}">
                </div>
                <div class="panel-footer text-center">
                    <input type="submit" name="register" class="btn btn-default" value="Opret ny bruger">
                </div>
            </div>
        </form>
    </div>
</div>

{% endblock %}