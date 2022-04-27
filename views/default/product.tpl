<h3>{$product['name']}</h3>

<img src="/images/products/{$product['image']}" width="575" height="500px" alt="">
Стоимость: {$product['price']}

<a id="addCart_{$product['id']}" {if $itemInCart}class="hideme"{/if} href=""
   onclick="addToCart({$product['id']}); return false;">Добавить в корзину</a>

<a id="removeCart_{$product['id']}" {if !$itemInCart}class="hideme"{/if} href=""
   onclick="deleteFromCart({$product['id']}); return false;">Удалить из корзины</a>

<p>Описание <br/>{$product['description']}</p>
