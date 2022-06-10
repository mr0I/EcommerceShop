<?= '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<?= '<?xml-stylesheet type="text/xsl" href="'.url("xml-sitemap.xsl").'"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
      <loc> {{ url('') . '/page-sitemap.xml' }}</loc>
      <lastmod>{{ date('Y-m-d H:i:s') }}</lastmod>
      <changefreq>weekly</changefreq>
      <priority>0.5</priority>
    </url>
    <url>
      <loc> {{ url('') . '/product-sitemap.xml' }}</loc>
      <lastmod>{{ date('Y-m-d H:i:s') }}</lastmod>
      <changefreq>weekly</changefreq>
      <priority>0.5</priority>
    </url>
</urlset>