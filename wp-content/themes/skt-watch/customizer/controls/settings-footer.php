<?php


//============================FOOTER SECTION=================================

//Scroll To Top Button
$wp_customize->add_setting('complete[totop_id]', array(
	'type' => 'option',
	'default' => '1',
	'sanitize_callback' => 'complete_sanitize_checkbox',
	'transport' => 'postMessage',
) );
			$wp_customize->add_control( new complete_Controls_Toggle_Control( $wp_customize, 'totop_id', array(
				'label' => __('Scroll To Top Button','complete'),
				'description' => __( 'Turn On/Off The button that appears on bottom right when you scroll down to pages.', 'complete' ),
				'section' => 'footercolors_section',
				'settings' => 'complete[totop_id]',
			)) );


// Footer Background Color
$wp_customize->add_setting( 'complete[footer_color_id]', array(
	'type' => 'option',
	'default' => '#000000',
	'sanitize_callback' => 'sanitize_hex_color',
	'transport' => 'postMessage',
) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_color_id', array(
				'label' => __('Footer Background Color','complete'),
				'section' => 'footercolors_section',
				'settings' => 'complete[footer_color_id]',
			) ) );

// Footer Background Image
	$wp_customize->add_setting( 'complete[footer_bg_image]',array( 
		'type' => 'option',
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'footer_bg_image',array(
			'label'       => __( 'Footer Background Image', 'complete' ),
			'section'     => 'footercolors_section',
			'settings'    => 'complete[footer_bg_image]'
				)
			)
	);

//FOOTER Widget Text Color
$wp_customize->add_setting( 'complete[footwdgtxt_color_id]', array(
	'type' => 'option',
	'default' => '#838282',
	'sanitize_callback' => 'sanitize_hex_color',
	'transport' => 'postMessage',
) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footwdgtxt_color_id', array(
				'label' => __('Footer Text Color','complete'),
				'section' => 'footercolors_section',
				'settings' => 'complete[footwdgtxt_color_id]',
			) ) );


//FOOTER Widget Title Color
$wp_customize->add_setting( 'complete[footer_title_color]', array(
	'type' => 'option',
	'default' => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color',
	'transport' => 'postMessage',
) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_title_color', array(
				'label' => __('Footer Title Color','complete'),
				'section' => 'footercolors_section',
				'settings' => 'complete[footer_title_color]',
			) ) );
			
//Footer Info Box
$wp_customize->add_setting( 'complete[footer_infobox_bg_color]', array(
	'type' => 'option',
	'default' => '#000000',
	'sanitize_callback' => 'sanitize_hex_color',
	'transport' => 'postMessage',
) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_infobox_bg_color', array(
				'label' => __('Footer Info Box Background Color','complete'),
				'section' => 'footercolors_section',
				'settings' => 'complete[footer_infobox_bg_color]',
			) ) );
			
$wp_customize->add_setting( 'complete[footer_infobox_title_color]', array(
	'type' => 'option',
	'default' => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color',
	'transport' => 'postMessage',
) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_infobox_title_color', array(
				'label' => __('Footer Info Box Title Color','complete'),
				'section' => 'footercolors_section',
				'settings' => 'complete[footer_infobox_title_color]',
			) ) );	
			
$wp_customize->add_setting( 'complete[footer_infobox_content_color]', array(
	'type' => 'option',
	'default' => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color',
	'transport' => 'postMessage',
) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_infobox_content_color', array(
				'label' => __('Footer Info Box Content Color','complete'),
				'section' => 'footercolors_section',
				'settings' => 'complete[footer_infobox_content_color]',
			) ) );		
			
$wp_customize->add_setting( 'complete[footer_menu_color]', array(
	'type' => 'option',
	'default' => '#838282',
	'sanitize_callback' => 'sanitize_hex_color',
	'transport' => 'postMessage',
) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_menu_color', array(
				'label' => __('Footer Menu Color','complete'),
				'section' => 'footercolors_section',
				'settings' => 'complete[footer_menu_color]',
			) ) );
			
$wp_customize->add_setting( 'complete[footer_menu_hover_color]', array(
	'type' => 'option',
	'default' => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color',
	'transport' => 'postMessage',
) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_menu_hover_color', array(
				'label' => __('Footer Menu Hover Color','complete'),
				'section' => 'footercolors_section',
				'settings' => 'complete[footer_menu_hover_color]',
			) ) );
			
//FOOTER LAYOUT SELECT
$wp_customize->add_setting('complete[foot_layout_id]', array(
		'type' => 'option',
        'default' => '4',
		'sanitize_callback' => 'complete_sanitize_choices',
) );
 
			$wp_customize->add_control( new complete_Control_Radio_Image( $wp_customize, 'foot_layout_id', array(
					'type' => 'radio-image',
					'label' => __('Footer Layout','complete'),
					'section' => 'footercolors_section',
					'settings' => 'complete[foot_layout_id]',
					'choices' => array(
						'4' => array( 'url' => get_template_directory_uri().'/assets/images/foot-4-col.jpg', 'label' => 'Layout 4' ),				),
			) ));			
			
//----------------------Footer Columns 1----------------------------------
	$wp_customize->add_setting('complete[foot_cols1_title]', array(
		'type' => 'option',
		'default'	=> __('Get In Touch','complete'),
		'sanitize_callback' => 'wp_kses_post',
		'transport' => 'postMessage',
	) );
	$wp_customize->add_control(	new WP_Customize_Text_Control( $wp_customize, 'foot_cols1_title', array( 
		'type' => 'text',
		'label'	=> __('Columns 1 Title','complete'),
		'section' => 'footer_columns_section',
		'settings' => 'complete[foot_cols1_title]',
	)) );	
	
$wp_customize->add_setting('complete[foot_cols1_content]', array(
	'type' => 'option',
	'default' => '<p>Street 238,52 tempor <br> Donec ultricies mattis nulla, suscipit risus tristique ut.</p><div class="spacecode" id="" style="height:10px;"></div><p style="margin-bottom: 10px;"><span style="margin-right: 20px;">Phone:</span> 1.800.555.6789</p><p style="margin-bottom: 10px;"><span style="margin-right: 21px;">E-mail:</span> <a href="mailto:support@sitename.com">support@sitename.com</a></p><p style="margin-bottom: 10px;"><span style="margin-right: 11px;">Website:</span> <a href="https://www.sktthemes.net">sktthemes.net</a></p>',
	'sanitize_callback' => 'wp_kses_post',
	'transport' => 'postMessage',
) );
			$wp_customize->add_control(	new complete_Editor_Control( $wp_customize, 'foot_cols1_content', array( 
				'type' => 'editor',
				'label' => __('Columns 1 Content','complete'), 
				'section' => 'footer_columns_section',
				'settings' => 'complete[foot_cols1_content]',
			)) );	
 	 
//----------------------Footer Columns 1----------------------------------		

//----------------------Footer Columns 2----------------------------------
	$wp_customize->add_setting('complete[foot_cols2_title]', array(
		'type' => 'option',
		'default'	=> __('Our Services','complete'),
		'sanitize_callback' => 'wp_kses_post',
		'transport' => 'postMessage',
	) );
	$wp_customize->add_control(	new WP_Customize_Text_Control( $wp_customize, 'foot_cols2_title', array( 
		'type' => 'text',
		'label'	=> __('Columns 2 Title','complete'),
		'section' => 'footer_columns_section',
		'settings' => 'complete[foot_cols2_title]',
	)) );	
	
$wp_customize->add_setting('complete[foot_cols2_content]', array(
	'type' => 'option',
	'default' => '[footermenu menu="services"]',
	'sanitize_callback' => 'wp_kses_post',
	'transport' => 'postMessage',
) );
			$wp_customize->add_control(	new complete_Editor_Control( $wp_customize, 'foot_cols2_content', array( 
				'type' => 'editor',
				'label' => __('Columns 2 Content','complete'), 
				'section' => 'footer_columns_section',
				'settings' => 'complete[foot_cols2_content]',
			)) );	
 	 
//----------------------Footer Columns 2----------------------------------	

//----------------------Footer Columns 3----------------------------------
	$wp_customize->add_setting('complete[foot_cols3_title]', array(
		'type' => 'option',
		'default'	=> __('Navigation','complete'),
		'sanitize_callback' => 'wp_kses_post',
		'transport' => 'postMessage',
	) );
	$wp_customize->add_control(	new WP_Customize_Text_Control( $wp_customize, 'foot_cols3_title', array( 
		'type' => 'text',
		'label'	=> __('Columns 3 Title','complete'),
		'section' => 'footer_columns_section',
		'settings' => 'complete[foot_cols3_title]',
	)) );	
	
$wp_customize->add_setting('complete[foot_cols3_content]', array(
	'type' => 'option',
	'default' => '[footermenu menu="footer"]',
	'sanitize_callback' => 'wp_kses_post',
	'transport' => 'postMessage',
) );
			$wp_customize->add_control(	new complete_Editor_Control( $wp_customize, 'foot_cols3_content', array( 
				'type' => 'editor',
				'label' => __('Columns 3 Content','complete'), 
				'section' => 'footer_columns_section',
				'settings' => 'complete[foot_cols3_content]',
			)) );	
 	 
//----------------------Footer Columns 3----------------------------------	

//----------------------Footer Columns 4----------------------------------
	$wp_customize->add_setting('complete[foot_cols4_title]', array(
		'type' => 'option',
		'default'	=> __('Latest Posts','complete'),
		'sanitize_callback' => 'wp_kses_post',
		'transport' => 'postMessage',
	) );
	$wp_customize->add_control(	new WP_Customize_Text_Control( $wp_customize, 'foot_cols4_title', array( 
		'type' => 'text',
		'label'	=> __('Columns 4 Title','complete'),
		'section' => 'footer_columns_section',
		'settings' => 'complete[foot_cols4_title]',
	)) );	
	
$wp_customize->add_setting('complete[foot_cols4_content]', array(
	'type' => 'option',
	'default' => '[footerposts show="6"]',
	'sanitize_callback' => 'wp_kses_post',
	'transport' => 'postMessage',
) );
			$wp_customize->add_control(	new complete_Editor_Control( $wp_customize, 'foot_cols4_content', array( 
				'type' => 'editor',
				'label' => __('Columns 4 Content','complete'), 
				'section' => 'footer_columns_section',
				'settings' => 'complete[foot_cols4_content]',
			)) );	
 	 
//----------------------Footer Columns 4----------------------------------	

//----------------------Footer Info Box ----------------------------------
	// Footer Logo Image
	$wp_customize->add_setting( 'complete[footer_logo]',array( 
		'type' => 'option',
		'default' => ''.get_template_directory_uri().'/images/logo.png',
		'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'footer_logo',array(
			'label'       => __( 'Footer Info Box Top Logo Image', 'complete' ),
			'section'     => 'footer_infobox_section',
			'settings'    => 'complete[footer_logo]'
				)
			)
	);
	
	$wp_customize->add_setting('complete[footer_infobox_content]', array(
	'type' => 'option',
	'default' => '
[social_area]
	[social icon="facebook" link="#"]
	[social icon="twitter" link="#"]
	[social icon="google-plus" link="#"]
	[social icon="linkedin" link="#"]
	[social icon="pinterest" link="#"]
	[social icon="skype" link="#"]
[/social_area]
	',
	'sanitize_callback' => 'wp_kses_post',
	'transport' => 'postMessage',
) );
			$wp_customize->add_control(	new complete_Editor_Control( $wp_customize, 'footer_infobox_content', array( 
				'type' => 'editor',
				'label' => __('Footer Info Box Top Content','complete'), 
				'section' => 'footer_infobox_section',
				'settings' => 'complete[footer_infobox_content]',
			)) );
			
	$wp_customize->add_setting('complete[footer_infobox_bottom_title]', array(
		'type' => 'option',
		'default'	=> __('Our Newsletter','complete'),
		'sanitize_callback' => 'wp_kses_post',
		'transport' => 'postMessage',
	) );
	$wp_customize->add_control(	new WP_Customize_Text_Control( $wp_customize, 'footer_infobox_bottom_title', array( 
		'type' => 'text',
		'label'	=> __('Footer Info Box Bottom Title','complete'),
		'section' => 'footer_infobox_section',
		'settings' => 'complete[footer_infobox_bottom_title]',
	)) );	
			
	$wp_customize->add_setting('complete[footer_infobox_bottom_content]', array(
	'type' => 'option',
	'default' => '<form class="newsletter-form"><input placeholder="Enter your email" type="email"><input value="Subscribe" type="submit"></form>',
	'sanitize_callback' => 'wp_kses_post',
	'transport' => 'postMessage',
) );
			$wp_customize->add_control(	new complete_Editor_Control( $wp_customize, 'footer_infobox_bottom_content', array( 
				'type' => 'editor',
				'label' => __('Footer Info Box Bottom Content','complete'), 
				'section' => 'footer_infobox_section',
				'settings' => 'complete[footer_infobox_bottom_content]',
			)) );	
	
	
// Hide Section
	$wp_customize->add_setting('complete[hide_foot_infobox]',array(
			'type' => 'option',
			'default' => '0',
			'sanitize_callback' => 'complete_sanitize_checkbox',
			'transport' => 'postMessage',
	));	 

	$wp_customize->add_control( new complete_Controls_Toggle_Control( $wp_customize, 'hide_foot_infobox', array(
		'label' => __('Hide This Section','complete'),
		'section' => 'footer_infobox_section',
		'settings' => 'complete[hide_foot_infobox]',
	)) );	