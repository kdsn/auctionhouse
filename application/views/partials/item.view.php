<div class="thumbnail">
    {% if item.slug %}
        <a href="/produkter?p={{ item.slug }}"><img src={{ item.image }} alt=""></a>
        <div class="caption">
            <h4><a href="/produkter?p={{ item.slug }}">{{ item.title }}</a></h4>
            <p>
                {{ item.description|length > 75 ? item.description|slice(0, 75) ~ '...' : item.description }}
            </p>

            <p class="text-center price-tag sm-space">
                {{ item.price|number_format(2, ',', '.') }} DKK.
            </p>

            <a href="/produkter?p={{ item.slug }}" class="btn btn-default pull-right sm-side-padding">Info / Køb</a>
            <div class="clearfix"></div>
        </div>
    {% else %}
        <a href="/produkter?l={{ item.id }}"><img src={{ item.image }} alt=""></a>
        <div class="caption">
            <h4><a href="/produkter?l={{ item.id }}">{{ item.title }}</a></h4>
        </div>
    {% endif %}
</div>