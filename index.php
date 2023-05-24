<!DOCTYPE html>
<html>
<?php
include 'partials/header.php';
require_once 'inc/Portfolio.php';
$portfolio = new Portfolio();
?>
<body> 

	<?php
	include 'partials/menu.php';
	?>

		<main>
			<header class="row tm-welcome-section">
				<h2 class="col-12 text-center tm-section-title">Welcome to Simple House</h2>
				<p class="col-12 text-center">Total 3 HTML pages are included in this template. Header image has a parallax effect. You can feel free to download, edit and use this TemplateMo layout for your commercial or non-commercial websites.</p>
			</header>
			

			<!-- Gallery -->
			<div class="row tm-gallery">
				<div id="tm-gallery-page-pizza" class="tm-gallery-page">
          <?php
          $portfolio_items = $portfolio->get_portfolio();
          foreach ($portfolio_items as $item) {
            echo '<article class="col-lg-3 col-md-4 col-sm-6 col-12 tm-gallery-item">';
            echo '<figure>';
            echo '<img src="'.$item->image.'" alt="Image" class="img-fluid tm-gallery-img" />';
            echo '<figcaption>';
            echo '<h4 class="tm-gallery-title">'.$item->name.'</h4>';
            echo '<p class="tm-gallery-description">'.$item->description.'</p>';
            echo '<p class="tm-gallery-price">'.$item->cost.'€</p>';
            echo '</figcaption>';
            echo '</figure>';
            echo '</article>';
          }
          ?>
				</div> 
				
			</div>
			<div class="tm-section tm-container-inner">
				<div class="row">
					<div class="col-md-6">
						<figure class="tm-description-figure">
							<img src="img/img-01.jpg" alt="Image" class="img-fluid" />
						</figure>
					</div>
					<div class="col-md-6">
						<div class="tm-description-box"> 
							<h4 class="tm-gallery-title">Maecenas nulla neque</h4>
							<p class="tm-mb-45">Redistributing this template as a downloadable ZIP file on any template collection site is strictly prohibited. You will need to <a rel="nofollow" href="https://templatemo.com/contact">talk to us</a> for additional permissions about our templates. Thank you.</p>
							<a href="about.html" class="tm-btn tm-btn-default tm-right">Read More</a>
						</div>
					</div>
				</div>
			</div>
		</main>

		<?php
		include 'partials/footer.php';
		?>
	</div>
	<script src="js/jquery.min.js"></script>
	<script src="js/parallax.min.js"></script>
</body>
</html>
