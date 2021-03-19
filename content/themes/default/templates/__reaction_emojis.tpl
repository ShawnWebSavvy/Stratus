{if $_reaction == "like"}

<!-- like -->
<div class="emoji emoji--like">
    <div class="emoji__hand">
        <div class="emoji__thumb"></div>
    </div>
</div>
<!-- like -->

{elseif $_reaction == "love"}
{if $notification['hub'] === "GlobalHub"}
<!-- love -->
<div class="reaction-btn">
    <div class="reaction-btn-icon likeButton">
        <span class="likeIcon"></span>
    </div>
</div>
<!-- love -->
{else}
<!-- love -->
<div class="emoji emoji--love">
    <lottie-player src="{$system['system_uploads']}/emojis-icon/Heart_Eyes/JSON Files/Heart Eyes_Shaded.json"
        background="transparent" speed="1" style="width: 300px; height: 300px;" loop autoplay></lottie-player>
</div>
<!-- love -->
{/if}

{elseif $_reaction == "haha"}

<!-- haha -->
<div class="emoji emoji--haha">
    <lottie-player src="{$system['system_uploads']}/emojis-icon/Laughing/JSON Files/Laughing_Shaded.json"
        background="transparent" speed="1" style="width: 300px; height: 300px;" loop autoplay></lottie-player>
</div>
<!-- haha -->

{elseif $_reaction == "yay"}

<!-- yay -->
<div class="emoji emoji--yay">
    <lottie-player src="{$system['system_uploads']}/emojis-icon/Blushing/JSON Files/Blushing_Shaded.json"
        background="transparent" speed="1" style="width: 300px; height: 300px;" loop autoplay></lottie-player>
</div>
<!-- yay -->

{elseif $_reaction == "wow"}

<!-- wow -->
<div class="emoji emoji--wow">
    <lottie-player src="{$system['system_uploads']}/emojis-icon/Shocked/JSON Files/Shocked_Shaded.json"
        background="transparent" speed="1" style="width: 300px; height: 300px;" loop autoplay></lottie-player>
</div>
<!-- wow -->

{elseif $_reaction == "sad"}

<!-- sad -->
<div class="emoji emoji--sad">
    <lottie-player src="{$system['system_uploads']}/emojis-icon/Sad_Tear/JSON Files/Sad Tear_Shaded.json"
        background="transparent" speed="1" style="width: 300px; height: 300px;" loop autoplay></lottie-player>
</div>
<!-- sad -->

{elseif $_reaction == "angry"}

<!-- angry -->
<div class="emoji emoji--angry">
    <lottie-player src="{$system['system_uploads']}/emojis-icon/Angry/JSON Files/Angry_Shaded.json"
        background="transparent" speed="1" style="width: 300px; height: 300px;" loop autoplay></lottie-player>
</div>
<!-- angry -->

{/if}