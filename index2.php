<style>
/* Le sacamos los puntitulos: */
ul.galeria {
	    list-style: none;
}

/* Hacemos que lis LI se comporten como cuadros */
ul.galeria li {
	    display: inline;
		    margin: 15px;
}
</style>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require('magpierss-0.72/rss_fetch.inc');

// Llamamos la función con la URL de nuestro feed:
$set = '72157623244837127';
//$set = '72157627160106129'; // un álbum de indal
$id = '14171139@N08';
//$id = '57174169@N06'; // indal
echo $url = "http://api.flickr.com/services/feeds/photoset.gne?set=$set&nsid=$id&lang=es-us&format=rss_200&per_page=2&page=1";
$rss = fetch_rss($url);

$img = array();
echo '<br />' . count($rss->items);

?>
<ul class="galeria">
	<?php
	foreach ($rss->items as $photo) {
		if(preg_match('#<img src="([^"]*)"#s', $photo['description'],$img)) {
			?>
			<li>
				<a href="<?php echo $photo['link'] ?>"><img src="<?php echo str_replace("m.jpg", "s_d.jpg", $img[1]) ?>" alt="<?php echo htmlspecialchars($photo['title']) ?>" /></a>
			</li>
			<?php
		}
	}
	?>
</ul>
