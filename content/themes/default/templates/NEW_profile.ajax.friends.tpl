                     {if $profile['friends_count'] > 0}
                     <div class="card" style="margin-bottom: 0px;">
                        <div class="card-header bg-transparent subHeadingGlobal">
                           <a href="{$system['system_url']}/{$profile['user_name']}/friends">{__("Friends")}</a>
                           <span>{$profile['friends_count']}</span>
                           {if $profile['mutual_friends_count'] && $profile['mutual_friends_count'] > 0}
                           <span class="text-underline" data-toggle="modal"
                              data-url="users/mutual_friends.php?uid={$profile['user_id']}">({$profile['mutual_friends_count']}
                           {__("mutual friends")})</span>
                           {/if}
                        </div>
                        <div class="card-body ptb10 plr10">
                           <div class="row no-gutters">
                              {foreach $profile['friends'] as $_friend}
                              <div class="col-3 col-sm-4 col-md-4 col-lg-3">
                                 <div class="circled-user-box safa">
                                    <a class="user-box" href="{$system['system_url']}/{$_friend['user_name']}">
                                       <img alt="{$_friend['user_firstname']} {$_friend['user_lastname']}"
                                          src="{$_friend['user_picture']}" />
                                       <div class="name"
                                          title="{$_friend['user_firstname']} {$_friend['user_lastname']}">
                                          {$_friend['user_firstname']} {$_friend['user_lastname']}
                                       </div>
                                    </a>
                                 </div>
                              </div>
                              {/foreach}
                           </div>
                        </div>
                     </div>
                     {/if}
