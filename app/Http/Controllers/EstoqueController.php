<?php

namespace App\Http\Controllers;
use App\Models\Estoque;
use Illuminate\Http\Request;

class EstoqueController extends Controller
{
    public function index()
    {
        $estoque = Estoque::all();
        return view('admin.estoque.index', compact('estoque'));
    }

    public function create()
    {
        $estoque = new Estoque();
        return view('admin.estoque.create', compact('estoque'));
        
    
    }

    public function store(Request $request)
    {
        $estoque = $request->all();
        Estoque::create($estoque);

        return redirect()->route('estoque.index')->with('Success', true);
    }

    public function show(Estoque $estoque)
    {
        return view('admin.estoque.show', compact('estoque'));
    }

    public function edit(Estoque $estoque)
    {
        return view('admin.estoque.edit', compact('estoque'));
    }

    public function update(Request $request, Estoque $estoque)
    {
        $estoque->update($request->all());
        return redirect()->route('estoque.index');
    }

    public function destroy(Estoque $estoque)
    {
        Estoque::destroy($estoque->id);
        return redirect()->route('estoque.index');
    }
}