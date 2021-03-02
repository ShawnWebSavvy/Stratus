{foreach $conversations as $conversation}
    {* {if $conversation['group_recipients'] == 'show'}
        {include file='__feeds_conversation_group.tpl'}

    {else} *}
        {include file='__feeds_conversation_global.tpl'}
    {* {/if} *}
{/foreach}