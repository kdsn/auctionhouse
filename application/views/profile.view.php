{% extends "templets/default.view.php" %}

{% block title %} Profil {% endblock %}
{% block head %}
{{ parent() }}

{% endblock %}
{% block content %}

<div class="row sm-space-top">
    <form target="_self" method="post">
        <div class="col-md-6">

            <h2 class="lead">Betaler</h2>
            <div class="col-md-6 no-gutter-left">
                <label>Fornavn</label>
                <input type="text" name="f_name" class="form-control" value="{{ f_name }}">
            </div>
            <div class="col-md-6">
                <label>Efternavn</label>
                <input type="text" name="l_name" class="form-control" value="{{ l_name }}">
            </div>
            <div class="col-md-12 no-gutter-left">
                <label>Adresse</label>
                <input type="text" name="address" class="form-control" value="{{ address }}">
            </div>
            <div class="col-md-3 no-gutter-left">
                <label>Post nr.</label>
                <input type="text" name="zip" class="form-control" value="{{ zip }}">
            </div>
            <div class="col-md-9">
                <label>By</label>
                <input type="text" name="city" class="form-control" value="{{ city }}">
            </div>
            <div class="col-md-6 no-gutter-left">
                <label>Email</label>
                <input type="text" name="email" class="form-control" value="{{ email }}">
            </div>
            <div class="col-md-6">
                <label>Telefon</label>
                <input type="text" name="phone" class="form-control" value="{{ phone }}">
            </div>

            <input type="hidden" name="token" value="{{ token }}">

            <div class="sm-space-top-bottom text-center col-md-12">
                <input type="submit" name="update" class="btn btn-default" value="Opdater">
            </div>
            <!--
            <div class="col-md-6 no-gutter-left">
                <label>To faktor-autentificering</label><br>
                <!-- Rounded switch -->
                <!--<label class="switch">
                    <input type="checkbox" checked>
                    <div class="slider round"></div>
                </label>


            </div>
            <div class="col-md-6">
                <label>Land</label>
                <select class="form-control">
                    <option SELECTED>Danmark</option>
                    <option></option>
                </select>
            </div>-->

        </div>

        <div class="col-md-6">
            <label class="lead sm-space-top-bottom">Anden leverings adresse?</label> &nbsp;
            <input type="checkbox" class="add-form-part">

                <div class="form-part col-md-12 no-gutter">
                    <div class="col-md-6 no-gutter-left">
                        <label>Fornavn</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label>Efternavn</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="col-md-12 no-gutter-left">
                        <label>Adresse</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="col-md-3 no-gutter-left">
                        <label>Post nr.</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="col-md-9">
                        <label>By</label>
                        <input type="text" class="form-control">
                    </div>

                    <div class="col-md-6 col-md-offset-6">
                        <label>Land</label>
                        <select class="form-control">
                            <option SELECTED>Danmark</option>
                            <option></option>
                        </select>
                    </div>
                </div>
            <div class="col-md-12 no-gutter-left">
                <textarea class="form-control" placeholder="Eventuel note om levering"></textarea>
            </div>

        </div>
    </form>
</div>

{% endblock %}