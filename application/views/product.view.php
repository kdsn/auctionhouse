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

<div class="row sm-space-top-bottom">
    {% for index, product in product %}

    <div class="col-md-8">
        <h3>{{ product.title }}</h3>
        {% if lowstock %}
        <span class="label label-warning">Lav beholdning</span>
        {% endif %}
        {% if outofstock %}
        <span class="label label-danger">Udsolgt</span>
        {% endif %}

        <p class="lead lead-smaller">
            {{ product.description }}
        </p>


        {% if instock %}
            <form target="_self" method="post">
                <input type="hidden" name="pid" value="{{ product.id }}">
                <input type="hidden" name="token" value="{{ token }}">
                <input type="submit" class="btn btn-default btn-sm pull-right" value="Føj til kurv">
            </form>
        {% endif %}

    </div>
    <div class="col-md-4">


                    <div class="preview-pic tab-content">

                        <div class="tab-pane active" id="pic-1"><img src="{{ images[0].image }}" /></div>

                        {% for index, image in images %}

                            {% if not index == 0 %}

                                <div class="tab-pane" id="pic-{{ index +1 }}"><img src="{{ image.image }}" /></div>

                            {% endif %}

                        {% endfor %}


                    </div>
                    <ul class="preview-thumbnail nav nav-tabs">

                        <li class="active"><a data-target="#pic-1" data-toggle="tab"><img src="{{ images[0].image }}" /></a></li>

                        {% for index, image in images %}

                            {% if not index == 0 %}

                                <li><a data-target="#pic-{{ index +1 }}" data-toggle="tab"><img src={{ image.image }} /></a></li>

                            {% endif %}

                        {% endfor %}
                    </ul>


    </div>
    {% endfor %}

</div>

{% endblock %}