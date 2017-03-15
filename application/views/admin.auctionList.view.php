{% extends "templets/default.view.php" %}

{% block title %} Auktioner {% endblock %}
{% block head %}
{{ parent() }}
<style>

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

    <div class="row">
        <button type="button" class="btn btn-default btn-lg pull-right">
            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Opret Auktion
        </button>
    </div>

    <div class="row">
        <table class="table">
            <thead>
            <tr>
                <th>Auktions Nr.</th>
                <th>Titel</th>
                <th>Sidste Bud</th>
                <th>Udløb</th>
                <th>Handling</th>
            </tr>
            </thead>
            <tbody>
            {% for auction in data %}
            <tr>
                <th scope="row">{{ auction.id }}</th>
                <td>{{ auction.title }}</td>
                <td>{{ auction.start_price }} DKK</td>
                <td>{{ auction.auction_end_date }}</td>
                <td>
                    <a href="/createAuction?auction_id={{ auction.id }}"<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                    <a href="/deleteAuction?auction_id={{ auction.id }}"<span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                </td>
            </tr>
            {% endfor %}
            </tbody>
        </table>
    </div>


</div>

<script type="application/javascript">
    $(document).ready(function () {
        $('.thumbnail-img').click(function (e) {
            window.location = "/auktion?auction_id=" + $(this).attr('data-id');
        })
    });
</script>


{% endblock %}