{* Smarty *}
{extends 'base.tpl'}

{block "head"}
{literal}
    <script src="/js/home.js"></script>
    <link rel="stylesheet" type="text/css" href="/css/home.css">
{/literal}
{/block}

{block 'body'}
    <div>
        <div>
            <label for="kulcsszoinput">Kulcsszó</label>
            <input id="kulcsszoinput" type="text" name="kulcsszo">
        </div>
        <div>
            <button id="searchbutton">Keress</button>
        </div>
        <div id="resultDiv"></div>
    </div>
{/block}