<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ApiService;

class PageController extends Controller
{
    public function home()
    {
        $project = ApiService::get('pages/homepage');
        $services = ApiService::get('services');

        if(isset($project))
            return view('pages.projectenPage', compact('project', 'services'));

        return view('pages.home');
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function blog()
    {
        $blogs = ApiService::get('blogs');

        if(isset($blogs))
            return view('pages.blog', compact('blogs'));

        abort(404);
    }

    public function collectie()
    {
        $collections = ApiService::get('collections');

        if(isset($collections))
            return view('pages.collectie', compact('collections'));

        abort(404);
    }

    public function collectiePage($slug)
    {
        $collection = ApiService::get('collections/' . $slug);

        if(isset($collection))
            return view('pages.collectiePage', compact('collection'));

        abort(404);
    }

    public function offerte($name)
    {
        return view('pages.offerte', compact('name'));
    }

    public function tegels()
    {
        $tegels = ApiService::get('tiles');

        if(isset($tegels))
            return view('pages.tegels', compact('tegels'));
           
        abort(404);
    }

    public function tegelsPage($slug)
    {
        $tegel = ApiService::get('tiles/' . $slug);

        if(isset($tegel))
            return view('pages.tegelsPage', compact('tegel'));

        abort(404);
    }

    public function diensten()
    {
        $services = ApiService::get('services');

        if(isset($services))
            return view('pages.diensten', compact('services'));

        abort(404);    
    }

    public function dienstenPage($slug)
    {
        $service = ApiService::get('services/' . $slug);

        if(isset($service))
            return view('pages.dienstenPage', compact('service'));

        abort(404);
    }

    public function projecten()
    {
        $projects = ApiService::get('projects');

        if(isset($projects))
            return view('pages.projecten', compact('projects'));

        abort(404);
    }

    public function projectenPage($slug)
    {
        $project = ApiService::get('projects/' . $slug);

        if(isset($project))
            return view('pages.projectenPage', compact('project'));

        abort(404);
    }

    public function pagina($slug)
    {
        $project = ApiService::get('pages/' . $slug);

        if(isset($project))
            return view('pages.projectenPage', compact('project'));

        abort(404);
    }

    public function collectieProduct($slug, $productSlug)
    {
        $product = ApiService::get('products/' . $productSlug);

        if($product == null)
            abort(404);

        $images = [];

        if($product->src3 != '' && !str_contains($product->src3, '/tmp/')) 
            array_push($images, ApiService::api() . 'img/settings/product/' . $product->src3);

        if($product->src4 != '' && !str_contains($product->src4, '/tmp/')) 
            array_push($images, ApiService::api() . 'img/settings/product/' . $product->src4);

        if($product->src5 != '' && !str_contains($product->src5, '/tmp/')) 
            array_push($images, ApiService::api() . 'img/settings/product/' . $product->src5);

        if($product->src6 != '' && !str_contains($product->src6, '/tmp/')) 
            array_push($images, ApiService::api() . 'img/settings/product/' . $product->src6);

        if($product->src7 != '' && !str_contains($product->src7, '/tmp/')) 
            array_push($images, ApiService::api() . 'img/settings/product/' . $product->src7);

        if($product->src8 != '' && !str_contains($product->src8, '/tmp/')) 
            array_push($images, ApiService::api() . 'img/settings/product/' . $product->src8);

        if($product->src9 != '' && !str_contains($product->src9, '/tmp/')) 
            array_push($images, ApiService::api() . 'img/settings/product/' . $product->src9);

        if($product->src10 != '' && !str_contains($product->src10, '/tmp/')) 
            array_push($images, ApiService::api() . 'img/settings/product/' . $product->src10);
        
        return view('pages.collectieProduct', compact('product', 'images'));
    }
}
