<script type="text/javascript">
    idi.setUpLoginOutPanel = function () {
        var myPanel = fluid.slidingPanel(idi.selectors.loginContainer, {
            selectors: {
                panel: idi.selectors.loginPanel,
                toggleButton: idi.selectors.loginToggleBtn
            },
            strings: {
                <?php if ( is_user_logged_in() ) {
                    echo 'showText: "Logout", hideText: "Logout"';              
                } else {
                    echo 'showText: "Login", hideText: "Login"';
                }?>
            },
            listeners: {
                onPanelShow: function () {
                    // close UIO panel if it was open
                    idi.closeOpenedPanel($(idi.selectors.UIOiFrame), $(idi.selectors.UIOToggleButton));
                    
                    <?php if ($_GET['idilogout'] == "true"): ?>
						$(idi.selectors.loginForm).show();
				 		$(idi.selectors.logoutText).hide();                    
				 	<?php endif; ?>	
                }
            }
        });              

		<?php if ($_GET['idilogout'] == "true"): ?>		//Logout has reloaded page, open panel with logout confirmation
			$(idi.selectors.loginPanel).show();
        	$(idi.selectors.logoutText).show(); 
        	myPanel.model.isShowing = true;  
        	      
		<?php elseif ($_GET['idilogin'] == "failed"): ?>//Login errors, open panel with login form and errors
        	$(idi.selectors.loginPanel).show();
        	$(idi.selectors.loginForm).show();
			myPanel.model.isShowing = true;        	         	
        	
        <?php else: ?>									//Default behaviour
	        $(idi.selectors.loginPanel).hide();
    	    $(idi.selectors.loginForm).show();    	    
        <?php endif; ?>  
    	
    	
    	//Events      	                    
		$('.idi-logout').on('keypress mousedown', function() { //Logout button
				$(idi.selectors.loginPanel).hide();                                   
	            $(idi.selectors.loginForm).hide();           
        });        
        
		$('.idi-login-link').on('keypress mousedown', function() {	//Login link within logout text
			$(idi.selectors.logoutText).hide();
			$(idi.selectors.loginForm).show();			
		});           	           
		        
    };
      
</script>    
    <!-- begin markup for UI Options Fat Panel -->
    <div class="flc-uiOptions-fatPanel fl-uiOptions-fatPanel">        
        <div id="myUIOptions" class="flc-slidingPanel-panel flc-uiOptions-iframe"></div>     
        
        <div class="idi-slidingPanel-panel idi-loginOutPanel">
                
            <div class="idi-logout-text fl-text-align-center" style="display: none;">             
                <p>You have been successfully logged out. <a href="#" class="idi-login-link">Login</a>.</p>                                                                     
            </div>

            <div class="idi-login-form fl-centered " style="display: none;">
            	<?php if ($_GET['idilogin'] == "failed") { ?>
            		<p class="error fl-text-align-center">Invalid username or password.</p>
            	<?php } ?>
                <form method="post" action="<?php echo wp_login_url(get_permalink());?>" id="loginform" name="loginform">
                    <div class="login-username">
                        <label for="user_login">Username</label>
                        <div>
                            <input type="text" placeholder="your username or email" tabindex="10" size="20" value="" class="input" id="user_login" name="log">
                            <!-- br/><div class="idi-login-extra idi-login-signup"><a href="">Sign up</a></div -->
                        </div>
                    </div>
                    <div class="login-password">
                        <label for="user_pass">Password</label>
                        <div>
                            <input type="password" placeholder="your password" tabindex="20" size="20" value="" class="input" id="user_pass" name="pwd">
                            <br/><div class="idi-login-extra idi-login-forgot"><a href="<?php echo wp_lostpassword_url(); ?>">Forgot my password</a></div>
                        </div>
                    </div>
                    <div class="login-submit">
                        <input type="submit" tabindex="100" value="Login" class="button-primary" id="wp-submit" name="wp-submit">
                    </div>
                </form>
            </div>
        </div> 
            
        <div class="fl-panelBar">
            <button class="flc-slidingPanel-toggleButton fl-toggleButton idi-uio-button">Preferences</button>           
                                    
            <?php if ( is_user_logged_in() ): 
                global $current_user;
                get_currentuserinfo(); ?>
                
                <a href="<?php echo wp_logout_url(add_query_arg( 'idilogout', 'true', get_permalink())); ?>" class="idi-logout fl-force-right"><button class="idi-slidingPanel-toggleButton fl-toggleButton idi-loginout">Login</button></a>                
                <div class="fl-force-right idi-loggedin">Logged in as <strong><?php echo  $current_user->user_login; ?></strong></div>  
                
            <?php else: ?>          
                <button class="idi-slidingPanel-toggleButton fl-toggleButton idi-loginout">Login</button>   
            <?php endif; ?>
        </div>
    </div>
    <!-- end markup for UI Options Fat Panel -->