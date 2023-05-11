<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Services\Category\Contracts\CategoryServiceInterface;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    /**
     * @param CategoryServiceInterface $categoryService
     * @return View
     */
    public function __invoke(CategoryServiceInterface $categoryService): View
    {
        return view('home.index', [
            'categories' => $categoryService->getAll(),
        ]);
    }
}
