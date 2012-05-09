	<!-- begin markup for UI Options Fat Panel -->
	<div class="flc-uiOptions-fatPanel fl-uiOptions-fatPanel">        
		<div id="myUIOptions" class="flc-slidingPanel-panel flc-uiOptions-iframe"></div>     
		
		<div class="idi-slidingPanel-panel idi-loginOutPanel">
			<div class="idi-login-form fl-centered" style="display: none;">
				<form method="post" action="<?php echo wp_login_url(get_permalink());?>" id="loginform" name="loginform">
					<div class="login-username">
						<label for="user_login">Username</label>
						<div>
							<input type="text" placeholder="your username or email" tabindex="10" size="20" value="" class="input" id="user_login" name="log">
<!--
Not allowing sign-up right now
							<br/><div class="idi-login-extra idi-login-signup"><a href="">Sign up</a></div>
-->
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
			<button class="flc-slidingPanel-toggleButton fl-toggleButton idi-uio-button">preferences</button>
			<button class="idi-slidingPanel-toggleButton fl-toggleButton idi-loginout">login</button>
		</div>
	</div>
	<!-- end markup for UI Options Fat Panel -->
