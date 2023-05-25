<!DOCTYPE html>
<html>

<?php require'partials/header.php'?>

<body> 

	<div class="container">
	<!-- Top box -->
		<!-- Logo & Site Name -->
		<?php require'partials/menu.php'?>

		<main>
			<header class="row tm-welcome-section">
				<h2 class="col-12 text-center tm-section-title">Welcome to Simple House</h2>
				<p class="col-12 text-center">Total 3 HTML pages are included in this template. Header image has a parallax effect. You can feel free to download, edit and use this TemplateMo layout for your commercial or non-commercial websites.</p>
			</header>
			
			<!-- Gallery -->
			<h2 class="col-12 text-center tm-section-title">Menu</h2>

			<div class="row tm-gallery">
				<div id="tm-gallery-page" class="tm-gallery-page">
					<?php require 'partials/menu_items.php'; ?>
				</div>
			</div>

			<?php require'partials/info_ind.php'?>
		</main>

		<?php require'partials/footer.php'?>

	</div>
	<script src="js/jquery.min.js"></script>
	<script src="js/parallax.min.js"></script>

</body>
</html>