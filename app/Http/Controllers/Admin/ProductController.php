<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductStoreRequest;
use App\Http\Requests\Admin\ProductUpdateRequest;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use Inertia\Response as InertiaResponse;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $clientRequest) : InertiaResponse
    {
        $search = $clientRequest->search ?: '';
        $sort = $clientRequest->sort ?: 'id';
        $order = $clientRequest->order ?: 'asc';

        $products = Product::where(
                        function ($query) use ($search){
                            if (filled($search)) {

                                return $query->where(
                                    column: 'product_name',
                                    operator: 'like',
                                    value: "%$search%"
                                );
                            }
                        }
                    )
                    ->orderBy($sort, $order)
                    ->paginate(3);

        return Inertia::render(
            component: 'Admin/Products/Index',
            props: [
                'products' => $products,
                'filters' => [
                    'sort' => $sort,
                    'order' => $order,
                    'search' => $search
                ],
                'oops' => Inertia::lazy(fn () => Product::all())
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductStoreRequest $clientRequest) : RedirectResponse
    {
        $product = new Product($clientRequest->validated());
        $product->save();

        return Redirect::to(route('products.index'))->withViewData([
            'message' => 'Product has been Created!'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) : InertiaResponse
    {
        $product = Product::find($id);

        return Inertia::render(
            component: 'Admin/Products/Show',
            props: [
                'product' => $product
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductUpdateRequest $clientRequest, string $id) : RedirectResponse
    {
        $product = Product::findOrFail($id);

        $product->update($clientRequest->validated());

        return Redirect::to(route('products.show', $id))->with([
            'message' => 'Product has been Updated!',
            'product' => $product
        ]);
    }

    public function upload(Request $clientRequest, string $id) {
        if ($clientRequest->hasFile('file')) {
            $file = Storage::putFile(
                path: 'temp',
                file: $clientRequest->file('file')
            );
        }

        return Redirect::to(route('products.show', $id))->withViewData([
            'message' => 'Product has been Updated!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
