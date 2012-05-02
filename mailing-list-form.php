	<div class="idi-mailing-list-reminder">
		<div class="idi-mailing-list-signup">
			<h3>Stay updated,<br/>join our mailing list:</h3>
			<form id="idiMailingListSignup" method="post" action="<?php bloginfo('stylesheet_directory'); ?>/mailinglist.php" onsubmit="return idi.mailingListSignup()">
				<div class="idi-invalid-email-warning" style="display: none;">Please enter a valid email address.</div>
				<input type="email" name="listEmail" id="listEmail" placeholder="Your email address" required />
			</form>
		</div>
		<div class="idi-loading"></div>
		<div class="idi-signup-success" style="display: none;">
			<h3>Thank you!</h3>
			<p>A welcome email has been sent to <span class="idi-email-signedup">your email address</span>.</p>
		</div>
		<div class="idi-signup-error" style="display: none;">
			<h3>Hm...</h3>
			<p>Sign-up doesn't seem to be working right now. Please try again a bit later.</p>
		</div>
	</div>
