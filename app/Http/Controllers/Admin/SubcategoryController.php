<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Subcategory\SearchRequest;
use App\Http\Requests\Admin\Subcategory\StoreRequest;
use App\Http\Requests\Admin\Subcategory\UpdateRequest;
use App\Models\Subcategory;
use App\Services\Category\Contracts\CategoryServiceInterface;
use App\Services\Subcategory\Contracts\SubcategoryServiceInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use function redirect;
use function view;

class SubcategoryController extends Controller
{
    /**
     * @var SubcategoryServiceInterface
     */
    protected SubcategoryServiceInterface $service;

    /**
     * @param SubcategoryServiceInterface $service
     */
    public function __construct(SubcategoryServiceInterface $service)
    {
        $this->service = $service;
    }

    /**
     * @param SearchRequest $request
     * @return View
     */
    public function index(SearchRequest $request): View
    {
        return view('admin.subcategories.index', [
            'subcategories'     => $this->service->getAllPaginated($request->validated()),
            'subcategoriesJson' => $this->service->getAll()->toJson(),
            'categoriesAll'     => resolve(CategoryServiceInterface::class)->getAll()->sortBy('name')->all()
        ]);
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return view('admin.subcategories.create', [
            'categoriesAll' => resolve(CategoryServiceInterface::class)->getAll()->sortBy('name')->all()
        ]);
    }

    /**
     * @param StoreRequest $request
     * @return RedirectResponse
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        $this->service->store($request->validated());
        return redirect()->route('admin.subcategories.index')->with('success', 'Subcategory created successfully');
    }

    /**
     * @param Subcategory $subcategory
     * @return View
     */
    public function show(Subcategory $subcategory): View
    {
        return view('admin.subcategories.show', ['subcategory' => $subcategory]);
    }

    /**
     * @param Subcategory $subcategory
     * @return View
     */
    public function edit(Subcategory $subcategory): View
    {
        return view('admin.subcategories.edit', [
            'subcategory'   => $subcategory,
            'categoriesAll' => resolve(CategoryServiceInterface::class)->getAll()->sortBy('name')->all(),
        ]);
    }

    /**
     * @param UpdateRequest $request
     * @param Subcategory $subcategory
     * @return RedirectResponse
     */
    public function update(UpdateRequest $request, Subcategory $subcategory): RedirectResponse
    {
        $this->service->update($subcategory, $request->validated());

        return redirect()->route('admin.subcategories.index')
            ->with('success', 'Subcategory updated successfully');
    }

    /**
     * @param Subcategory $subcategory
     * @return RedirectResponse
     */
    public function destroy(Subcategory $subcategory): RedirectResponse
    {
        $this->service->destroy($subcategory);

        return redirect()->route('admin.subcategories.index')
            ->with('success', 'Subcategory deleted successfully');
    }


}
