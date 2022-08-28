<?php

namespace App\Http\Controllers;
use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{
    public function index()
    {
        $produtos = Produto::all();
        return view('admin.produtos.index', compact('produtos'));
    }

    public function create()
    {
        $produto = new Produto();
        return view('admin.produtos.create', compact('produto'));
        
    
    }

    public function store(Request $request)
    {
        $produtos = $request->all();
        Produto::create($produtos);

        return redirect()->route('produtos.index')->with('Success', true);
    }

    public function show(Produto $produto)
    {
        
        return view('admin.produtos.show', compact('produto'));
    }

    public function edit(Produto $produto)
    {
        return view('admin.produtos.edit', compact('produto'));
    }

    public function update(Request $request, Produto $produto)
    {
        $produto->update($request->all());
        return redirect()->route('produtos.index');
    }

    public function destroy(Produto $produto)
    {
        Produto::destroy($produto->id);
        return redirect()->route('produtos.index');
    }
}