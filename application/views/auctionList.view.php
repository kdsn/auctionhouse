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
    .thumbnail-img{
        cursor:pointer;
        width: 100%;
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
            <img data-id='{{auction.id}}' style="height:350px" class="thumbnail-img" src="{{ auction.image }}" alt="...">
            <div class="clearfix caption">
                <h3>{{ auction.title }}</h3>
                <p style="min-height: 80px;">{{ auction.description }}</p>
                <div>
                    <div class="pull-left well-custom well well-sm">
                        <span>Aktuelt Bud:</span>
                        <span class="pull-right">{{ auction.start_price }} DKK</span>
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

<script type="application/javascript">
    $(document).ready(function () {
        $('.thumbnail-img').click(function (e) {
            window.location = "/auktion?auction_id=" + $(this).attr('data-id');
        })
    });
</script>


{% endblock %}