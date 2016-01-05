<?php

function fb_wp_head() {
	global $wp_version;
	if ( isset( $_GET['page'] ) && "fb_box_settings" == $_GET['page'] )
	{
		wp_enqueue_script( 'fb_main_script', plugins_url( 'js/script.js', __FILE__ ) );
		wp_enqueue_style( 'tip_stylesheet', plugins_url( 'css/jquery.tooltip.css', __FILE__ ) );
		wp_enqueue_script( 'tip_script', plugins_url( 'js/jquery.tooltip.js', __FILE__ ) );
		wp_enqueue_script( 'tip_myscript', plugins_url( 'js/myscript.js', __FILE__ ) );
	}
	if ( $wp_version < 3.8 )
		wp_enqueue_style( 'fb_old_stylesheet', plugins_url( 'css/wp3.8_lesser.css', __FILE__ ) );
	else
		wp_enqueue_style( 'fb_current_stylesheet', plugins_url( 'css/style.css', __FILE__ ) );

}
	function fb_like_bx_settings_page() {
		$fb_like_bx_settings=get_option('fb_like_bx_options');
		$copy = false;
		$message = $error = "";
		$shortcode='';
		$plugin_info = get_plugin_data( __FILE__ );
		if ( isset( $_REQUEST['fb_form_submit'] ) && check_admin_referer( plugin_basename( __FILE__ ), 'fb_nonce' ) ) {
				$options['streams']	=$_REQUEST['streams'];
				$options['borderdisp']=$_REQUEST['borderdisp'];
				$options['colorScheme']=$_REQUEST['colorScheme'];
				$options['showFaces']	=$_REQUEST['showFaces'];
				$options['header']=	$_REQUEST['header'];
				$options['lang']=	$_REQUEST['lang'];
				fb_like_bx_update_options($options);
				$fb_like_bx_settings=get_option('fb_like_bx_options');
		}
		?>
		<div class="fb_like_bx_wrap">
			<div class="icon32 icon32-bws" id="icon-options-general"></div>
			
			
			<div class="postbox settings_wrap left">
			
			<h3 class="hndle" style="padding:10px;">Facebook Like Box Settings</h3>
			<div class="inside">
			<div class="updated fade" <?php if ( empty( $message ) || "" != $error ) echo "style=\"display:none\""; ?>><p><strong><?php echo $message; ?></strong></p></div>
			<div id="fb_admin_notice" class="updated fade" style="display:none"><p><strong>Notice:</strong> Plugin's settings have been changed. To save them please click the 'Save Changes' button before navigating away the page.</p></div>
			<div class="error" <?php if ( "" == $error ) echo "style=\"display:none\""; ?>><p><strong><?php echo $error; ?></strong></p></div>
			
			<?php if ( ! isset( $_GET['action'] ) ) { ?>
				<form name="form1" method="post" action="" enctype="multipart/form-data" id="fcbkbttn_settings_form">
					<table class="form-table">
					
						<tr>
							<th>
								Show Posts:
							</th>
							<td>
							<div class="cmb_radio_inline"><div class="cmb_radio_inline_option">
							<input type="radio" name="streams" id="streams1" value="yes" <?php if(isset($fb_like_bx_settings['streams']) && $fb_like_bx_settings['streams']=="yes"){echo 'checked="checked"';}?>><label for="streams1">Yes</label></div>
							<div class="cmb_radio_inline_option"><input type="radio" name="streams" id="streams2" value="no" <?php if(isset($fb_like_bx_settings['streams']) && $fb_like_bx_settings['streams']=="no"){echo 'checked';}?>><label for="streams2">No</label></div>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<img border="0"  class="tip" value="Tipisset( $_REQUEST['fb_form_submit'] )" src="<?php echo plugins_url( 'images/help.png', __FILE__ )?>" title="Specifies whether to display a stream of the latest posts by the Page.">
							</div>
							</td>
						</tr>
						<tr>
						<tr>
							<th>
								Colour Scheme:
							</th>
							<td>
							<div class="cmb_radio_inline"><div class="cmb_radio_inline_option">
							<input type="radio" name="colorScheme" id="colorScheme1" value="light" <?php if(isset($fb_like_bx_settings['colorScheme']) && $fb_like_bx_settings['colorScheme']=="light"){echo 'checked';}?>><label for="colorScheme1">Light</label></div>
							<div class="cmb_radio_inline_option"><input type="radio" name="colorScheme" id="colorScheme2" value="dark" <?php if(isset($fb_like_bx_settings['colorScheme']) && $fb_like_bx_settings['colorScheme']=="dark"){echo 'checked';}?>><label for="colorScheme2">Dark</label></div>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<img border="0"  class="tip" value="Tip" src="<?php echo plugins_url( 'images/help.png', __FILE__ )?>" title="The color scheme used by the plugin. Can be 'light' or 'dark'.">
							</div>
							</td>
						</tr>
						<tr>
							<th>
								Show Border:
							</th>
							<td>
							<div class="cmb_radio_inline"><div class="cmb_radio_inline_option">
							<input type="radio" name="borderdisp" id="borderdisp1" value="yes" <?php if(isset($fb_like_bx_settings['borderdisp']) && $fb_like_bx_settings['borderdisp']=="yes"){echo 'checked';}?>><label for="borderdisp1">Yes</label></div>
							<div class="cmb_radio_inline_option"><input type="radio" name="borderdisp" id="borderdisp2" value="no" <?php if(isset($fb_like_bx_settings['borderdisp']) && $fb_like_bx_settings['borderdisp']=="no"){echo 'checked';}?>><label for="borderdisp2">No</label></div>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<img border="0"  class="tip" value="Tip" src="<?php echo plugins_url( 'images/help.png', __FILE__ )?>" title="Specifies whether or not to show a border around the plugin.">
							</div>
							</td>
						</tr>
						
						<tr>
							<th>
								Show Friends' Faces :
							</th>
							<td>
							<div class="cmb_radio_inline"><div class="cmb_radio_inline_option">
							<input type="radio" name="showFaces" id="showFaces1" value="yes" <?php if(isset($fb_like_bx_settings['showFaces']) && $fb_like_bx_settings['showFaces']=="yes"){echo 'checked';}?>><label for="showFaces1">Yes</label></div>
							<div class="cmb_radio_inline_option"><input type="radio" name="showFaces" id="showFaces2" value="no"  <?php if(isset($fb_like_bx_settings['showFaces']) && $fb_like_bx_settings['showFaces']=="no"){echo 'checked';}?>><label for="showFaces2">No</label></div>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<img border="0"  value="Tip" class="tip" src="<?php echo plugins_url( 'images/help.png', __FILE__ )?>" title="Specifies whether to display profile photos of people who like the page.">
							</div>
							</td>
						</tr>
						<tr>
							<th>
								Show Header:
							</th>
							<td>
							<div class="cmb_radio_inline"><div class="cmb_radio_inline_option">
							<input type="radio" name="header" id="header1" value="yes" <?php if(isset($fb_like_bx_settings['header']) && $fb_like_bx_settings['header']=="yes"){echo 'checked';}?>><label for="header1">Yes</label></div>
							<div class="cmb_radio_inline_option"><input type="radio" name="header" id="header2" value="no" <?php if(isset($fb_like_bx_settings['header']) && $fb_like_bx_settings['header']=="no"){echo 'checked';}?>><label for="header2">No</label></div>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<img border="0"  value="Tip" class="tip" title="Specifies whether to display the Facebook header at the top of the plugin." src="<?php echo plugins_url( 'images/help.png', __FILE__ )?>" title="Show the 'Find Us on Facebook' header on the plugin">
							</div>
							</td>
						</tr>
						
						<tr>
							<th>
								Select Your Language:
							</th>
							<td>
							<div class="cmb_radio_inline"><div class="cmb_radio_inline_option">
							
							<?php $lang=array();
								$lang['af_ZA']='Afrikaans';
								$lang['sq_AL']='Albanian';
								$lang['ar_AR']='Arabic';
								$lang['hy_AM']='Armenian';
								$lang['ay_BO']='Aymara';
								$lang['az_AZ']='Azeri';
								$lang['eu_ES']='Basque';
								$lang['be_BY']='Belarusian';
								$lang['bn_IN']='Bengali';
								$lang['bs_BA']='Bosnian';
								$lang['bg_BG']='Bulgarian';
								$lang['ca_ES']='Catalan';
								$lang['ck_US']='Cherokee';
								$lang['hr_HR']='Croatian';
								$lang['cs_CZ']='Czech';
								$lang['da_DK']='Danish';
								$lang['nl_NL']='Dutch';
								$lang['nl_BE']='Dutch (Belgi?)';
								$lang['en_GB']='English (UK)';
								$lang['en_PI']='English (Pirate)';
								$lang['en_UD']='English (Upside Down)';
								$lang['en_US']='English (US)';
								$lang['eo_EO']='Esperanto';
								$lang['et_EE']='Estonian';
								$lang['fo_FO']='Faroese';
								$lang['tl_PH']='Filipino';
								$lang['fi_FI']='Finnish';
								$lang['fb_FI']='Finnish (test)';
								$lang['fr_CA']='French (Canada)';
								$lang['fr_FR']='French (France)';
								$lang['gl_ES']='Galician';
								$lang['ka_GE']='Georgian';
								$lang['de_DE']='German';
								$lang['el_GR']='Greek';
								$lang['gn_PY']='Guaran?';
								$lang['gu_IN']='Gujarati';
								$lang['he_IL']='Hebrew';
								$lang['hi_IN']='Hindi';
								$lang['hu_HU']='Hungarian';
								$lang['is_IS']='Icelandic';
								$lang['id_ID']='Indonesian';
								$lang['ga_IE']='Irish';
								$lang['it_IT']='Italian';
								$lang['ja_JP']='Japanese';
								$lang['jv_ID']='Javanese';
								$lang['kn_IN']='Kannada';
								$lang['kk_KZ']='Kazakh';
								$lang['km_KH']='Khmer';
								$lang['tl_ST']='Klingon';
								$lang['ko_KR']='Korean';
								$lang['ku_TR']='Kurdish';
								$lang['la_VA']='Latin';
								$lang['lv_LV']='Latvian';
								$lang['fb_LT']='Leet Speak';
								$lang['li_NL']='Limburgish';
								$lang['lt_LT']='Lithuanian';
								$lang['mk_MK']='Macedonian';
								$lang['mg_MG']='Malagasy';
								$lang['ms_MY']='Malay';
								$lang['ml_IN']='Malayalam';
								$lang['mt_MT']='Maltese';
								$lang['mr_IN']='Marathi';
								$lang['mn_MN']='Mongolian';
								$lang['ne_NP']='Nepali';
								$lang['se_NO']='Northern S?mi';
								$lang['nb_NO']='Norwegian (bokmal)';
								$lang['nn_NO']='Norwegian (nynorsk)';
								$lang['ps_AF']='Pashto';
								$lang['fa_IR']='Persian';
								$lang['pl_PL']='Polish';
								$lang['pt_BR']='Portuguese (Brazil)';
								$lang['pt_PT']='Portuguese (Portugal)';
								$lang['pa_IN']='Punjabi';
								$lang['qu_PE']='Quechua';
								$lang['ro_RO']='Romanian';
								$lang['rm_CH']='Romansh';
								$lang['ru_RU']='Russian';
								$lang['sa_IN']='Sanskrit';
								$lang['sr_RS']='Serbian';
								$lang['zh_CN']='Simplified Chinese (China)';
								$lang['sk_SK']='Slovak';
								$lang['sl_SI']='Slovenian';
								$lang['so_SO']='Somali';
								$lang['es_LA']='Spanish';
								$lang['es_CL']='Spanish (Chile)';
								$lang['es_CO']='Spanish (Colombia)';
								$lang['es_MX']='Spanish (Mexico)';
								$lang['es_ES']='Spanish (Spain)';
								$lang['sv_SE']='Swedish';
								$lang['sy_SY']='Syriac';
								$lang['tg_TJ']='Tajik';
								$lang['ta_IN']='Tamil';
								$lang['tt_RU']='Tatar';
								$lang['te_IN']='Telugu';
								$lang['th_TH']='Thai';
								$lang['zh_HK']='Traditional Chinese (Hong Kong)';
								$lang['zh_TW']='Traditional Chinese (Taiwan)';
								$lang['tr_TR']='Turkish';
								$lang['uk_UA']='Ukrainian';
								$lang['ur_PK']='Urdu';
								$lang['uz_UZ']='Uzbek';
								$lang['vi_VN']='Vietnamese';
								$lang['cy_GB']='Welsh';
								$lang['xh_ZA']='Xhosa';
								$lang['yi_DE']='Yiddish';
								$lang['zu_ZA']='Zulu';
							?>
							<select name="lang">
							<?php foreach($lang as $key=>$val)
							{
								$selected='';
								if($fb_like_bx_settings['lang']==$key)
									$selected="selected";
									echo '<option value="'.$key.'" '.$selected.' >'.$val.'</option>';
								
							}
								?>
							</select><img border="0"  value="Tip" class="tip" title="Select the language for Facebook Fanbox" src="<?php echo plugins_url( 'images/help.png', __FILE__ )?>" title="Show the 'Find Us on Facebook' header on the plugin">
							</div>
							</td>
						</tr>
						
						<tr>
							<td colspan="2">
								<input type="hidden" name="fb_form_submit" value="submit" />
								<input type="submit" class="button-primary" value="Save Changes" />
							</td>
						</tr>
					</table>
					<?php wp_nonce_field( plugin_basename( __FILE__ ), 'fb_nonce' ); ?>
				</form>
				<?php } ?>
				</div>
				</div>
				<div class="postbox right ads_bar">
			<h3 class="hndle" style="padding:10px;"><span>Follow Us</span></h3>
			<div class="inside">
			Please take the time to let us and others know about your experiences by leaving a review, so that we can improve the plugin for you and other users.
<br/>
<h4>Want More?</h4>
If You Want more functionality or some modifications, just drop us a line what you want and We will try to add or modify the plugin functions.
			
			</div>
			</div>
		</div>
		<div class="clear"></div>
		<div class="postbox">
			<h3 class="hndle" style="padding:10px;"><span>ShortCode</span></h3>
			<div class="inside">
			You can use this shortcode in your code, where you want to display this Facebook Fanbox.
<br/>	
<br>	
<?php
$shortcode='';
		
$shortcode='[facebook_fanbox  href=""  appid=""  language=""  width=""  height=""  colorscheme=""  showfaces=""  header=""  stream=""  showborder="" ]';

echo $shortcode;
?>
<br><br>
You can edit these parameter according self in shortcode and use.<br><br>
<p>
href = Give your valid Facebook Pageurl like www.facebook.com/example. <br>
appid = Give your valid Facebook AppId. <br>
language = Give language code. <br>
width = Give the width. <br>
height = Give the height. <br>
colorscheme = Give one of these value : dark,light <br>
showfaces = Give one of these value : true,false <br>
header = Give one of these value : true,false <br>
stream = Give one of these value : true,false <br>
showborder = Give one of these value : true,false <br> 
</p>
			</div>
			</div>
	<?php }
	function fb_like_bx_update_options($data) {
		update_option( 'fb_like_bx_options', $data );
	}
	function fb_admin_init_menu() {
		add_menu_page( 'VIVA Plugins', 'VIVA Plugins', 'manage_options', 'viva_plugins', 'fb_like_bx_settings_page', '', 1001 );
		add_submenu_page( 'viva_plugins','Facebook FanBox Settings','Facebook FanBox', 'manage_options', "fb_box_settings", 'fb_like_bx_settings_page' );
	}
	
	
// The shortcode callback
function facebook_generate_code( $atts ) {
      $content='';
     extract( shortcode_atts( array(
 	      'href' => '',
 	      'appid' => '',
 	      'language' => 'en_US',
 	      'width' => '250',
 	      'height' => '260',
 	      'colorscheme' => 'dark',
 	      'showfaces' => 'true',
 	      'header' => 'true',
 	      'stream' => 'false',
 	      'showborder' => 'true'
      ), $atts) );
      
      	
		echo '<div id="fb-root"></div>
		<script>(function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
		js.src = "//connect.facebook.net/'.$language.'/all.js#xfbml=1&appId='.$appid.'";fjs.parentNode.insertBefore(js, fjs);}(document, \'script\', \'facebook-jssdk\'));</script>';
		$content = "<fb:like-box href=\"$href\" width=\"$width\" height=\"$height\" show_faces=\"$showfaces\" border_color=\"$showborder\" stream=\"$stream\" header=\"$header\" data-colorscheme=\"$colorscheme\" data-show-border=\"$showborder\"></fb:like-box>";
	
	
    return $content;
}
add_shortcode( 'facebook_fanbox', 'facebook_generate_code' );
	
add_action( 'admin_menu', 'fb_admin_init_menu' );
add_action( 'wp_enqueue_scripts', 'fb_wp_head' );
add_action( 'admin_enqueue_scripts', 'fb_wp_head' );
?>