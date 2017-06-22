	<div class="footer">
		<div class="container">
			<div class="col-md-6">
				<div class="footer__left">
					<!-- <form>
					<input type="email" name="email" id="email" required="" placeholder="Alamat Email" class="footer__left__email">
					<input type="submit" value="Join Us" class="footer__left__button">
					</form> -->
					<div class="clear"></div>
					<!-- <div class="footer__left__text">Enter your email to get the registration form</div> -->
					<img src="<?= base_url() ?>assets/images/logo-white.png" class="footer__left__logo">
				</div>
			</div>
			<div class="col-md-6">
				<div class="footer__right">
					<table class="footer__right__table">
						<tr >
							<td>Email</td>
							<td>info@sahabatcipta.or.id</td>
						</tr>
						<tr>
							<td>Phone</td>
							<td>+62 21 7919 8690</td>
						</tr>
						<tr>
							<td>Fax</td>
							<td>+62 21 7919 8691</td>
						</tr>
						<tr>
							<td valign="top">Address</td>
							<td>Jl. Mampang Prapatan XIV No. 47 <br>RT 01/RW 02, Jakarta 12790, Indonesia</td>
						</tr>
					</table>
				</div>

			</div>

		</div>
	</div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
   

    <!-- full slider -->
    <script src="<?= base_url() ?>assets/js/jquery.fullPage.js"></script>
    <script src="<?= base_url() ?>assets/js/fullslider.js"></script>
    <script type="text/javascript">
		$(document).ready(function() {
			$('#fullpage').fullpage({
				sectionsColor: ['#1bbc9b', '#4BBFC3', '#7BAABE', 'whitesmoke', '#ccddff'],
				anchors: ['firstPage', 'secondPage', '3rdPage', '4thpage', 'lastPage'],
				menu: '#menu',
				scrollingSpeed: 1000,
				slidesNavigation: true,
			});
		});
	</script>
    
    <script src="<?= base_url() ?>assets/js/wow.min.js"></script>
    <script>
      new WOW().init();
    </script>


  </body>
</html>
