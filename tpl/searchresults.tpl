<div class="datarow">
    Search time: {$result['searchInformation']['searchTime']}<br>
    No. results: {$result['searchInformation']['totalResults']}
</div>
<div>
    {foreach $result['items'] as $item}
        <div class="datarow">
            <div>{$item['htmlTitle']}</div>
            <div>{$item['htmlSnippet']}</div>
            <div><a href="{$item['link']}">{$item['displayLink']}</a></div>
            <div>{$item['fileFormat']}</div>
        </div>
    {/foreach}
</div>