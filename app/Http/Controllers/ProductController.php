<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateProductRequest;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;

        // $this->middleware('auth');
        /*$this->middleware('auth')->only([
            'create', 'store'
        ]);*/
        // $this->middleware('auth')->except([
        //     'index', 'show'
        // ]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teste = 123;
        $teste2 = 312;
        $teste3 = [1,2,3,4,5];
        $products = ['Tv', 'Geladeira', 'Forno', 'Sofá'];

        return view('admin.pages.products.index', compact('teste', 'teste2', 'teste3', 'products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdateProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateProductRequest $request)
    {
        dd('OK');
        /*
        $request->validate([
            'name' => 'required|min:3|max:255',
            'description' => 'nullable|min:3|max:10000',
            'photo' => 'required|image',
        ]);
        */

        // dd($request->all());
        // dd($request->only(['name', 'description']));
        // dd($request->name);
        // dd($request->input('teste', 'default'));
        // dd($request->except('_token', 'name'));
        if ($request->file('photo')->isValid()) {
            // dd($request->file('photo')->store('products'));
            // dd($request->file('photo')->store('products'));

            $nameFile = $request->name . '.' . $request->photo->extension();
            dd($request->file('photo')->storeAs('products', $nameFile));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return "Detalhes do produto {$id}";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.pages.products.edit', compact('id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        dd("Editando o produto {$id}");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
