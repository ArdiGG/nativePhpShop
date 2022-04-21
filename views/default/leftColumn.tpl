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
</div>

