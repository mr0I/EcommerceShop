<?= '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<?= '<?xml-stylesheet type="text/xsl" href="'.url("xml-sitemap.xsl").'"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
  @foreach ($products as $product)
    <url>
      <loc> {{ url('') . '/product/' . $product->id }}</loc>
      <lastmod>{{ date('Y-m-d H:i:s',substr(strval($product->date),0,10)) }}</lastmod>
      <changefreq>weekly</changefreq>
      <priority>0.5</priority>
    </url>
  @endforeach
</urlset>