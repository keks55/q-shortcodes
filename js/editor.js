(function() {
	tinymce.PluginManager.add( 'q_btn', function( editor, url ) {
		editor.addButton( 'q_btn', {
			title: 'Shortcodes',
			type: 'menubutton',
			icon:  'icon q',
			menu: [
				{
					text: 'Columns',
					menu: [
						{	text: 'q12 - 100%',  onclick: function( e ) { editor.insertContent('[q12]Column 100%[/q12]'); } }, 
						{	text: 'q11 - 91.66%',onclick: function( e ) { editor.insertContent('[q11]Column 91.66%[/q11]'); } },  
						{	text: 'q10 - 83.33%',onclick: function( e ) { editor.insertContent('[q10]Column 83.33%[/q10]'); } }, 
						{	text: 'q9 - 75%',    onclick: function( e ) { editor.insertContent('[q9]Column 66.66%[/q9]'); } }, 
						{	text: 'q8 - 66.66%', onclick: function( e ) { editor.insertContent('[q8]Column 66.66%[/q8]'); } }, 
						{	text: 'q7 - 58.33%', onclick: function( e ) { editor.insertContent('[q7]Column 50%[/q7]'); } },   
						{	text: 'q6 - 50%',    onclick: function( e ) { editor.insertContent('[q6]Column 50%[/q6]'); } },    
						{	text: 'q5 - 41.66%', onclick: function( e ) { editor.insertContent('[q5]Column 41.66%[/q5]'); } },  
						{	text: 'q4 - 33.33%', onclick: function( e ) { editor.insertContent('[q4]Column 33.33%[/q4]'); } },  
						{	text: 'q3 - 25%',    onclick: function( e ) { editor.insertContent('[q3]Column 25%[/q3]');  } },    
						{	text: 'q2 - 16.66%', onclick: function( e ) { editor.insertContent('[q2]Column 16.66%[/q2]');  } }, 
						{	text: 'q1 - 8.33%',  onclick: function( e ) { editor.insertContent('[q1]Column 8.33%[/q1]');  } }, 
						{	text: 'q - width auto',  onclick: function( e ) { editor.insertContent('[q]Column width auto[/q]');  } }, 
					]
				}, // end columns
				{
					text: 'Blocks',
					menu: [
						{	
							text: 'Service',
							onclick: function() {
								editor.windowManager.open( {
									title: 'Add Service Block',
									body: [			
										{	
											type: 'textbox',
											name: 'service_title',
											label: 'Block Text',
											value: '<h3>Service title example</h3>'
										},		
										{
											type: 'textbox',
											name: 'service_text',
											label: 'Options',
											value: '<li>Lorem ipsum dolor sit amet</li><li>Lorem ipsum dolor sit amet</li><li>Lorem ipsum dolor sit amet</li><li>Lorem ipsum dolor sit amet</li><li>Lorem ipsum dolor sit amet</li><li>Lorem ipsum dolor sit amet</li>',
											multiline: true,
											minWidth: 300,
											minHeight: 200
										},
										{	
											type: 'textbox',
											name: 'service_url',
											label: 'Button URL',
											value: 'https://wordpress.org'
										},
										{	
											type: 'textbox',
											name: 'text',
											label: 'Button text',
											value: 'read more'
										},
										{	
											type: 'listbox',
											name: 'btn_target',
											label: 'Button Target',
											values: [
												{ 
													text: 'self', 
													value: '_self' 
												},
												{ 
													text: 'blank', 
													value: '_blank' 
												}
											]
										},
									],
									onsubmit: function( e ) {
									editor.insertContent('[q_service url="' + e.data.service_url + '" target="' + e.data.btn_target + '" btn_text="' + e.data.text + '"]' + e.data.service_title + e.data.service_text +  '[/q_service]');
									}
								});
							}
						}, // end service block
						{	
							text: 'Icons',
							onclick: function() {
								editor.windowManager.open( {
									title: 'Add Icon Block',
									body: [			
										{	
											type: 'textbox',
											name: 'icon',
											label: 'Ionicons or FontAwesome class',
											value: 'ion-flag'
										},
										{	
											type: 'textbox',
											name: 'notice',
											label: 'Notice: You can view all Ionicons classes by link',
											value: 'http://keksus.com/demo/ionicons/ '
										},
										{
											type: 'textbox',
											name: 'icon_text',
											label: 'Text',
											value: '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam eleifend mauris turpis. Nam a dolor quis odio mattis feugiat sit amet a arcu. Suspendisse potenti. Curabitur ipsum arcu, laoreet ut condimentum in, malesuada quis lectus. Ut et congue elit. Vivamus lacus mi, egestas id mauris at, finibus euismod ipsum. Maecenas facilisis mauris eu massa volutpat comodo.</p>',
											multiline: true,
											minWidth: 300,
											minHeight: 250
										},
									],
									onsubmit: function( e ) {
									editor.insertContent('[q_icon class="' + e.data.icon + '"]' + e.data.icon_text +  '[/q_icon]');
									}
								});
							}
						}, // end icons block
						{
							text: 'Toggle',
							onclick: function() {
								editor.insertContent('[q_Toggle title="Toggle title text"] Sample toggle text [/q_Toggle]');
							}
						}, // end tabs block
						{
							text: 'Tabs',
							onclick: function() {
								editor.insertContent('[q_tabs][q_tab id="1" name="Tab 1"] Sample tab1 text [/q_tab][q_tab id="2" name="Tab 2"] Sample tab2 text [/q_tab][q_tab id="3" name="Tab 3"] Sample tab3 text [/q_tab][/q_tabs]');
							}
						}, // end tabs block
						{
							text: 'Clear',
							onclick: function() {
								editor.insertContent('[q_clear]');
							}
						},
					] 
				},
				{	
					text: 'Button',
					onclick: function() {
						editor.windowManager.open( {
							title: 'Add Button',
							body: [			
								{	// button text
									type: 'textbox',
									name: 'btn_text',
									label: 'Button Text',
									value: 'Button text'
								},		
								{	// button url
									type: 'textbox',
									name: 'btn_url',
									label: 'Button URL',
									value: 'https://wordpress.org'
								},
								{	// button icon
									type: 'textbox',
									name: 'btn_icon',
									label: 'Icon (Ionicons or FontAwesome class)',
									value: ''
								},
								{	
									type: 'textbox',
									name: 'notice',
									label: 'Notice: View all Ionicons classes here',
									value: 'http://keksus.com/demo/ionicons/ '
								},
								{	// button target
									type: 'listbox',
									name: 'btn_target',
									label: 'Button Target',
									values: [
										{ 
											text: 'self', 
											value: '_self' 
										},
										{ 
											text: 'blank', 
											value: '_blank' 
										}
									]
								},
							],
							onsubmit: function( e ) {
							editor.insertContent('[q_button url="' + e.data.btn_url + '" icon="' + e.data.btn_icon + '" target="' + e.data.btn_target + '" ]' + e.data.btn_text + '[/q_button]');
							}
						});
					}
				}, // end default button
				{
					text: 'Divider line',
					onclick: function() {
						editor.insertContent('[q_divider]');
					}
				},  
			] // end menu
		});
	});
})();