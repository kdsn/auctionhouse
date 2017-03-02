{% extends "templets/default.view.php" %}

{% block title %} Kontakt {% endblock %}
{% block head %}
{{ parent() }}
{% endblock %}

{% block header %}
<h1 class="title">Kontakt </h1>
<ol class="breadcrumb">
    <li><a href="#">Forside</a></li>
    <li class="active">Kontakt</li>
</ol>
{% endblock %}

{% block content %}
<div class="row sm-space-top">
    <div class="col-md-6">
        <div id="googleMap" style="margin-top:20px;width:100%;height:360px;background-color: lightgray;"></div>

        <script>
            function myMap() {
                var mapProp= {
                    center:new google.maps.LatLng(51.508742,-0.120850),
                    zoom:16,
                };
                var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
            }
        </script>

        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB_lVSw_8k2nZt4nYrVEE2trUuvsmKxolg=myMap"></script>
    </div>

    <div class="col-md-6">

        <address>
            <h1>AuctionHouse ApS</h1>
            <p class="lead">
                Engade 123 <br />
                1234 Bynavn<br />
            </p>

            <p class="lead">
                <span class="lead-text">Email: </span><a href="mailto:#">info@auctionhouse.dk</a><br />
                <span class="lead-text">Telefon: </span> 70 12 34 56
            </p>
        </address>

        <div class="col-md-6 no-gutter-left">
            <h3>Telefon tid</h3>
            <p class="lead lead-smaller">
                <span class="lead-text">Mandag - Fredag: </span> 09:00 - 16:00<br />
                <span class="lead-text">Lørdag: </span> Lukket<br />
                <span class="lead-text">Søndag: </span> Lukket<br />
            </p>
        </div>

        <div class="col-md-6">
            <h3>Show room</h3>
            <p class="lead lead-smaller">
                <span class="lead-text">Mandag - Fredag: </span> 09:00 - 19:00<br />
                <span class="lead-text">Lørdag: </span> 10:00  - 15:00<br />
                <span class="lead-text">Søndag: </span> Lukket<br />
            </p>
        </div>
    </div>
</div>

<div class="row sm-space">
    <div class="col-md-6">
        <input type="text" name="username" id="username" class="form-control" value="{{ name }}" placeholder="Navn">
    </div>
    <div class="col-md-6">
        <input type="text" name="username" id="username" class="form-control" value="{{ name }}" placeholder="Email">
    </div>
    <div class="col-md-12 sm-space-top text-right">
        <textarea class="form-control" placeholder="Besked" rows="8"></textarea>
        <input type="submit" class="btn btn-primary sm-space-top">

    </div>
</div>

{% endblock %}