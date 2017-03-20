{% extends "templets/default.view.php" %}

{% block title %} Auktioner {% endblock %}
{% block head %}
{{ parent() }}
<style>
    .well-custom{
        margin-bottom: 0px;
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
    }
    #auction-container{
        margin-top: 15px;
        border:1px solid #ddd;
        border-radius: 4px;
        padding-top: 5px;
        margin-bottom: 15px;
    }
    #auction-container h3{

    }
    #auction-container .actual-bid{
        border:1px solid #ddd;
        padding: 5px;
    }
    #auction-container .actual-bid h4{
        text-align: center;
    }
    #auction-container .bid-desc{
        margin-top:5px;
        min-height: 240px;
    }
    .tab-content-custom{
        padding-top: 5px;
        padding-bottom: 5px;
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

<input id="price_jump_hidden" type="hidden" value="{{ price_jump }}">
<input id="auction_end_date_hidden" type="hidden" value="{{ auction_end_date }}">
<input id="minimum_bid_price_hidden" type="hidden" value="{{ minimum_bid_price }}">


<div id="auction-container" class="row">

    <div class="col-md-8">
        <div class="row">
            <div class="col-md-12">
                <h3 class="pull-left">{{ title }}</h3>
                <div class="actual-bid pull-right">
                    <h4>Aktuelt Bud</h4>
                    <h4>{{ start_price_formatted }} DKK</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="bid-desc col-md-12">
                {{ desc }}
             </div>
        </div>
        <div style="margin-top: 10px" class="row">
            <div class="col-md-9">
                <h4 class="pull-left">Auktions nr.:: {{ auction_id }}</h4>
            </div>
            <div class="col-md-3">
                <button type="button" class="pull-right btn-circle btn btn-default btn-lg">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </button>
                <button style="margin-right: 5px" type="button" class="pull-right btn-circle btn btn-default btn-lg">
                    <span class="glyphicon glyphicon-heart" aria-hidden="true"></span>
                </button>
            </div>
        </div>
        <div style="margin-top: 10px" class="row">
            <div class="col-md-9">
                <p id="countdown-text" class="pull-left">Tid tilbage af auktionen:</p>
            </div>
            <div class="col-md-3">
                <form target="_self" method="post">
                    <input type="hidden" name="auction_id" value="{{ auction_id }}">
                    <input type="hidden" name="action" value="bid">
                    {% if user %}
                    <div class="input-group">
                        <input id="bid" name="bid" type="text" class="form-control" value="{{ minimum_bid_price }}">
                        <span class="input-group-btn">
                        <button id="bidBtn" class="btn btn-default" type="submit">Byd!</button>

                        </span>
                    </div>
                    {% endif %}
                </form>

            </div>
        </div>
        <div style="margin-top: 10px" class="row">
            <div class="col-md-12">
                <div>
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#desc" aria-controls="desc" role="tab" data-toggle="tab">Beskrivelse</a></li>
                        <li role="presentation"><a href="#bidhistory" aria-controls="bidhistory" role="tab" data-toggle="tab">Bud Historik</a></li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content tab-content-custom">
                        <div role="tabpanel" class="tab-pane active" id="desc">{{ desc }}</div>
                        <div role="tabpanel" class="tab-pane" id="bidhistory">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blaned consequat, leo eget bibendum sodales, augue velit cursus nunc, </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <a class=" thumbnail">
                    <img id="bigImg" data-id='' style="" class="thumbnail-img" src="{{ primary_image }}" />
                </a>
            </div>
        </div>
        <div class="row">
            {% for image in images %}
            <div class="col-xs-3 col-md-3">
                <a class="thumbnail">
                    <img data-id='' style="" class="small-img-mouseover thumbnail-img" src="{{ image.image }}" />
                </a>
            </div>
            {% endfor %}
        </div>
    </div>

</div>

<script>

    CountDownTimer($('#auction_end_date_hidden').val(), 'countdown');

    function CountDownTimer(dt)
    {
        var end = new Date(dt);

        var _second = 1000;
        var _minute = _second * 60;
        var _hour = _minute * 60;
        var _day = _hour * 24;
        var timer;

        function showRemaining() {
            var now = new Date();
            var distance = end - now;
            if (distance < 0) {

                clearInterval(timer);
                $("#bidBtn").prop("disabled",true);
                $('#countdown-text').text("Tid tilbage af auktionen: UDLØBET!");

                return;
            }
            var days = Math.floor(distance / _day);
            var hours = Math.floor((distance % _day) / _hour);
            var minutes = Math.floor((distance % _hour) / _minute);
            var seconds = Math.floor((distance % _minute) / _second);

            $('#countdown-text').text("Tid tilbage af auktionen: " + days + " Dage " + hours + " Timer " + minutes + " Minutter " + seconds + " Sekunder ");
        }

        timer = setInterval(showRemaining, 1000);
    }

    $(document).ready(function(){
        $('#bidBtn').click(function (e) {
            var minPrice = $('#minimum_bid_price_hidden').val();
            var chosenPrice = $('#bid').val();
            if(chosenPrice < minPrice){
                e.preventDefault();
                alert("Dit Bud skal være minimum " + minPrice + " DKK");
            }

        });
        $('.small-img-mouseover').mouseenter(function (e) {

            $('#bigImg').attr('src', $(this).attr('src'));

        });
    });

</script>
<div id="countdown"></div>


{% endblock %}