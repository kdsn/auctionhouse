{% extends "templets/default.view.php" %}

{% block title %} Shop {% endblock %}
{% block head %}
{{ parent() }}
{% endblock %}

{% block header %}
<h1 class="title">Shop </h1>
<ol class="breadcrumb">
    <li><a href="#">Forside</a></li>
    <li class="active">Shop</li>
</ol>
{% endblock %}

{% block content %}
<h1>Index</h1>
<p class="important">
    Welcome to my awesome homepage.<br>
</p>
{% endblock %}