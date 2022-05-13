<!doctype html>
<html lang="fa">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>انتقال به سایت فروشگاه</title>
</head>
<body>

@php
  use App\Product;

    $product = Product::where('pid',$pid)->first();
@endphp

<script type="application/ld+json" id="redirect_url">
  {
      "productUrl" : "<?= $product->url ?>"
  }
</script>
<script type="text/javascript">
    let localVars = JSON.parse(document.getElementById("redirect_url").innerHTML,false);

    setTimeout(function () {
        window.location.href=localVars.productUrl;
    },1000)
</script>
</body>
</html>

