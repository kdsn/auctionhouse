{% extends "templets/admin.view.php" %}

{% block title %} Dashboard {% endblock %}
{% block head %}
{{ parent() }}

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.1.1/css/responsive.bootstrap.min.css" />

{% endblock %}
{% block content %}

<div class="row sm-space-top">

    <div class="col-md-12">

        <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>Ordre id</th>
                <th>ID</th>
                <th>Beløb</th>
                <th>Status</th>
                <th>Dato</th>
            </tr>
            </thead>
            <tbody>

            {% for index, order in orders %}

            <tr>
                <td>
                    {{ order.id }}
                </td>
                <td>
                    {{ order.customer_user_id }}
                </td>
                <td>
                    {{ order.total|number_format(2, ',', '') }}
                </td>
                <td>
                    {% if order.is_paid == 0 %}
                        Ej betalt
                    {% else %}
                        Betalt
                    {% endif %}
                </td>
                <td>
                    {{ order.created_at }}
                </td>
            </tr>

            {% endfor %}



            </tbody>
        </table>

    </div>
</div>

{% endblock %}


{% block script %}

<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js">
</script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js">
</script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.1.1/js/dataTables.responsive.min.js">
</script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.1.1/js/responsive.bootstrap.min.js">
</script>

{% endblock %}