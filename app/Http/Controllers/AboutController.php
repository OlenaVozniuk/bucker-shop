<?php

namespace App\Http\Controllers;

use App\Services\Category\Contracts\CategoryServiceInterface;
use Illuminate\Contracts\View\View;

class AboutController extends Controller
{
    /**
     * @param CategoryServiceInterface $categoryService
     * @return View
     */
    public function index(CategoryServiceInterface $categoryService): View
    {
        echo 45556;
        return view('about.about', [
            'categories' => $categoryService->getAll(),
        ]);
    }
}
