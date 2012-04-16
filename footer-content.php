		<script type="text/javascript">
			function submitForm() {
				var listForm = $('#myForm');
				var listEmail = $('#listEmail').val();

				//validate for non-html5 browsers
				var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
			    if(reg.test(listEmail) == false) {
					alert("Invalid email");			//switch to accessible html?
				} else {
					$.ajax({
						url: listForm.attr('action'),
						type: listForm.attr('method'),
						data: {email: listEmail},
						success: function(email) {
							$("#listForm").html("<p>Success! " + email + " has been added to the mailing list. You should receive a confirmation email shortly.</p>"); 	
						}
					});

				}
				return false;
			}
		</script>

		<footer class="fl-centered fl-site-footer">
			<div class="fl-col-flex2 idi-footer-main">
				<div class="fl-col">
					Inclusive Design Institute
					<div class="fl-col-flex2">
						<div class="fl-col"><span class="address">205 Richmond St. West 2nd Floor<br/>
							                Toronto ON, M5V 1V3, Canada</span>
						</div>
						<div class="fl-col"><span class="phone-number">416.977.6000 ext. 3968</span><br/>
											<span class="email">idi@ocadu.ca</span>
						</div>
					</div>
				</div>
				<div class="fl-col">
					Funded by the Canada Foundation for Innovation
					<div class="fl-col-flex2">
						<div class="fl-col">
							<ul>
								<li>OCAD University</li>
								<li>Ryerson University</li>
								<li>York University</li>
								<li>OUIT</li>
							</ul>
						</div>
						<div class="fl-col">
							<ul>
								<li>University of Toronto</li>
								<li>Sheridan College</li>
								<li>George Brown College</li>
								<li>Seneca College</li>
							</ul>
						</div>
					</div>
				</div>

			</div>
		</footer>
