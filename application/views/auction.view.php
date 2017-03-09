{% extends "templets/default.view.php" %}

{% block title %} Auktioner {% endblock %}
{% block head %}
{{ parent() }}
<style>
    .row h5 {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        display: inline-block;
        max-width: 100%;
    }
    .well-custom{
        margin-bottom: 0px;
        width:75%;
    }
    .btn-circle {
        width: 40px;
        height: 40px;
        text-align: center;
        padding: 6px 0;
        font-size: 12px;
        line-height: 1.42;
        border-radius: 50%;
    }
</style>
{% endblock %}

{% block header %}
<h1 class="title">Auktioner </h1>
<ol class="breadcrumb">
    <li><a href="#">Forside</a></li>
    <li class="active">Auktioner</li>
</ol>
{% endblock %}

{% block content %}

<div style="margin-top: 15px" class="row">

    {% for auction in data %}
    <div class="col-sm-6 col-md-4">
        <div class="thumbnail">
            <img src="https://pixy.org/images/placeholder.png" alt="...">
            <div class="clearfix caption">
                <h3>{{ auction.title }}</h3>
                <p>dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                <div>
                    <div class="pull-left well-custom well well-sm">
                        <span>Aktuelt Bud:</span>
                        <span class="pull-right">14.000 DKK</span>
                    </div>
                    <button type="button" class="pull-right btn-circle btn btn-default btn-lg">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </button>
                </div>

            </div>
        </div>
    </div>
    {% endfor %}

</div>


{% endblock %}