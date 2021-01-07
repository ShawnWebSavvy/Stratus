<div class="js_scroller">
    <ul>
        {foreach $results as $result }

        
            {if $result['type'] == "user"}
                {include file='global-profile/global-profile__feeds_user.tpl' _user=$result _tpl="list" _connection=$result['connection'] _search=true}
            {/if}

            
        {/foreach}
    </ul>
</div>