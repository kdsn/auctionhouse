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

<div class="row sm-space-top-bottom">
    <div class="col-md-8 col-md-offset-2">

        {% if msg %}
            <h4 class="text-center">{{ msg }}</h4>
        {% else %}
        <table class="table table-hover">
            <thead>
                <tr>
                    <th width="90px">Handling</th>
                    <th>Produkt</th>
                    <th width="120px">Pris</th>
                    <th width="65px">Antal</th>
                    <th width="120px">Ialt</th>
                </tr>
            </thead>
            {% for index, item in cart %}

            <tr>
                <td>
                    <form target="_self" method="post">
                        <input type="hidden" name="token" value="{{ token }}">
                        <button type="submit" name="add" value="{{ item.item_id }}" class="plain"><i class="fa fa-plus-square-o m-action" aria-hidden="true"></i></button>
                        <button type="submit" name="sub" value="{{ item.item_id }}" class="plain"><i class="fa fa-minus-square-o m-action" aria-hidden="true"></i></button>
                    </form>
                </td>
                <td>
                    <strong>
                        {{ item.item_name }}
                    </strong>
                </td>
                <td align="right">
                    {{ item.item_price|number_format(2, ',', '.') }} DKK
                </td>
                <td align="center">
                    {{ item.quantity }}
                </td>
                <td align="right">
                    {{ (item.item_price * item.quantity)|number_format(2, ',', '.') }} DKK
                </td>
            </tr>

            {% endfor %}
        </table>
        <table class="table">
            <tr>
                <td class="tabel-total" colspan="3" style="border-top: 0px;">

                </td>
                <td class="tabel-total" width="100px">
                    Ialt

                </td>
                <td class="tabel-total" width="120px" align="right">
                    {{ total|number_format(2, ',', '.') }} DKK
                </td>
            </tr>
            <tr>
                <td class="tabel-total" colspan="3" style="border-top: 0px;">

                </td>
                <td class="tabel-total" style="border-top: 0px;">
                    Fragt

                </td>
                <td class="tabel-total" style="border-top: 0px;" align="right">
                    125,00 DKK
                </td>
            </tr>
            <tr>
                <td class="tabel-total" colspan="3" style="border-top: 0px;">

                </td>
                <td class="tabel-total" style="border-top: 0px;">
                    Heraf moms

                </td>
                <td class="tabel-total" style="border-top: 0px;" align="right">
                    {{ ((total + 125) * 0.2)|number_format(2, ',', '.') }} DKK
                </td>
            </tr>
            <tr>
                <td class="tabel-total" colspan="3"style="border-top: 0px;">

                </td>
                <td class="tabel-total" style="border-bottom: double 4px #ddd">
                    Alt ialt

                </td>
                <td class="tabel-total" style="border-bottom: double 4px #ddd" align="right">
                    {{ (total + 125)|number_format(2, ',', '.') }} DKK
                </td>
            </tr>
        </table>
        <div class="text-center">
            <a href="/kassen" class="btn btn-success"> Gå til kassen</a>
        </div>

        {% endif %}
    </div>

</div>

{% endblock %}