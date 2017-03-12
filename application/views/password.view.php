{% extends "templets/default.view.php" %}

{% block title %} Login / Registrer {% endblock %}
{% block head %}
{{ parent() }}

{% endblock %}
{% block content %}

{% if errors %}
{% for error in errors %}
<div class="alert alert-danger alert-dismissable sm-space-top">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Fejl!</strong> {{ error }}
</div>
{% endfor %}
{% endif %}
{% if error %}
<div class="alert alert-danger alert-dismissable sm-space-top">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Fejl!</strong> {{ error }}
</div>
{% endif %}

<div class="row sm-space-top">
    <div class="col-md-6 col-md-offset-3">

        <form target="_self" method="post">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title lead">{{ titel }}</h3>
                </div>
                <div class="panel-body">

                    {% if update == 'pass_change' %}
                    <label for="username">Nuværende adgangskode</label>
                    <input type="password" name="new_pass" id="new_pass" class="form-control">
                    <label for="username">Ny adgangskode</label>
                    <input type="password" name="new_pass" id="new_pass" class="form-control">
                    <label for="pass">Gentag ny adgangskode</label>
                    <input type="password" name="re_new_pass" id="re_new_pass" class="form-control">
                    {% endif %}

                    {% if update == 'mail_upd' %}
                    <label for="username">Email adresse</label>
                    <input type="email" name="email" id="new_pass" class="form-control">
                    {% endif %}

                    {% if update == 'recover' %}
                    <label for="new_pass">Ny adgangskode</label>
                    <input type="password" name="new_pass" id="new_pass" class="form-control">
                    <label for="re_new_pass">Gentag adgangskode</label>
                    <input type="password" name="re_new_pass" id="re_new_pass" class="form-control">
                    {% endif %}

                    <input type="hidden" name="token" value="{{ token }}">
                </div>
                <div class="panel-footer text-center">
                    <input type="submit" name="{{ update }}" class="btn btn-default" value="{{ submit }}">
                </div>
            </div>
        </form>
    </div>
</div>

{% endblock %}