<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class SitemapController extends Controller
{
    public function index()
    {
        return response()->view('sitemap/sitemap_index',
            compact(null))
            ->header('Content-Type', 'text/xml');
    }
    public function pages()
    {
        return response()->view('sitemap/sitemap_pages',
            compact(null))
            ->header('Content-Type', 'text/xml');
    }
    public function products()
    {
        $products = Product::all();

        return response()->view('sitemap/sitemap_products',
            compact('products'))
            ->header('Content-Type', 'text/xml');
    }

}
