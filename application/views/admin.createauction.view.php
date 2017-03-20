{% extends "templets/default.view.php" %}

{% block title %} Profil {% endblock %}
{% block head %}
{{ parent() }}

{% endblock %}

{% block header %}
<h1 class="title">Opret/Redigér Auktion </h1>
<ol class="breadcrumb">
    <li><a href="#">Auktioner</a></li>
    <li class="active">Opret/Redigér Auktion</li>
</ol>
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

<div class="row sm-space-top">
    <form target="_self" method="post" enctype="multipart/form-data">
        <div class="col-md-6">

            <input type="hidden" name="auction_id" value="{{ auction_id }}">

            <div class="col-md-12 no-gutter-left">
                <label>Titel</label>
                <input type="text" name="title" class="form-control" value="{{ title }}">
            </div>
            <div class="col-md-6 no-gutter-left">
                <label>Start Pris</label>
                <input type="text" name="start_price" class="form-control" value="{{ start_price }}">
            </div>
            <div class="col-md-6">
                <label>Minimum Buds Tillæg</label>
                <input type="text" name="bid_jump" class="form-control" value="{{ bid_jump }}">
            </div>
            <div class="col-md-6 no-gutter-left">
                <label>Auktions afslutningsdag</label>
                <input id="dpicker" type="text" name="auction_end_date" placeholder="mm/dd/yy" class="form-control" value="{{ auction_end_date }}">
            </div>
            <div class="col-md-12 no-gutter-left">
                <label>Billed 1</label>
                <input type="file" name="pic1" class="form-control" value="{{ address }}">
            </div>
            <div class="col-md-12 no-gutter-left">
                <label>Billed 2</label>
                <input type="file" name="pic2" class="form-control"  value="{{ address }}">
            </div>
            <div class="col-md-12 no-gutter-left">
                <label>Billed 3</label>
                <input type="file" name="pic3"  class="form-control" value="{{ address }}">
            </div>
            <div class="col-md-12 no-gutter-left">
                <label>Billed 4</label>
                <input type="file" name="pic4" class="form-control"  value="{{ address }}">
            </div>


            <div class="sm-space-top-bottom col-md-12">
                <input  type="submit" name="update" class="btn btn-default pull-right " value="Udfør">
            </div>


        </div>

        <div class="col-md-6">
            <div class="col-md-12 no-gutter-left">
                <label>Beskrivelse</label>
                <textarea style="min-height: 150px" name="description" class="form-control" placeholder="Beskrivelse">{{ desc }}</textarea>
            </div>

            {% for image in images %}
            <div class="col-xs-3 col-md-3 no-gutter-left sm-space-top">
                <a id="deleteimage" data-id="{{ image.id }}" class="thumbnail">
                    <span style="font-size: 10px" class="pull-left">Klik For at Slette</span>
                    <span class=" pull-right glyphicon glyphicon-trash" style="margin-bottom: 5px" aria-hidden="true"></span>
                    <img data-id='' style="" class="thumbnail-img" src="{{ image.image }}" />
                </a>
            </div>
            {% endfor %}
        </div>
    </form>
</div>

<script>
    $( function() {
        $( "#dpicker" ).datepicker();
        $(".thumbnail").click(function(e){

            $.post( "/deleteAuctionImage", { image_id: $(this).attr('data-id') } );

            $(this).parent().fadeOut();

        });
    } );
</script>


{% endblock %}