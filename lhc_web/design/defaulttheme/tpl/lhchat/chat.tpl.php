<h2 id="status-chat"><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/chat','Pending confirm')?></h2>

    <div id="messages" >
        <div class="msgBlock" id="messagesBlock"><?php foreach (erLhcoreClassChat::getChatMessages($chat_id) as $msg ) : ?>         
            <?php if ($msg['user_id'] == 0) { ?>
            	<div class="message-row"><div class="msg-date"><?php if (date('Ymd') == date('Ymd',$msg['time'])) {	echo  date('H:i:s',$msg['time']);} else { echo date('Y-m-d H:i:s',$msg['time']);}; ?></div><span class="usr-tit"><?php if (isset($chat_widget_mode) && $chat_widget_mode == true) : ?><img src="<?php echo erLhcoreClassDesign::design('images/icons/user_green.png');?>" title="<?php echo htmlspecialchars($chat->nick)?>" alt="<?php echo htmlspecialchars($chat->nick)?>" /><?php else : ?><?php echo htmlspecialchars($chat->nick)?>:<?php endif;?>&nbsp;</span><?php echo htmlspecialchars($msg['msg']);?></div>            	
            <?php } else { ?>
                <div class="message-row response"><div class="msg-date"><?php if (date('Ymd') == date('Ymd',$msg['time'])) { echo  date('H:i:s',$msg['time']);} else {	echo date('Y-m-d H:i:s',$msg['time']);}; ?></div><span class="usr-tit"><?php if (isset($chat_widget_mode) && $chat_widget_mode == true) : ?><img src="<?php echo erLhcoreClassDesign::design('images/icons/user_suit.png');?>" title="<?php echo htmlspecialchars($msg['name_support'])?>" alt="<?php echo htmlspecialchars($msg['name_support'])?>" /><?php else : ?><?php echo htmlspecialchars($msg['name_support'])?>:<?php endif;?>&nbsp;</span><?php echo htmlspecialchars($msg['msg']);?></div>
            <?php } ?>  
         <?php endforeach; ?></div>
    </div>

    <br>
        <div>
            <textarea rows="4" name="ChatMessage" placeholder="Enter your message" id="CSChatMessage" ></textarea>
            <script type="text/javascript">
            jQuery('#CSChatMessage').bind('keydown', 'return', function (evt){
                lhinst.addmsguser();
            });
            </script> 
        </div>
                    
        <input type="button" class="small button round" value="<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/chat','Send')?>" onclick="lhinst.addmsguser()" />

        
        <br>
        <br>

<script type="text/javascript">
    lhinst.setChatID('<?php echo $chat_id?>');
    lhinst.setChatHash('<?php echo $hash?>');
    
    <?php if ( isset($chat_widget_mode) && $chat_widget_mode == true ) : ?>
    lhinst.setWidgetMode(true);
	<?php endif; ?>
    
    // Start user chat synchronization
    lhinst.chatsyncuserpending();
    lhinst.syncusercall();
    
    $(window).bind('beforeunload', function(){        
        lhinst.userclosedchat();
    });
    
</script>