<div class="modal-header">
    <h6 class="modal-title">{__("People Who Shared This")}</h6>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body sharing_people">
    {if $posts}
    <ul>
        {foreach $posts as $post}
        <li class="feeds-item">
            <div class="data-container">

                <div class="post-avatar">

                    {if $post['is_anonymous']}
                    {include file='__svg_icons.tpl' icon="spy" class="rounded-circle" width="40px" height="40px"}
                    {else}
                    <a class="post-avatar-picture" href="{$post['post_author_url']}"
                        style="background-image:url({$post['post_author_picture']});">
                    </a>

                    {if $post['post_author_online']}<i class="fa fa-circle online-dot"></i>{/if}
                    {/if}

                </div>
                <div class="post-meta">

                    <span class="js_user-popover" data-type="{$post['user_type']}" data-uid="{$post['user_id']}">
                        <a class="post-author" href="{$post['post_author_url']}">{$post['post_author_name']}</a>

                    </span>
                </div>

            </div>
        </li>
        {/foreach}
    </ul>

    {if count($posts) >= $system['max_results']}
    <!-- see-more -->
    <div class="alert alert-info see-more js_see-more" data-get="shares" data-id="{$id}">
        <span>{__("Load More")}</span>
        <div class="loader loader_small x-hidden"></div>
    </div>
    <!-- see-more -->
    {/if}

    {else}
    <p class="text-center text-muted">
        {__("No people shared this")}
    </p>
    {/if}

</div>