<div id="leftColumn">
    <div id="leftMenu">
        <div class="menuCaption">Меню:</div>
        {foreach $categories as $cat}
            <a href="/category/{$cat['id']}">{$cat['name']}</a>
            <br/>
            {foreach $cat['childrens'] as $childCategory}
                --
                <a href="/category/{$childCategory['id']}">{$childCategory['name']}</a>
                <br/>
            {/foreach}
        {/foreach}
    </div>

    <div id="userBox" class="hideme">
        <a href="#" id="userLink"></a><br/>
        <a href="" onclick="logout();return false;">Выход</a>
    </div>

    <div id="loginBox">
        <div class="menuCaption showHidden" onclick="showRegisterBox()">Авторизация</div>
        <div id="registerBoxHidden">
            Email:<br/>
            <input type="text" id="email" name="email" value=""><br/>
            Пароль:
            <input type="password" id="password" name="password" value=""><br/>
            <input type="button" onclick="login();" class="button" value="Авторизоваться">
        </div>
    </div>

    <div id="registerBox">
        <div class="menuCaption showHidden" onclick="showRegisterBox()">Регистрация</div>
        <div id="registerBoxHidden">
            Email:<br/>
            <input type="text" id="email" name="email" value=""><br/>
            Пароль:
            <input type="password" id="pwd1" name="pwd1" value=""><br/>
            Повторить пароль:
            <input type="password" id="pwd2" name="pwd2" value=""><br/>
            <input type="button" onclick="registerNewUser();" class="button" value="Зарегистрироваться">
        </div>
    </div>

    <div class="menuCaption">Корзина</div>
    <a href="/cart" title="Перейти в корзину">В корзине</a>
    <span id="cartCntItems">
        {if $cartCntItems > 0}
            {$cartCntItems}
        {else}
            пусто
        {/if}
    </span>
</div>

