<div id="leftColumn">
    <div id="leftMenu">
        <div class="menuCaption">Меню:</div>
        {foreach $categories as $cat}
            <a href="/category/{$cat['id']}">{$cat['name']}</a>
            <br/>
        {/foreach}
    </div>
</div>

