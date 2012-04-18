	<!-- begin markup for UI Options Fat Panel -->
	<div class="flc-uiOptions-fatPanel fl-uiOptions-fatPanel">        
		<div id="myUIOptions" class="flc-slidingPanel-panel flc-uiOptions-iframe"></div>     
		
		<div class="idi-slidingPanel-panel idi-loginOutPanel">
			<div class="idi-login-form" style="display: none;">
				<?php wp_login_form(array('echo' => true, 'redirect' => site_url( '/front-page/')) ); ?> 
			</div>
		</div>
			
		<div class="fl-panelBar">
			<button class="flc-slidingPanel-toggleButton fl-toggleButton">Show/Hide</button>
			<button class="idi-slidingPanel-toggleButton fl-toggleButton idi-loginout">Show/Hide</button>
		</div>
	</div>
	<!-- end markup for UI Options Fat Panel -->
