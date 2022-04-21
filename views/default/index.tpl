{foreach $products as $product name='products'}
    <div style="float: left; padding: 0px 30px 40px 0px">
        <a href="/product/{$product['id']}">
            <img src="/images/products/{$product['image']}" width="100px" height="100px" alt="">
        </a><br/>
        <a href="/product/{$product['id']}">{$product['name']}</a>
    </div>
    {if $smarty.foreach.products.iteration mod 3 == 0}
        <div style="clear: both"></div>
    {/if}
{/foreach}