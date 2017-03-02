{% extends "templets/default.view.php" %}

{% block title %} Forside {% endblock %}
{% block head %}
{{ parent() }}
{% endblock %}

{% block header %}
<h1 class="title">Forside </h1>
<ol class="breadcrumb">
    <li class="active">Forside</li>
</ol>
{% endblock %}

{% block content %}

<div class="md-space">
    <div class="container">


        <div id="carousel-fp" class="carousel slide" data-ride="carousel">
            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <div class="item active" style="height: 300px">
                    <img class="carousel-img" src="public/images/ej-c5t.png" alt="...">
                </div>

                <div class="item" style="height: 300px">
                    <img class="carousel-img" src="public/images/ej-142t.png" alt="...">
                </div>

                <div class="item" style="height: 300px">
                    <img class="carousel-img" src="public/images/ej-2100t.png" alt="...">
                </div>
            </div>
        </div>


    </div>
</div>


<div class="row md-space">
    <div class="col-md-4">
        <i class="fa fa-balance-scale fa-2" aria-hidden="true"></i>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur atque consequuntur debitis deleniti dolor doloremque error facere iure maiores nihil officia!
        </p>
    </div>

    <div class="col-md-4">
        <i class="fa fa-bullhorn fa-2" aria-hidden="true"></i>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur atque consequuntur debitis deleniti dolor doloremque error facere iure maiores nihil officia!
        </p>
    </div>

    <div class="col-md-4">
        <i class="fa fa-heart fa-2" aria-hidden="true"></i>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur atque consequuntur debitis deleniti dolor doloremque error facere iure maiores nihil officia!
        </p>
    </div>
</div>
{% endblock %}