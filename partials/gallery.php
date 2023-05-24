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