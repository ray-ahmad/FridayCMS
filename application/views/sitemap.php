<?php 
	echo '<?xml version="1.0" encoding="UTF-8"?>';
	$prio = "<priority>{$this->play->_set("sitemap_priority")}</priority>";
	$freq = ($this->play->_set("sitemap_changefreq") != "none") ? "<changefreq>{$this->play->_set("sitemap_changefreq")}</changefreq>" : "";
?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
 <url>
  <loc><?php echo BASE_URL ?></loc>
  <?php echo $prio ?>
  <?php echo $freq ?>
  <lastmod><?php echo date("Y-m-d") ?></lastmod>
 </url>
<?php foreach ($this->cat->get_all_cats()->result() as $cat) : ?>
 <url>
  <loc><?php echo cat_url($cat->sefurl) ?></loc>
  <?php echo $prio ?>
  <?php echo $freq ?>
  <lastmod><?php echo $cat->make_date ?></lastmod>
 </url>
<?php
	endforeach;
  foreach ($this->post->get_all_posts()->result() as $post) :
?>
 <url>
  <loc><?php echo post_url($post->sef_url) ?></loc>
  <?php echo $prio ?>
  <?php echo $freq ?>
  <lastmod><?php echo $post->date_posted ?></lastmod>
 </url>
<?php endforeach ?>
</urlset>