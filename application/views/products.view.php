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

<div class="row sm-space-top">
    {% for index, product in products %}

    <div class="col-md-4">
        {% include 'partials/item.view.php' with {item: product} %}
    </div>

    {% if (index + 1) % 3 == 0 %}
</div>
<div class="row">
    {% endif %}

    {% endfor %}
</div>

{% endblock %}