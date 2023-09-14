<?php

namespace App\Http\Controllers;

use App\Models\FAQ;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class FAQController extends Controller
{
    use ApiResponse;
    public function index_api()
    {
        $faq = FAQ::all();
        return $this->responseCollection('FAQ',$faq);
    }
}
