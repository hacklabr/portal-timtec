<?php 
// To Do.. 
// 1. Check if Link description exists or not. In case there is no description we will not append the description wrapper
// 2. Error Handling: Show a error message if we cannot fetch the feed.. Either the id is wrong or the page is private
// 3. Styling issue, sometime wrong html wrapper is created. Check in Go Pro for reference. 
// 4. 
// Define variables

$page_id = "";
$access_token = "";

// snippet from this url http://krasimirtsonev.com/blog/article/php--find-links-in-a-string-and-replace-them-with-actual-html-link-tags
function makeLinks($str,$link_target) {
	$reg_exUrl = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";
	$urls = array();
	$urlsToReplace = array();
	if(preg_match_all($reg_exUrl, $str, $urls)) {
		$numOfMatches = count($urls[0]);
		$numOfUrlsToReplace = 0;
		for($i=0; $i<$numOfMatches; $i++) {
			$alreadyAdded = false;
			$numOfUrlsToReplace = count($urlsToReplace);
			for($j=0; $j<$numOfUrlsToReplace; $j++) {
				if($urlsToReplace[$j] == $urls[0][$i]) {
					$alreadyAdded = true;
				}
			}
			if(!$alreadyAdded) {
				array_push($urlsToReplace, $urls[0][$i]);
			}
		}
		$numOfUrlsToReplace = count($urlsToReplace);
		for($i=0; $i<$numOfUrlsToReplace; $i++) {
		if($link_target == 1) {
			$str = str_replace($urlsToReplace[$i], '<a class="wff-link-tab" href="'.$urlsToReplace[$i].'" target = "_blank">'.$urlsToReplace[$i].'</a> ', $str);
		} else {
		$str = str_replace($urlsToReplace[$i], '<a class="wff-link-tab" href="'.$urlsToReplace[$i].'" >'.$urlsToReplace[$i].'</a>', $str);
		}		
		}
		return $str;
	} else {
		return $str;
	}
}

function make_hash_link($str,$link_target) 
{
    $reg_exUrl = "/(#\w+)/";
    $urls = array();
    $urlsToReplace = array();
    if(preg_match_all($reg_exUrl, $str, $urls)) {
        $numOfMatches = count($urls[0]);
        $numOfUrlsToReplace = 0;
    for($i=0; $i<$numOfMatches; $i++) {
        $alreadyAdded = false;
        $numOfUrlsToReplace = count($urlsToReplace);
    for($j=0; $j<$numOfUrlsToReplace; $j++) {
    if($urlsToReplace[$j] == $urls[0][$i]) {
        $alreadyAdded = true;
        }
        }
    if(!$alreadyAdded) {
        array_push($urlsToReplace, $urls[0][$i]);
        }
        }
        $numOfUrlsToReplace = count($urlsToReplace);
    for($i=0; $i<$numOfUrlsToReplace; $i++) {
       $str_without_hastag[$i] = ltrim ($urlsToReplace[$i], '#');
	   if($link_target == 1) {
       $str = str_replace($urlsToReplace[$i],'<a class="wff-link-tab" href="https://www.facebook.com/hashtag/'.$str_without_hastag[$i].'" target = "_blank">'.$urlsToReplace[$i].'</a>', $str);
	   } else {
	   $str = str_replace($urlsToReplace[$i],'<a class="wff-link-tab" href="https://www.facebook.com/hashtag/'.$str_without_hastag[$i].'" >'.$urlsToReplace[$i].'</a>', $str);
	   }
        }
    return $str;
    } 
    else{
    return $str;
    }
}

	// Reference URL http://stackoverflow.com/questions/10981513/stripos-issues-in-php4
	if(!is_callable('stripos')){
		function stripos($haystack, $needle){
        return strpos($haystack, stristr( $haystack, $needle ));
    }
}

function wff_fetchUrl($url)
{ 
	if(is_callable('curl_init')){
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_TIMEOUT, 20);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		$feedData = curl_exec($ch);
		curl_close($ch);
		//If not then use file_get_contents
		} elseif ( ini_get('allow_url_fopen') == 1 || ini_get('allow_url_fopen') === TRUE ) {
		$feedData = @file_get_contents($url);
		//Or else use the WP HTTP AP
		} else {
			if( !class_exists( 'WP_Http' ) ) include_once( ABSPATH . WPINC. '/class-http.php' );
			$request = new WP_Http;
			$result = $request->request($url);
			$feedData = $result['body'];
		}
	return $feedData;
}
//inline style for post text
function limited_post_text_inline_style($atts)
	{
	$style_wrapper = ' style=" ';
	if ( !empty($atts['post_text_size']) && $atts['post_text_size'] != 'inherit' ) $style_wrapper .=  'font-size:' . $atts['post_text_size'] . 'px;';
	if ( !empty($atts['line_height']) && $atts['line_height'] != 'inherit' ) $style_wrapper .=  'line-height:' . $atts['line_height'].'px;';
	if ( !empty($atts['post_text_align']) && $atts['post_text_align'] != 'inherit' ) $style_wrapper .=  'text-align:' . $atts['post_text_align'].';';
	if ( !empty($atts['post_text_weight']) && $atts['post_text_weight'] != 'inherit' ) $style_wrapper .=  'font-weight:' . $atts['post_text_weight'].';';
	if ( !empty($atts['post_text_color'])) $style_wrapper .=  'color:' . $atts['post_text_color'].';';
	if ( !empty($atts['post_background'])) $style_wrapper .=  'background:' . $atts['post_background'].';';
	$style_wrapper .= ' " ';
	
	return $style_wrapper;
	}
	
function full_post_text_inline_style($atts)
	{
	$style_wrapper = ' style=" display:none; ';
	if ( !empty($atts['post_text_size']) && $atts['post_text_size'] != 'inherit' ) $style_wrapper .=  'font-size:' . $atts['post_text_size'] . 'px;';
	if ( !empty($atts['line_height']) && $atts['line_height'] != 'inherit' ) $style_wrapper .=  'line-height:' . $atts['line_height'].'px;';
	if ( !empty($atts['post_text_align']) && $atts['post_text_align'] != 'inherit' ) $style_wrapper .=  'text-align:' . $atts['post_text_align'].';';
	if ( !empty($atts['post_text_weight']) && $atts['post_text_weight'] != 'inherit' ) $style_wrapper .=  'font-weight:' . $atts['post_text_weight'].';';
	if ( !empty($atts['post_text_color'])) $style_wrapper .=  'color:' . $atts['post_text_color'].';';
	if ( !empty($atts['post_background'])) $style_wrapper .=  'background:' . $atts['post_background'].';';
	$style_wrapper .= ' " ';
	
	return $style_wrapper;
	}
	
function feed_line_height($atts)
	{
	$style_wrapper = ' style=" ';
	
	if ( !empty($atts['line_height']) && $atts['line_height'] != 'inherit' ) $style_wrapper .=  'line-height:' . $atts['line_height'].'px;';
	
	$style_wrapper .= ' " ';
	
	return $style_wrapper;
	}	

function build_my_photo_html ($mysinglefeed,$atts)
{
    if (isset($mysinglefeed->story))
		{
	    // if story exists then use the story in the post text
	    $my_post_photo_text = $mysinglefeed->story;   
	    // we also need to handle story tags
	    if (array_key_exists('story_tags',$mysinglefeed ))
            {
				// now add the hyperlink to tags 
				foreach ( $mysinglefeed->story_tags as $mystorytag)
				{ 
					$mystorytagname = $mystorytag[0]->name; 
					if($atts['link_target']==1)	{
					$tag_link = '<a class="wff-link-tab" href="http://facebook.com/' . $mystorytag[0]->id . '" style="color: indigo;" target="_blank">' . $mystorytag[0]->name . '</a>';
					} else {
					$tag_link = '<a class="wff-link-tab" href="http://facebook.com/' . $mystorytag[0]->id . '" style="color: indigo;" >' . $mystorytag[0]->name . '</a>';
					}
					$my_post_photo_text = str_replace($mystorytagname, $tag_link, $my_post_photo_text);
				}
			} 
	    }
	     	
	     	if (isset($mysinglefeed->message) && !empty($mysinglefeed->message))
	     	{
	     	  	// if story exists then use the story in the post text
	     	  	$my_post_photo_text = $mysinglefeed->message;  
	     	  				
	     	  	$my_post_photo_text = makeLinks ($my_post_photo_text,$atts['link_target']);  // link the urls
	     	  	
				if(!preg_match('/((http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?)#(\w*[a-zA-Z_]+\w*)/',$my_post_photo_text)) {
				$my_post_photo_text = make_hash_link ($my_post_photo_text,$atts['link_target']); 
	     	  	}
	     	 
	     	}
	     	  				
	     	  	// If if there are message tags 
	     	  	$resourceid = $mysinglefeed->object_id;
				if (array_key_exists('message_tags',$mysinglefeed ))
				{
				// now add the hyperlink to tags 
				foreach ( $mysinglefeed->message_tags as $mymessagetag)
				{ 
                    $mymessagetagname = $mymessagetag[0]->name; 
					if($atts['link_target']==1)	{				
					$tag_link = '<a class="wff-link-tab" href="http://facebook.com/' . $mymessagetag[0]->id . '" style="color: red;" target="_blank">' . $mymessagetag[0]->name . '</a>';
					} else {
					$tag_link = '<a class="wff-link-tab" href="http://facebook.com/' . $mymessagetag[0]->id . '" style="color: red;" >' . $mymessagetag[0]->name . '</a>';
					}
					$my_post_photo_text = str_replace($mymessagetagname, $tag_link, $my_post_photo_text);
				}
				} 
				
				//call post text inline style
				$limited_style_wrapper = limited_post_text_inline_style($atts);
				$full_style_wrapper = full_post_text_inline_style($atts);
				$line_height_style =  feed_line_height($atts);
				/*---------------------read more text---------------------------*/
				$str_without_tag = strip_tags($my_post_photo_text);
				$char_count = strlen($str_without_tag);
				
				if((!empty($atts['char_limit'])) && ($atts['char_limit'] < $char_count) )
				{
				$short_sentence = substr($str_without_tag, 0,$atts['char_limit']);
				
				$short_sentence = makeLinks ($short_sentence,$atts['link_target']);  //link the urls
	     	  	if(!preg_match('/((http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?)#(\w*[a-zA-Z_]+\w*)/',$short_sentence)) {
				$short_sentence = make_hash_link ($short_sentence,$atts['link_target']);
				}
				if (array_key_exists('story_tags',$mysinglefeed ))
				{
				foreach ( $mysinglefeed->story_tags as $mystorytag)
					{ 
					$mystorytagname = $mystorytag[0]->name;
					if($atts['link_target']==1) {	
					$tag_link = '<a class="wff-link-tab" href="http://facebook.com/' . $mystorytag[0]->id . '" style="color: indigo;" target="_blank">' . $mystorytag[0]->name . '</a>';
					} else {
					$tag_link = '<a class="wff-link-tab" href="http://facebook.com/' . $mystorytag[0]->id . '" style="color: indigo;" >' . $mystorytag[0]->name . '</a>';
					}
					$short_sentence = str_replace($mystorytagname, $tag_link, $short_sentence);
					}
				} 
				if (array_key_exists('message_tags',$mysinglefeed ))
				{
					foreach( $mysinglefeed->message_tags as $mymessagetag)// now add the hyperlink to tags 
					{ 
						$mymessagetagname = $mymessagetag[0]->name;  
						if($atts['link_target']==1) {
						$tag_link = '<a class="wff-link-tab" href="http://facebook.com/' . $mymessagetag[0]->id . '" style="color: red;" target="_blank">' . $mymessagetag[0]->name . '</a>';
						} else {
						$tag_link = '<a class="wff-link-tab" href="http://facebook.com/' . $mymessagetag[0]->id . '" style="color: red;" >' . $mymessagetag[0]->name . '</a>';
						}
						$short_sentence = str_replace($mymessagetagname, $tag_link, $short_sentence);
					}
				} 
				$build_photo_html = '<p class = "wff-post-text" '.$limited_style_wrapper.'>'.$short_sentence.'...<span><a  class="wff-more-link" >'.$atts['read_more'].'</a></span></p>';	
				$build_photo_html .= '<p class="more-content" '.$full_style_wrapper.'>'.$my_post_photo_text.'...<span><a  class="wff-less-link" style="display:none">'.$atts['read_less'].'</a></span></p>';
				} 
				else{
				$build_photo_html = '<p class = "wff-post-text" '.$limited_style_wrapper.'>'.$my_post_photo_text.'</p>';
				}
			/*-----------------------------------------------*/
			
	     	$the_resource_id = $mysinglefeed->object_id;
	     	$post_resource_link = 'https://facebook.com/'.$the_resource_id; 
			
	     	// Now build The post description 
	     	if (isset($mysinglefeed->name))
	     	  	{
	     	  			$name_var = $mysinglefeed->name;
	     	  			$name_url = $mysinglefeed->link;
	     	  			
	     	  			if (isset($mysinglefeed->description))
	     	  			{
	     	  				
	     	  			$link_post_desc = $mysinglefeed->description;
	     	  			$link_post_desc = makeLinks($link_post_desc,$atts['link_target']);
						if(!preg_match('/((http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?)#(\w*[a-zA-Z_]+\w*)/',$link_post_desc)) {
	     	  			$link_post_desc = make_hash_link($link_post_desc,$atts['link_target']);
						}
	     	  			}
	     	  			else {
	     	  				$link_post_desc= "";
	     	  				
	     	  			}
		}				
	    // now I will include inline style rules while building the HTML. They can be passed via shortcode attributes
		$build_post_desc_html = '';
		if(isset($mysinglefeed->description)){
		if($atts['link_target']==1) { 	  			
	    $build_link_title = '<p class = "link-title" '.$line_height_style.'><a class="wff-link-tab" target="_blank" href =' .$name_url.'>'.$name_var.'  </a></p>'; 
	    } else {
		$build_link_title = '<p class = "link-title" '.$line_height_style.'><a class="wff-link-tab" href =' .$name_url.'>'.$name_var.'</a></p>';
		}
		
	   	$build_post_desc_html = '<div class = "description-wrapper shared-link">'.$build_link_title.'<p class = "post-desc" '.$line_height_style.'>'.$link_post_desc.'</p></div>'.$build_post_desc_html;
		}	
	    $build_photo_html .= $build_post_desc_html;
	     	  		
	    if($atts['link_target']==1)	{
	    $build_photo_html .= '<div class = "wff-view-on-facebook"><a class="wff-link-tab" href = '. $post_resource_link.' target = "_blank">'.$atts['page_link_text'].'</a></div>'; 
	    } else {
        $build_photo_html .= '<div class = "wff-view-on-facebook"><a class="wff-link-tab" href = '. $post_resource_link.' >'.$atts['page_link_text'].'</a></div>'; 
		}
	    return $build_photo_html;
}

function build_my_link_html ($mysinglefeed,$atts)
{
 	// first work on building html for link type
	if (isset($mysinglefeed->story))
	{
	    // if story exists then use the story in the post text
	    $my_post_text = $mysinglefeed->story;   
	     	  	
	    if (array_key_exists('story_tags',$mysinglefeed ))
		{
		// now add the hyperlink to tags 
		foreach ( $mysinglefeed->story_tags as $mystorytag)
		{ 
			$mystorytagname = $mystorytag[0]->name;  
			if($atts['link_target']==1)	{
			$tag_link = '<a class="wff-link-tab" href="http://facebook.com/' . $mystorytag[0]->id . '" style="color: indigo;" target="_blank">' . $mystorytag[0]->name . '</a>';
			} else {
			$tag_link = '<a class="wff-link-tab" href="http://facebook.com/' . $mystorytag[0]->id . '" style="color: indigo;">' . $mystorytag[0]->name . '</a>';
			}
		    $my_post_text = str_replace($mystorytagname, $tag_link, $my_post_text);
		}
		} 
	}
	     	
	if (isset($mysinglefeed->message))
	{
	    // if story exists then use the story in the post text
	    $my_post_text = $mysinglefeed->message; 
		$my_post_text = makeLinks($my_post_text,$atts['link_target']);
		
		if(!preg_match('/((http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?)#(\w*[a-zA-Z_]+\w*)/',$my_post_text))
		{
		$my_post_text = make_hash_link($my_post_text,$atts['link_target']);
		}
	}
	    // Build Post description 
	    // first hyper link the name
	     	  			
	    $name_var = $mysinglefeed->name;
	    $name_url = $mysinglefeed->link;
	     	  			
	     	if(isset($mysinglefeed->description))
	     	{
	     	  	$link_post_desc = $mysinglefeed->description;
	     	  	$link_post_desc = makeLinks($link_post_desc,$atts['link_target']);
				if(!preg_match('/((http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?)#(\w*[a-zA-Z_]+\w*)/',$link_post_desc)) {
	     	  	$link_post_desc = make_hash_link($link_post_desc,$atts['link_target']);
				}
			} else {
	     	  	$link_post_desc = "";
	     	}
			
		// $resourceid = $mysinglefeed->object_id;
		if (array_key_exists('message_tags',$mysinglefeed ))
			{
			// now add the hyperlink to tags 
			foreach ( $mysinglefeed->message_tags as $mymessagetag)
			{ 
				$mymessagetagname = $mymessagetag[0]->name; 
				if($atts['link_target']==1)	{		
				$tag_link = '<a class="wff-link-tab" href="http://facebook.com/' . $mymessagetag[0]->id . '" style="color: red;" target="_blank">' . $mymessagetag[0]->name . '</a>';
				} else {
				$tag_link = '<a class="wff-link-tab" href="http://facebook.com/' . $mymessagetag[0]->id . '" style="color: red;" >' . $mymessagetag[0]->name . '</a>';
				}
				$my_post_text = str_replace($mymessagetagname, $tag_link, $my_post_text);
			}
			} 
	    $the_resource_id = explode('_',$mysinglefeed->id);
		$post_resource_link = 'https://facebook.com/'.$atts['page_id'] .'/posts/'.$the_resource_id[1]; 
	    
		//call post text inline style
		$limited_style_wrapper = limited_post_text_inline_style($atts);
		$full_style_wrapper = full_post_text_inline_style($atts);
		$line_height_style =  feed_line_height($atts);
		/*---------------------read more text---------------------------*/
				$str_without_tag = strip_tags($my_post_text);
				$char_count = strlen($str_without_tag);
		
				if((!empty($atts['char_limit'])) && ($atts['char_limit'] < $char_count) )
				{
				$short_sentence = substr($str_without_tag, 0,$atts['char_limit']);

				$short_sentence = makeLinks ($short_sentence,$atts['link_target']);  // link the urls
	     	  	if(!preg_match('/((http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?)#(\w*[a-zA-Z_]+\w*)/',$short_sentence)) {
				$short_sentence = make_hash_link ($short_sentence,$atts['link_target']);
				}
				if (array_key_exists('story_tags',$mysinglefeed ))
				{
				foreach ( $mysinglefeed->story_tags as $mystorytag)
					{ 
					$mystorytagname = $mystorytag[0]->name; 
					if($atts['link_target']==1)	{	
					$tag_link = '<a class="wff-link-tab" href="http://facebook.com/' . $mystorytag[0]->id . '" style="color: indigo;" target="_blank">' . $mystorytag[0]->name . '</a>';
					} else {
					$tag_link = '<a class="wff-link-tab" href="http://facebook.com/' . $mystorytag[0]->id . '" style="color: indigo;" >' . $mystorytag[0]->name . '</a>';
					}
					$short_sentence = str_replace($mystorytagname, $tag_link, $short_sentence);
					}
				} 
				
				if (array_key_exists('message_tags',$mysinglefeed ))
				{
					foreach( $mysinglefeed->message_tags as $mymessagetag)// now add the hyperlink to tags 
					{ 
						$mymessagetagname = $mymessagetag[0]->name;
						if($atts['link_target']==1)	{						
						$tag_link = '<a class="wff-link-tab" href="http://facebook.com/' . $mymessagetag[0]->id . '" style="color: red;" target="_blank">' . $mymessagetag[0]->name . '</a>';
						} else {
						$tag_link = '<a class="wff-link-tab" href="http://facebook.com/' . $mymessagetag[0]->id . '" style="color: red;" >' . $mymessagetag[0]->name . '</a>';
						}
						$short_sentence = str_replace($mymessagetagname, $tag_link, $short_sentence);
					}
				}
				$mytext = '<p class = "wff-post-text" '.$limited_style_wrapper.'>'.$short_sentence.'...<span><a  class="wff-more-link">'.$atts['read_more'].'</a></span></p>';	
				$mytext .= '<p class="more-content" '.$full_style_wrapper.'>'.$my_post_text.'...<span><a  class="wff-less-link" style="display:none">'.$atts['read_less'].'</a></span></p>';
				} 
				else{
				$mytext = '<p class = "wff-post-text" '.$limited_style_wrapper.'>'.$my_post_text.'</p>';
				}
		/*------------------------------------------------*/
		if(isset($mysinglefeed->description)){
		if($atts['link_target']==1)	{
		$build_link_title = '<p class = "wff-link-title" '.$line_height_style.'><a class="wff-link-tab" target = "_blank" href =' .$name_url.'>'.$name_var.'</a></p>';
		} else {
		$build_link_title = '<p class = "wff-link-title" '.$line_height_style.'><a class="wff-link-tab" href =' .$name_url.'>'.$name_var.'</a></p>';
		}		
	    $build_post_desc_html = '<div class = "wff-shared-link-wrapper">'.$build_link_title.'<p class = "wff-post-description" '.$line_height_style.'>'.$link_post_desc.'</p>';
		
		if(isset($mysinglefeed->caption)) {
			$build_post_desc_html .='<a class="wff-link-tab" href='.$name_url.' target="_blank" >'.$mysinglefeed->caption.'</a></div>';
		} else $build_post_desc_html .= '</div>';
		
		}
		
		$mytext .= $build_post_desc_html ;
		if($atts['link_target']==1)	{
	    $mytext .=  '<div class = "wff-view-on-facebook"><a class="wff-link-tab" href = '. $post_resource_link.' target = "_blank">'.$atts['page_link_text'].'</a></div>';
	    } else {
		$mytext .=  '<div class = "wff-view-on-facebook"><a class="wff-link-tab" href = '. $post_resource_link.' >'.$atts['page_link_text'].'</a></div>';
		}		
	    return $mytext; 
}

function build_my_event_html ($mysinglefeed ,$atts,$myaccesstoken)
{
    
	$theurl = parse_url($mysinglefeed->link);
	$urlpart = explode('/', $theurl['path']);
				
	$the_event_id = $urlpart[2];
				 
	//now get the event json
	$event_url_json = 'https://graph.facebook.com/' . $the_event_id . '?access_token=' . $myaccesstoken ;
					 		
	$event_json_data = wff_fetchUrl($event_url_json);
	$event_data = json_decode($event_json_data) ; 
	
	//get event start date
	$event_start_date = $event_data->start_time;
	$str_format = strtotime($event_start_date); 
	
	//condition for date format
	if($atts['author_date_format']=='default'){
	$event_date_print = date('F d, Y',$str_format);
	}
	else{
	$system_date_format = $atts['author_date_format'];
	$event_date_print = date($system_date_format, $str_format); 
	}
	
	//We will build the date string. Check if an end time is specified
	if (isset($event_data->end_time))
	{
		// get event end date
		$event_end_date = $event_data->end_time;
		$str_format = strtotime($event_end_date);
		
		if($atts['author_date_format']=='default'){
		$event_end_date_print = date('F d, Y',$str_format);
		}
		else{
		$system_date_format = $atts['author_date_format'];
		$event_end_date_print = date($system_date_format, $str_format);
		
		}
						    	      
		$event_date_print .= " - ". $event_end_date_print; 
	}
						    	
	if (isset($mysinglefeed->story))
	{
	    // if story exists then use the story in the post text
	    $my_post_text = $mysinglefeed->story;   
	     	  	
	    if (array_key_exists('story_tags',$mysinglefeed ))
		{
		// now add the hyperlink to tags 
			foreach ( $mysinglefeed->story_tags as $mystorytag)
			{ 
				$mystorytagname = $mystorytag[0]->name; 
				if($atts['link_target']==1)	{	
				$tag_link = '<a class="wff-link-tab" href="http://facebook.com/' . $mystorytag[0]->id . '" style="color: indigo;" target="_blank">' . $mystorytag[0]->name . '</a>';
				} else {
				$tag_link = '<a class="wff-link-tab" href="http://facebook.com/' . $mystorytag[0]->id . '" style="color: indigo;" >' . $mystorytag[0]->name . '</a>';
				}
				$my_post_text = str_replace($mystorytagname, $tag_link, $my_post_text);
				}
			} 
	    }
	     	
		if (isset($mysinglefeed->message))
	    {
	     	// if story exists then use the story in the post text
	     	$my_post_text = $mysinglefeed->message; 
	     	$my_post_text = makeLinks($my_post_text,$atts['link_target']);
	     	if(!preg_match('/((http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?)#(\w*[a-zA-Z_]+\w*)/',$my_post_text)) {
			$my_post_text = make_hash_link($my_post_text,$atts['link_target']);
			}
		}
		
		//call post text inline style
		$limited_style_wrapper = limited_post_text_inline_style($atts);
		$full_style_wrapper = full_post_text_inline_style($atts);
		$line_height_style =  feed_line_height($atts);				    
		/*---------------------read more text---------------------------*/
				
				$str_without_tag = strip_tags($my_post_text);
				$char_count = strlen($str_without_tag);
		
				if((!empty($atts['char_limit'])) && ($atts['char_limit'] < $char_count) )
				{
				$short_sentence = substr($str_without_tag, 0,$atts['char_limit']);

				$short_sentence = makeLinks ($short_sentence,$atts['link_target']);  // link the urls
	     	  	if(!preg_match('/((http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?)#(\w*[a-zA-Z_]+\w*)/',$short_sentence)) {
				$short_sentence = make_hash_link ($short_sentence,$atts['link_target']);
				}
				if (array_key_exists('story_tags',$mysinglefeed)) {
				// now add the hyperlink to tags 
				foreach ( $mysinglefeed->story_tags as $mystorytag)
				{ 
					$mystorytagname = $mystorytag[0]->name;
					if($atts['link_target']==1)	{		
					$tag_link = '<a class="wff-link-tab" href="http://facebook.com/' . $mystorytag[0]->id . '" style="color: indigo;" target="_blank">' . $mystorytag[0]->name . '</a>';
					} else {
					$tag_link = '<a class="wff-link-tab" href="http://facebook.com/' . $mystorytag[0]->id . '" style="color: indigo;" >' . $mystorytag[0]->name . '</a>';
					}
					$short_sentence = str_replace($mystorytagname, $tag_link, $short_sentence);
					}
				} 
				
				$finaltext = '<p class = "wff-post-text" '.$limited_style_wrapper.'>'.$short_sentence.'...<span><a  class="wff-more-link">'.$atts['read_more'].'</a></span></p>';	
				$finaltext .= '<p class="more-content" '.$full_style_wrapper.'>'.$my_post_text.'...<span><a  class="wff-less-link" style="display:none">'.$atts['read_less'].'</a></span></p>';
				} 
				else {
				$finaltext = '<p class = "wff-post-text" '.$limited_style_wrapper.'>'.$my_post_text.'</p>';
				}
		/*------------------------------------------------*/ 
		$post_resource_link = $mysinglefeed->link;
		$event_title = $event_data->name;
		$event_description = $event_data->description;
		//$event_location = $event_data->location;
		$finaltext  .= '<div class = "wff-fb-item-event-wrapper">';
		$finaltext  .= '<div class = "fb-text-wrapper">';	
		$finaltext  .= '<div class = "fb-post-data description-wrapper">';
		if($atts['link_target']==1)	{
		$finaltext  .= '<p class="wff-event-title" '.$line_height_style.'><a class="wff-link-tab" href = '.$post_resource_link. ' target = "_blank">'.$event_title.'</a></p>';
		} else {
		$finaltext  .= '<p class="wff-event-title" '.$line_height_style.'><a class="wff-link-tab" href = '.$post_resource_link. ' >'.$event_title.'</a></p>';
		}
		$finaltext  .= '<p class="wff-event-content" '.$line_height_style.'>'.$event_description.'</p>';// close post data div 
		$finaltext  .= '<div class = "event-date">'.$event_date_print.'</div></div>' ;  // the date div  
		if($atts['link_target']==1)	{
		$finaltext .= '<div class = "wff-view-on-facebook"><a class="wff-link-tab" href = '.$post_resource_link. ' target = "_blank">'.$atts['page_link_text'].'</a></div>'; 
		} else {
		$finaltext .= '<div class = "wff-view-on-facebook"><a class="wff-link-tab" href = '.$post_resource_link.' >'.$atts['page_link_text'].'</a></div>';
		}
		$finaltext .= '</div></div>'; // close text wrapper and event wrapper
		
	return $finaltext ; 
}
 
function build_my_status_html ($mysinglefeed ,$atts)
{
 	// every where we will check if there is no message.. 
 	//A stroy description will be used only when there is no message 
 	
 	if (isset($mysinglefeed->story))
	{
	// if story exists then use the story in the post text
	     	  	
		$my_post_text = $mysinglefeed->story;   
	     	  	
	    if (array_key_exists('story_tags',$mysinglefeed ))
		{
			// now add the hyperlink to tags 
			foreach ( $mysinglefeed->story_tags as $mystorytag)
			{ 
				$mystorytagname = $mystorytag[0]->name;
				if($atts['link_target']==1)	{		
				$tag_link = '<a class="wff-link-tab" href="http://facebook.com/' . $mystorytag[0]->id . '" style="color: indigo;" target="_blank">' . $mystorytag[0]->name . '</a>';
				} else {
				$tag_link = '<a class="wff-link-tab" href="http://facebook.com/' . $mystorytag[0]->id . '" style="color: indigo;" >' . $mystorytag[0]->name . '</a>';
				}
				$my_post_text = str_replace($mystorytagname, $tag_link, $my_post_text);
			}
		} 
	    }
	     	
	    if (isset($mysinglefeed->message))
	    {
	     	// if story exists then use the story in the post text
				$my_post_text = $mysinglefeed->message; 
	     	  	$my_post_text = makeLinks($my_post_text,$atts['link_target']);
	     	  	if(!preg_match('/((http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?)#(\w*[a-zA-Z_]+\w*)/',$my_post_text)) {
				$my_post_text = make_hash_link ($my_post_text,$atts['link_target']);
				}
		}
	     	// Build Post description 
	     	// first hyper link the name
	     	  			
	     	$name_var = (isset($mysinglefeed->name) ? $mysinglefeed->name : '');
	     	$name_url = (isset($mysinglefeed->link) ? $mysinglefeed->link : '');
	     	  			
	     	$link_post_desc = (isset($mysinglefeed->description) ? $mysinglefeed->description : '');
	     	$link_post_desc = makeLinks($link_post_desc,$atts['link_target']);
	     	if(!preg_match('/((http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?)#(\w*[a-zA-Z_]+\w*)/',$link_post_desc)) {
			$link_post_desc = make_hash_link($link_post_desc,$atts['link_target']);
	     	}
	    if (array_key_exists('message_tags',$mysinglefeed ))
		{
			// now add the hyperlink to tags 
			foreach ( $mysinglefeed->message_tags as $mymessagetag)
			{ 
				$mymessagetagname = $mymessagetag[0]->name; 
				if($atts['link_target']==1)	{		
				$tag_link = '<a class="wff-link-tab" href="http://facebook.com/' . $mymessagetag[0]->id . '" style="color: red;" target="_blank">' . $mymessagetag[0]->name . '</a>';
				} else {
				$tag_link = '<a class="wff-link-tab" href="http://facebook.com/' . $mymessagetag[0]->id . '" style="color: red;" >' . $mymessagetag[0]->name . '</a>';
				}
				$my_post_text = str_replace($mymessagetagname, $tag_link, $my_post_text);
			}
		} 
	    $the_resource_id_array = explode("_", $mysinglefeed->id);
	    $the_resource_id = $the_resource_id_array[1];
	    $post_resource_link = 'https://facebook.com/'.$atts['page_id'] .'/posts/'.$the_resource_id; 
	    
		//call post text inline style
		$limited_style_wrapper = limited_post_text_inline_style($atts);
		$full_style_wrapper = full_post_text_inline_style($atts);
		$line_height_style =  feed_line_height($atts);
		/*---------------------read more text---------------------------*/
				
				$str_without_tag = strip_tags($my_post_text);
				$char_count = strlen($str_without_tag);
		
				if((!empty($atts['char_limit'])) && ($atts['char_limit'] < $char_count) )
				{
				$short_sentence = substr($str_without_tag, 0,$atts['char_limit']);
				
				$short_sentence = makeLinks ($short_sentence,$atts['link_target']);  // link the urls
	     	  	if(!preg_match('/((http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?)#(\w*[a-zA-Z_]+\w*)/',$short_sentence)) {
				$short_sentence = make_hash_link ($short_sentence,$atts['link_target']);
				}
				if (array_key_exists('story_tags',$mysinglefeed ))
				{
				foreach ( $mysinglefeed->story_tags as $mystorytag)
					{ 
					$mystorytagname = $mystorytag[0]->name;  
					if($atts['link_target']==1)	{
					$tag_link = '<a class="wff-link-tab" href="http://facebook.com/' . $mystorytag[0]->id . '" style="color: indigo;" target="_blank">' . $mystorytag[0]->name . '</a>';
					} else {
					$tag_link = '<a class="wff-link-tab" href="http://facebook.com/' . $mystorytag[0]->id . '" style="color: indigo;" >' . $mystorytag[0]->name . '</a>';
					}
					$short_sentence = str_replace($mystorytagname, $tag_link, $short_sentence);
					}
				} 
				
				if (array_key_exists('message_tags',$mysinglefeed ))
				{
					foreach( $mysinglefeed->message_tags as $mymessagetag)// now add the hyperlink to tags 
					{ 
						$mymessagetagname = $mymessagetag[0]->name;  
						if($atts['link_target']==1)	{
						$tag_link = '<a class="wff-link-tab" href="http://facebook.com/' . $mymessagetag[0]->id . '" style="color: red;" target="_blank">' . $mymessagetag[0]->name . '</a>';
						} else {
						$tag_link = '<a class="wff-link-tab" href="http://facebook.com/' . $mymessagetag[0]->id . '" style="color: red;" >' . $mymessagetag[0]->name . '</a>';
						}
						$short_sentence = str_replace($mymessagetagname, $tag_link, $short_sentence);
					}
				}
				$mytext = '<p class = "wff-post-text" '.$limited_style_wrapper.'>'.$short_sentence.'...<span><a  class="wff-more-link">'.$atts['read_more'].'</a></span></p>';	
				$mytext .= '<p class="more-content" '.$full_style_wrapper.'>'.$my_post_text.'...<span><a  class="wff-less-link" style="display:none">'.$atts['read_less'].'</a></span></p>';
				} 
				else{
				$mytext = '<p class = "wff-post-text" '.$limited_style_wrapper.'>'.$my_post_text.'</p>';
				}
		/*------------------------------------------------*/
	    if(isset($mysinglefeed->description)){
		if($atts['link_target']==1)	{	
	    $build_link_title = '<p class = "link-title" '.$line_height_style.'><a class="wff-link-tab" target="_blank" href =' .$name_url.'>'.$name_var.'</a></p>'; 
		} else {
		$build_link_title = '<p class = "link-title" '.$line_height_style.'><a class="wff-link-tab" href =' .$name_url.'>'.$name_var.'</a></p>'; 
		}
	    $build_post_desc_html = '<div class = "description-wrapper shared-link">'.$build_link_title.'<p class = "post-desc" '.$line_height_style.'>'.$link_post_desc.'</p></div>';
		}
		
		if($atts['link_target']==1)	{
	    $mytext .=  '<div class = "wff-view-on-facebook"><a class="wff-link-tab" href = '. $post_resource_link.' target = "_blank">'.$atts['page_link_text'].'</a></div>';
	    } else {
		$mytext .=  '<div class = "wff-view-on-facebook"><a class="wff-link-tab" href = '. $post_resource_link.' >'.$atts['page_link_text'].'</a></div>';
        }		
 	return $mytext; 
}
 
function build_my_video_html ($mysinglefeed ,$atts)
{
 	if (isset($mysinglefeed->story))
	{
	    // if story exists then use the story in the post text
	    $my_post_text = $mysinglefeed->story;   
	}
	if (isset($mysinglefeed->message))
	{
	    // if story exists then use the story in the post text
	    $my_post_text = $mysinglefeed->message; 
	    $my_post_text = makeLinks($my_post_text,$atts['link_target']);
	    if(!preg_match('/((http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?)#(\w*[a-zA-Z_]+\w*)/',$my_post_text)) {
		$my_post_text = make_hash_link($my_post_text,$atts['link_target']);
		}
	}
	     	  				
	    // Build Post description 
	    // first hyper link the name
	    $name_var = (isset($mysinglefeed->name) ? $mysinglefeed->name : '');
	    $name_url = (isset($mysinglefeed->link) ? $mysinglefeed->link : '');
	     	  			
	    $link_post_desc = (isset($mysinglefeed->description) ? $mysinglefeed->description : '');
	    $link_post_desc = makeLinks($link_post_desc,$atts['link_target']);
	    if(!preg_match('/((http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?)#(\w*[a-zA-Z_]+\w*)/',$link_post_desc)) {
		$link_post_desc = make_hash_link($link_post_desc,$atts['link_target']);
	    } 	
	if (array_key_exists('message_tags',$mysinglefeed ))
	{
		// now add the hyperlink to tags 
		foreach ( $mysinglefeed->message_tags as $mymessagetag)
		{ 
			$mymessagetagname = $mymessagetag[0]->name;  
			if($atts['link_target']==1)	{
			$tag_link = '<a class="wff-link-tab" href="http://facebook.com/' . $mymessagetag[0]->id . '" style="color: red;" target="_blank">' . $mymessagetag[0]->name . '</a>';
			} else {
			$tag_link = '<a class="wff-link-tab" href="http://facebook.com/' . $mymessagetag[0]->id . '" style="color: red;" >' . $mymessagetag[0]->name . '</a>';
			}
			$my_post_text = str_replace($mymessagetagname, $tag_link, $my_post_text);
		}
	} 
	    $the_resource_id_array = explode("_", $mysinglefeed->id);
	    $the_resource_id = $the_resource_id_array[1];
	     		
	    $post_resource_link = 'https://facebook.com/'.$atts['page_id'] .'/posts/'.$the_resource_id; 
	    
		//call post text inline style
		$limited_style_wrapper = limited_post_text_inline_style($atts);
		$full_style_wrapper = full_post_text_inline_style($atts);
		$line_height_style =  feed_line_height($atts);
		/*---------------------read more text---------------------------*/
				$str_without_tag = strip_tags($my_post_text);
				$char_count = strlen($str_without_tag);
		
				if((!empty($atts['char_limit'])) && ($atts['char_limit'] < $char_count) )
				{
				$short_sentence = substr($str_without_tag, 0,$atts['char_limit']);
				
				$short_sentence = makeLinks ($short_sentence,$atts['link_target']);  // link the urls
	     	  	if(!preg_match('/((http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?)#(\w*[a-zA-Z_]+\w*)/',$short_sentence)) {
				$short_sentence = make_hash_link ($short_sentence,$atts['link_target']);
				}
				if (array_key_exists('message_tags',$mysinglefeed ))
				{
				foreach( $mysinglefeed->message_tags as $mymessagetag)// now add the hyperlink to tags 
					{ 
						$mymessagetagname = $mymessagetag[0]->name; 
						if($atts['link_target']==1)	{	
						$tag_link = '<a class="wff-link-tab" href="http://facebook.com/' . $mymessagetag[0]->id . '" style="color: red;" target="_blank">' . $mymessagetag[0]->name . '</a>';
						} else {
						$tag_link = '<a class="wff-link-tab" href="http://facebook.com/' . $mymessagetag[0]->id . '" style="color: red;" >' . $mymessagetag[0]->name . '</a>';
						}
						$short_sentence = str_replace($mymessagetagname, $tag_link, $short_sentence);
					}
				} 
				
				$mytext = '<p class = "wff-post-text" '.$limited_style_wrapper.'>'.$short_sentence.'...<span><a  class="wff-more-link">'.$atts['read_more'].'</a></span></p>';	
				$mytext .= '<p class="more-content" '.$full_style_wrapper.'>'.$my_post_text.'...<span><a  class="wff-less-link" style="display:none">'.$atts['read_less'].'</a></span></p>';
				} 
				else{
				$mytext = '<p class = "wff-post-text" '.$limited_style_wrapper.'>'.$my_post_text.'</p>';
				}
		/*------------------------------------------------*/
		if(isset($mysinglefeed->description)){
		if($atts['link_target']==1)	{	
		$build_link_title = '<p class = "wff-link-title" '.$line_height_style.'><a class="wff-link-tab" target="_blank" href =' .$name_url.'>'.$name_var.'</a></p>'; 
	    } else {
		$build_link_title = '<p class = "wff-link-title" '.$line_height_style.'><a class="wff-link-tab" href =' .$name_url.'>'.$name_var.'</a></p>';
		}	
	   	$mytext .= '<div class = "wff-shared-link-wrapper">'.$build_link_title.'<p class = "wff-post-description" '.$line_height_style.'>'.$link_post_desc.'</p></div>';
	    }
		
		//$mytext .= $build_post_desc_html ;
		if($atts['link_target']==1)	{
	    $mytext .=  '<div class = "wff-view-on-facebook"><a class="wff-link-tab" href = '. $post_resource_link.' target = "_blank">'.$atts['page_link_text'].'</a></div>';
		} else {
		$mytext .=  '<div class = "wff-view-on-facebook"><a class="wff-link-tab" href = '. $post_resource_link.' >'.$atts['page_link_text'].'</a></div>';
		}
 	return $mytext; 
}
// function: to calculate difference b/w current time and post updated time in different time units.
function posted_time($time)
{
	$time = time() - $time; // to get the time since that moment

    $time_units = array (
        31536000 => 'year',
        2592000 => 'month',
        604800 => 'week',
        86400 => 'day',
        3600 => 'hour',
        60 => 'minute',
        1 => 'second'
    );

    foreach ($time_units as $unit => $text) {
        if ($time < $unit) continue;
        $numberOfUnits = floor($time / $unit);
        return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'s':'');
    }

}
function build_author_html($mysinglefeed,$atts) 
{
	// Check if we need to apply inline styles 
	//Author
	$wff_author_inline_style = 'style="';
    if ( !empty($atts['author_text_size']) && $atts['author_text_size'] != 'inherit' ) $wff_author_inline_style .=  'font-size:' . $atts['author_text_size'] . 'px; line-height:' . $atts['author_text_size'] . 'px; ';
	if ( !empty($atts['line_height']) && $atts['line_height'] != 'inherit' ) $wff_author_inline_style .=  'line-height:' . $atts['line_height'].'px;';
    if ( !empty($atts['author_text_color']) ) $wff_author_inline_style .= 'color:' .$atts['author_text_color'] . ';';
    $wff_author_inline_style .= '"';
	
	//img border size and color style
	$wff_author_image_style = 'style="';
    if ( !empty($atts['author_img_border']) && $atts['author_img_border'] != 'none' ) $wff_author_image_style .=  'border:' . $atts['author_img_border'] . 'px solid ';
    if ( !empty($atts['author_text_color']) ) $wff_author_image_style .= $atts['author_text_color'] .';';
    $wff_author_image_style .= '"';
	
	$link_to_page = 'https://facebook.com/'.$atts['page_id'];
	
	// get update date
	$time = strtotime($mysinglefeed->updated_time);
	
	//condition for date format
	if($atts['author_date_format']=='default'){
	$post_date_print = 'posted '.posted_time($time).' ago';
	}
	else{
	$system_date_format = $atts['author_date_format'];
	$post_date_print = date_i18n($system_date_format,$time);
	}

	$authorname = '<div class = "wff-author-name"><p '.$wff_author_inline_style.' >'. $mysinglefeed->from->name . '</p><p class = "wff-date">'.$post_date_print.'</p></div>';

	$authorimage = '<div class = "wff-author-image"><img '.$wff_author_image_style.' src = https://graph.facebook.com/' . $mysinglefeed->from->id . '/picture?type=square></div>';

	$authortext = '<div class = "wff-fb-author-data"  ><div class="wff-row">
				<div class="wff-facebook-feed-image-div">'.$authorimage.'</div>
				<div class="wff-facebook-feed-title-div">'.$authorname.'</div>
				</div></div><div class="cleafix"></div>';
	
	if($atts['link_target']==1){
	$authortext = '<a class="wff-link-tab" href ='. $link_to_page .' target="_blank" >'.$authortext.'</a>';
	} else {
	$authortext = '<a class="wff-link-tab" href ='. $link_to_page .'>'.$authortext.'</a>';
	}
	$authortext = '<div class = "wff-author-wrapper">'.$authortext.'</div>';
	
	return $authortext; 
}

//add easy facebook feed shortcode
add_shortcode('facebook-feed','wff_shortcode_display');

function wff_shortcode_display ($atts) {
	
	if(!function_exists('wff_custom_js_code')) {
	add_action( 'wp_footer', 'wff_custom_js_code' );
	function wff_custom_js_code() {
	
	$custom_js_setting = get_option ('wff_design_settings');
	$custom_js = ($custom_js_setting['wff_custom_js_data']) ? $custom_js_setting['wff_custom_js_data'] : '' ;
    $custom_js_snippet = isset($custom_js) ? $custom_js : '';

	echo '<script type="text/javascript">';
    if( !empty($custom_js_snippet) ) echo stripslashes($custom_js_snippet);
    echo '</script>';
	}
	}
	
	// add custom styles
	if(!function_exists('wff_custom_css_code')) {
	add_action( 'wp_footer', 'wff_custom_css_code' );
	function wff_custom_css_code() {
		$custom_css_setting = get_option ('wff_design_settings');
		$custom_css = ($custom_css_setting['wff_custom_css_data']) ? $custom_css_setting['wff_custom_css_data'] : '' ;
		$custom_css_snippet = isset($custom_css) ? stripslashes($custom_css) : '';
		echo '<style type="text/css">'.$custom_css_snippet.'</style>';
	}
	}
	// enqueue script for character count 
	if(!function_exists('wff_load_custom_scripts')) {
	add_action( 'wp_footer', 'wff_load_custom_scripts' );
	function wff_load_custom_scripts() {
		wp_register_script( 'wff_custom_js', plugin_dir_url( __FILE__ ) . 'js/text-count.js',array('jquery'), false, true );
		wp_enqueue_script ('wff_custom_js');
	}
	}
	if(!function_exists('add_my_stylesheet')) {
	add_action( 'wp_footer', 'add_my_stylesheet' );
	function add_my_stylesheet() {
		wp_register_style( 'wff-mystyle', plugins_url('css/style.css', __FILE__) );
		wp_enqueue_style( 'wff-mystyle' );
	}
	}
	//default app token
	$design_setting_array = get_option ('wff_design_settings');
	$general_setting_array = get_option ('wff_general_settings');

	$all_array =array(
	'page_id' => get_option('wff_page_id') ? get_option('wff_page_id') : '',
	'wff_post_limit' => ($general_setting_array['wff_num_posts']) ? $general_setting_array['wff_num_posts'] : '',
	'cache_time' => ($general_setting_array['wff_cache_time']) ? $general_setting_array['wff_cache_time'] : '',
	'link_target' => ($general_setting_array['wff_link_target']) ? 1 : 0,
	
	'author_date_format' => (get_option('wff_author_date')) ? get_option('wff_author_date') : '',
	'author_text_size' => ($design_setting_array['wff_author_text_size']) ? $design_setting_array['wff_author_text_size'] : '',
	'line_height' => ($design_setting_array['wff_line_height']) ? $design_setting_array['wff_line_height'] : '',
	'author_text_color' => ($design_setting_array['wff_author_text_color']) ? $design_setting_array['wff_author_text_color'] : '',
	'author_img_border' => ($design_setting_array['wff_img_border']) ? $design_setting_array['wff_img_border'] : '',
	'feed_seprator' => ($design_setting_array['wff_feed_seprator']) ? $design_setting_array['wff_feed_seprator'] : '',
	
	'char_limit' => ($design_setting_array['wff_char_limit']) ? $design_setting_array['wff_char_limit'] : '',
	'post_text_color' => ($design_setting_array['wff_text_color']) ? $design_setting_array['wff_text_color'] : '',
	'post_background' => ($design_setting_array['wff_post_back_color']) ? $design_setting_array['wff_post_back_color'] : '',
	'post_text_weight' => ($design_setting_array['wff_text_weight']) ? $design_setting_array['wff_text_weight'] : '',
	'post_text_size' => ($design_setting_array['wff_text_size']) ? $design_setting_array['wff_text_size'] : '',
	'post_text_align' => ($design_setting_array['wff_text_align']) ? $design_setting_array['wff_text_align'] : '',
	
	'page_link_text' => ($design_setting_array['wff_page_link_text']) ? $design_setting_array['wff_page_link_text'] : '',
	'read_more' => ($design_setting_array['wff_read_more_text']) ? $design_setting_array['wff_read_more_text'] : '',
	'read_less' => ($design_setting_array['wff_read_less_text']) ? $design_setting_array['wff_read_less_text'] : '',
	);
	
	$atts = shortcode_atts($all_array,$atts,'facebook-feed');

	extract($atts);
   
	// Get the Page ID
	if( empty($page_id) ) 
	{ 
 	$error_message = '<p style = "color:red;" > Please enter valid Facebook Page ID</p>';  // error if a user does not enter page id
 	return $error_message ;
	}

	$wff_app_token=array('1505917499687703|2133Lp1cLt6Zk0N2por8X8QJf9k',
	                     '393872077427061|ghfVBzNUFnMdFLAGlJbWAOVOelI',
	                     '1377619605888926|LxwTNNAeRtn9nYhYS0VDkVDs0mI'); // We will provide support for user token in future updates

	$access_token = $wff_app_token[rand(0, 2)];
	
	 //initialise facepress object
	$wff_posts_json_url = 'https://graph.facebook.com/' . $page_id . '/posts?access_token=' . $access_token . '&limit=' . $wff_post_limit;

	if($cache_time == 'none') { 

	$feeddata = wff_fetchUrl($wff_posts_json_url);
	$feedjson = json_decode($feeddata);
	$fbfeed = $feedjson->data;  
}
	else {
	// this code runs when there is no valid transient set
    if ( false === ($feeddata = get_transient('fb_feed_query'))) {
    $feeddata = wff_fetchUrl($wff_posts_json_url);
    $feeddata = set_transient('fb_feed_query', $feeddata, $cache_time*60);
	$feeddata = get_transient('fb_feed_query');
	}
	$feedjson = json_decode($feeddata);
	$fbfeed = $feedjson->data;
}
	
	if( empty($fbfeed) ) 
	{ 
 	$error_message = '<p style = "color:red;" >Cannot Display Feed</p><p style = "color:red;"> Pls check if the Facebook page exists or not. </p>';  // To do display message as per the error code
 	return $error_message ;
	}

	// Start Building HTML
	$my_final_post_text = ''; 
	$my_final_post_text_item_wrapper = '';
	$my_final_post_text_item_wrapper_complete = '';

foreach ($fbfeed as $singlefeed)
{ 
	$my_final_post_text = ''; // this var will hold author data + post text + post desc.. We will wrap this var in item wrapper 

    $my_author_text = build_author_html($singlefeed,$atts);

	$what_is_post_type = $singlefeed->type; 
	
	if($what_is_post_type == 'link')
	{
	    $my_post_content_text = build_my_link_html ($singlefeed,$atts);
	}
	
	if ($what_is_post_type == 'photo')
	{
	    $my_post_content_text = build_my_photo_html($singlefeed,$atts);
	}	
	if($what_is_post_type == 'video')
	{
	    $my_post_content_text = build_my_video_html ($singlefeed,$atts);
	}
	  
	if($what_is_post_type == 'status')
	{
	    if (!empty($singlefeed->message))
	    {
	       	$my_post_content_text = build_my_status_html ($singlefeed,$atts);
	    }
	    // You will cehck if this post has a message. Likes and commnts etc are not to be displayed with the feed 
	}
	     
	if ($what_is_post_type == 'event')
	{ 
		$my_post_content_text = build_my_event_html ($singlefeed,$atts,$access_token);
	}

	//feed seprator inline style
	$wff_feed_seprator_style = 'style="';
    if ( !empty($feed_seprator) && $feed_seprator != 'none' ) $wff_feed_seprator_style .=  'border-bottom:' . $feed_seprator . 'px solid ';
    if ( !empty($author_text_color) ) $wff_feed_seprator_style .= $author_text_color .';';
    $wff_feed_seprator_style .= '"';
	
	// the final post text 
	$my_final_post_text .= $my_author_text.$my_post_content_text ; 
	
	switch ($what_is_post_type) {
	
	case 'link':
        $my_final_post_text_item_wrapper = '<div '.$wff_feed_seprator_style.' class = "wff-fb-item wff-fb-item-link" id ='.$singlefeed->id.'>'.$my_final_post_text.'</div>';
		$my_final_post_text_item_wrapper_complete .= $my_final_post_text_item_wrapper;
    break;
    	
	case 'status':
        $my_final_post_text_item_wrapper = '<div '.$wff_feed_seprator_style.' class = "wff-fb-item wff-fb-item-status" id ='.$singlefeed->id.'  >'.$my_final_post_text.'</div>';
		$my_final_post_text_item_wrapper_complete .= $my_final_post_text_item_wrapper;
    break;
    
	case 'event':
        $my_final_post_text_item_wrapper = '<div '.$wff_feed_seprator_style.' class = "wff-fb-item wff-fb-item-event" id ='.$singlefeed->id.'>'.$my_final_post_text.'</div>';
		$my_final_post_text_item_wrapper_complete .= $my_final_post_text_item_wrapper;
     break; 
    
	case 'video':
        $my_final_post_text_item_wrapper = '<div '.$wff_feed_seprator_style.' class = "wff-fb-item wff-fb-item-video" id ='.$singlefeed->id.'>'.$my_final_post_text.'</div>';
		$my_final_post_text_item_wrapper_complete .= $my_final_post_text_item_wrapper;
    break;
              
    case 'photo':
        $my_final_post_text_item_wrapper = '<div '.$wff_feed_seprator_style.' class = "wff-fb-item wff-fb-item-photo" id ='.$singlefeed->id.'>'.$my_final_post_text.'</div>';
		$my_final_post_text_item_wrapper_complete .= $my_final_post_text_item_wrapper;
    break; 
              
    }
}
	$my_final_post_text = '<div class = "wff-feed-wrapper"><div id = "wff-id">'.$my_final_post_text_item_wrapper_complete.'</div></div>'; // Add a feed wrapper to the complete feed html

	// Return the complete html
	return $my_final_post_text;
}
?>