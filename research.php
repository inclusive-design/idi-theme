<?php
/*
Template Name: Research Page
*/
?>
<?php get_header(); ?>

<div class="fl-centered fl-col-mixed fl-site-wrapper">

	<aside class="fl-col-fixed fl-force-left">
		<?php get_sidebar('research'); ?>
	</aside>

	<div id="content" class="fl-col-flex idi-one-column idi-research">
		<ul class="fl-grid">
			<li>
				<section>
					<div class="idi-research-item">
						<head>
							<a class="idi-cluster-icon-link idi-no-tab-focus" href="design">
								<div class="idi-cluster-icon idi-cluster-design">
									<span class="fl-hidden-accessible">Design and Development research cluster</span>
									<div class="idi-cluster-hover-overlay">
										<div class="idi-cluster-icon idi-cluster-design-hover">
											<span class="idi-cluster-icon-text fl-centered"> learn more</span>
										</div>
									</div>
								</div>
							</a>
							<a class="idi-cluster-name-link" href="design">
								<h2>Design &amp; Development</h2>
							</a>
						</head>
						<p>Creating tools, strategies, resources and exemplars that address all stages of ICT production and use</p>
						<p><a class="idi-more idi-no-tab-focus" title="Design and Development research cluster" href="design">learn more</a></p>
					</div>
				</section>
			</li>

			<li>
				<section>
					<div class="idi-research-item">
						<head>
							<a class="idi-cluster-icon-link idi-no-tab-focus" href="policies">
								<div class="idi-cluster-icon idi-cluster-policies">
									<span class="fl-hidden-accessible">Business Case, Policies, Standards and Legislation research cluster</span>
									<div class="idi-cluster-hover-overlay">
										<div class="idi-cluster-icon idi-cluster-policies-hover">
											<span class="idi-cluster-icon-text fl-centered"> learn more</span>
										</div>
									</div>
								</div>
							</a>
							<a class="idi-cluster-name-link" href="policies">
								<h2>Business Case, Policies, Standards &amp; Legislation</h2>
							</a>
						</head>
						<p>Engaging legislators, specifications bodies, advocacy groups and consumer communities in inclusive design research</p>
						<p><a class="idi-more idi-no-tab-focus" title="Business Case, Policies, Standards and Legislation research cluster" href="policies">learn more</a></p>
					</div>
				</section>
			</li>

			<li>
				<section>
					<div class="idi-research-item">
						<head>
							<a class="idi-cluster-icon-link idi-no-tab-focus" href="mobile">
								<div class="idi-cluster-icon idi-cluster-mobile">
									<span class="fl-hidden-accessible">Mobile and Pervasive Computing research cluster</span>
									<div class="idi-cluster-hover-overlay">
										<div class="idi-cluster-icon idi-cluster-mobile-hover">
											<span class="idi-cluster-icon-text fl-centered"> learn more</span>
										</div>
									</div>
								</div>
							</a>
							<a class="idi-cluster-name-link" href="mobile">
								<h2>Mobile &amp; Pervasive Computing</h2>
							</a>
						</head>
						<p>Focusing on mobile, context-aware and location-aware technologies, ubiquitous web applications, pervasive computing and ambient intelligence</p>
						<p><a class="idi-more idi-no-tab-focus" title="Mobile and Pervasive Computing research cluster" href="mobile">learn more</a></p>
					</div>
				</section>
			</li>

			<li>
				<section>
					<div class="idi-research-item">
						<head>
							<a class="idi-cluster-icon-link idi-no-tab-focus" href="implementation">
								<div class="idi-cluster-icon idi-cluster-implementation">
									<span class="fl-hidden-accessible">Implementation and Information Practices research cluster</span>
									<div class="idi-cluster-hover-overlay">
										<div class="idi-cluster-icon idi-cluster-implementation-hover">
											<span class="idi-cluster-icon-text fl-centered"> learn more</span>
										</div>
									</div>
								</div>
							</a>
							<a class="idi-cluster-name-link" href="implementation">
								<h2>Implementation &amp; Information Practices</h2>
							</a>
						</head>
						<p>Examining the role of ICT and inclusive design in education, health, culture and civic engagement</p>
						<p><a class="idi-more idi-no-tab-focus" title="Implementation and Information Practices research cluster" href="implementation">learn more</a></p>
					</div>
				</section>
			</li>
		</ul>
	</div>

</div>

<?php 
// Remove the id="content" attribute that is inherited from the parent theme "wordpress-fss-theme".
// This attribute/value pair is re-defined in this page.
remove_parent_contentID();

get_footer(); 
?>
