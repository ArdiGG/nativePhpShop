<h1>Корзина</h1>
{if !$products}
    В корзине пусто.
{else}
    <h2>Данные заказа</h2>
    <table>
        <tr>
            <td>
                №
            </td>
            <td>

            </td>
            <td>
                Наименование
            </td>
            <td>
                Количество
            </td>
            <td>
                Цена за штуку
            </td>
            <td>
                Цена
            </td>
            <td>
                Действие
            </td>
        </tr>
        {foreach $products as $product name="products"}
            <tr>
                <td>
                    {$smarty.foreach.products.iteration}
                </td>
                <td>
                    <a href="/product/{$product['id']}">
                        <img src="/images/products/{$product['image']}" width="50px" height="50px" alt="">
                    </a>
                </td>
                <td>
                    <a href="/product/{$product['id']}">
                        {$product['name']}
                    </a>
                </td>
                <td>
                    <input type="text" value="1" id="itemCnt_{$product['id']}" name="itemCnt_{$product['id']}" onchange="conversionPrice({$product['id']});">
                </td>
                <td>
                    <span id="itemPrice_{$product['id']}" value="{$product['price']}">
                        {$product['price']}
                    </span>
                </td>
                <td>
                    <span id="itemRealPrice_{$product['id']}">
                        {$product['price']}
                    </span>
                </td>
                <td>
                    <a id="removeCart_{$product['id']}" href=""
                       onclick="deleteFromCart({$product['id']}); return false;">Удалить</a>

                    <a id="addCart_{$product['id']}" class="hideme" href=""
                       onclick="addToCart({$product['id']}); return false;">Восстановить</a>

                </td>
            </tr>
        {/foreach}
    </table>
{/if}