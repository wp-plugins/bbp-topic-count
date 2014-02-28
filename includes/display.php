<?php

//Make sure we don't expose any info if called directly
if ( !function_exists( 'add_action' ) ) {
	echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
	exit;
}
else
{
 	
//this function hooks to BBpress loop-single-reply.php and adds the counts to the reply display
function display_counts () 
		{
		global $tc_options;
		$user_id=bbp_get_reply_author_id( $reply_id ) ;
		$topic_count  = bbp_get_user_topic_count_raw( $user_id);
		$reply_count = bbp_get_user_reply_count_raw( $user_id);
		$post_count   = (int) $topic_count + $reply_count;
		
		echo '<ul>' ;
		
// displays topic count
		
		if($tc_options['activate_topics'] == true) {
		echo '<li>' ;
		echo $label1 =  $tc_options['topic_label']." " ;
		echo $topic_count ;
		echo "</li>" ;
		}
		
		
// displays replies count
		
		if($tc_options['activate_replies'] == true) {
		echo '<li>' ;
		echo $label2 =  $tc_options['reply_label']." " ;
		echo $reply_count ;
		echo "</li>" ;
		}
		
		
// displays total posts count
		
		if($tc_options['activate_posts'] == true) {
		echo '<li>' ;
		echo $label3 =  $tc_options['posts_label']." " ;
		echo $post_count ;
		echo "</li>" ;
		}
		
//end of list		
		echo "</ul>" ;

		}
add_action ('bbp_theme_after_reply_author_details', 'display_counts') ;

}