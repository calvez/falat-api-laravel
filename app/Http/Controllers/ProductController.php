<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $model;

    public function __construct(Product $model)
    {
        $this->model = $model;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(10)->all();
        return response()->json($products);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = $this->model->where('id', $id)->first();
        return response()->json($product);
    }

    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'name' => 'required',
                'price' => 'required|min:1|number',
            ]
        );
        $product = $this->model->create($request->all());

        return response()->json($product);
    }

    public function update(Request $request, $id)
    {
        $product = $this->model->where('id', $id)->firstOrFail();
        $rules = [
            'name' => 'required',
            'price' => 'required|min:1|number',
        ];

        $this->validate($request, $rules);

        $product->update($request->except('_token', 'password'));

        return response()->json($product);
    }

    public function destroy(Request $request, $id)
    {
        $product = $this->model->where('id', $id)->firstOrFail();
        $product->delete();

        return response()->json(null, 204);
    }
}
