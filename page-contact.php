<?php get_header(); ?>

<!-- Contact Us Page -->
<div class="contact-nck-wrapper">
	<div class="contact-nck-header">
		<h1>Contact Us</h1>
		<p>We look forward to helping you learn more about NCK Tech. The best way to get to know us is to <a class="learn-more" href="/visit/">Schedule a Tour</a>!</p>
	</div>

	<section class="contact-nck-main">
		<div class="contact-info-left">
			<div class="campus-contact">
				<span class="h4-heading">Beloit Campus</span>
				<p>Phone: <a class="learn-more" href="tel:18006584655">1-800-658-4655</a></p>
				<p>E-mail: <a class="learn-more" href="mailto:webmaster@ncktc.edu">webmaster@ncktc.edu</a></p>
				<p>Fax: 1-785-738-2903</p>
			</div>

			<div class="campus-contact">
				<span class="h4-heading">Hays Campus</span>
				<p>Phone: <a class="learn-more" href="tel:18885674297">1-888-567-4297</a></p>
				<p>E-mail: <a class="learn-more" href="mailto:webmaster@ncktc.edu">webmaster@ncktc.edu</a></p>
				<p>Fax: 1-785-623-6152</p>
			</div>

			<div class="campus-contact">
				<span class="h4-heading">Mailing Address</span>
				<p>
					North Central Kansas Technical College <br>
					Attn: Administrator <br>
					PO Box 507 <br>
					3033 US Hwy 24 <br>
					Beloit, KS 67420 <br>
				</p>
			</div>
		</div>

		<div class="contact-form-right">
			<?php gravity_form( 1, false, false, false, '', true ); ?> <!-- ajax is used for this form -->
		</div>

	</section> <!-- /.contact-nck-main -->

	<section class="contact-bottom">
		<div class="contact-bottom__section">
			<span class="h4-heading">Contact A Staff Member Directly</span>
			<p>You can view our <a class="learn-more" href="/directory/">Staff Directory Here</a>.</p>
			<p>
				Hours: Monday - Friday &nbsp; 7:30am - 4:30pm (CST) <br>
				A college representative will contact you within 1 business day. <br>
				If you want to learn more about a specific program, please use the <a class="learn-more" href="/request-information/">Request Information</a> form. <br>
				For general inquiries, information, or concerns please use the form on this page.
			</p>
		</div>
	</section> <!-- /.contact-bottom -->
</div> <!-- /.contact-nck-wrapper -->

<?php get_footer(); ?>