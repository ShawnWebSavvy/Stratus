<div class="right-sidebar-inner-ant usersectionHeaderMobile">
    <div class="market-categories-section-right-side ">
        <!-- categories -->
        <div class="card">
            <div class="card-body with-nav">
                <ul class="side-nav">
                    <li {if $view=="" || $view=="search" }class="active" {/if}>
                        <span class="countNumber">#1</span>
                        <a href="{$system['system_url']}/blogs">
                            {__("All")}
                        </a>
                    </li>
                    {assign var=incrementVal value=1}
                    {foreach $all_blogs_categories as $category}
                    <li {if $view=="blogs" && $category_id==$category['category_id']}class="active" {/if}>

                        {assign var= incrementVal value=$incrementVal+1}

                        <span class="countNumber">#{$incrementVal}</span>
                        <a
                            href="{$system['system_url']}/blogs/category/{$category['category_id']}/{$category['category_url']}">
                            {__($category['category_name'])}
                        </a>

                    </li>
                    {/foreach}
                </ul>
            </div>
        </div>
        <!-- categories -->
    </div>
</div>