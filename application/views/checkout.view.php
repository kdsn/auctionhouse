{% extends "templets/default.view.php" %}

{% block title %} Shop {% endblock %}
{% block head %}

{{ parent() }}

{% endblock %}

{% block header %}
<h1 class="title">Kurv </h1>
<ol class="breadcrumb">
    <li><a href="#">Forside</a></li>
    <li><a href="/shop">Shop</a></li>
    <li class="active">Kurv</li>
</ol>
{% endblock %}

{% block content %}
























<div class="row sm-space-top">
    {% if msg %}
    <h4 class="text-center">{{ msg }}</h4>
    {% else %}

    <form target="_self" method="post">
        <div class="col-md-6">

            <h2 class="lead">Betaler</h2>
            <div class="col-md-6 no-gutter-left">
                <label>Fornavn</label>
                <input type="text" name="f_name" class="form-control" value="{{ user_info.first_name }}">
            </div>
            <div class="col-md-6">
                <label>Efternavn</label>
                <input type="text" name="l_name" class="form-control" value="{{ user_info.last_name }}">
            </div>
            <div class="col-md-12 no-gutter-left">
                <label>Adresse</label>
                <input type="text" name="address" class="form-control" value="{{ user_info.address }}">
            </div>
            <div class="col-md-3 no-gutter-left">
                <label>Post nr.</label>
                <input type="text" name="zip" class="form-control" value="{{ user_info.zip }}">
            </div>
            <div class="col-md-9">
                <label>By</label>
                <input type="text" name="city" class="form-control" value="{{ user_info.city }}">
            </div>
            <div class="col-md-6 no-gutter-left">
                <label>Email</label>
                <input type="text" name="email" class="form-control" value="{{ user_info.email }}">
            </div>

            <input type="hidden" name="token" value="{{ token }}">


        </div>

        <div class="col-md-6">
            <label class="lead sm-space-top-bottom">Anden leverings adresse?</label> &nbsp;
            <input type="checkbox" class="add-form-part" name="alt-adr">

            <div class="form-part col-md-12 no-gutter">
                <div class="col-md-6 no-gutter-left">
                    <label>Fornavn</label>
                    <input name="alt_f_name" type="text" class="form-control">
                </div>
                <div class="col-md-6">
                    <label>Efternavn</label>
                    <input name="alt_l_name" type="text" class="form-control">
                </div>
                <div class="col-md-12 no-gutter-left">
                    <label>Adresse</label>
                    <input name="alt_address" type="text" class="form-control">
                </div>
                <div class="col-md-3 no-gutter-left">
                    <label>Post nr.</label>
                    <input name="alt_zip" type="text" class="form-control">
                </div>
                <div class="col-md-9">
                    <label>By</label>
                    <input name="alt_city" type="text" class="form-control">
                </div>

            </div>
        </div>

        <div class="col-md-12 text-center md-space">

                <p class="lead">
                    Ialt til betaling:  {{ (total + 125)|number_format(2, ',', '.') }} DKK
                </p>
                <input type="submit" class="btn btn-success" name="payment" value="Gå til betaling">

        </div>
    </form>

    {% endif %}
</div>


{% endblock %}