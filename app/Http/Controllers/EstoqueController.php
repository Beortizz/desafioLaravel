<?php

namespace App\Http\Controllers;
use App\Models\Estoque;
use Illuminate\Http\Request;
use App\Models\Produto;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class EstoqueController extends Controller
{
    public function index()
    {
        $estoque = Estoque::all();
        return view('admin.estoque.index', compact('estoque'));
    }

    public function create()
    {
        $user = User::all();
        if (! Gate::allows('isAdm', $user)) {
            return redirect()->route('estoque.index');
        }
        $estoque = new Estoque();
        $produtos = Produto::all();
        return view('admin.estoque.create', compact('estoque'), compact('produtos'));
        
    
    }

    public function store(Request $request)
    {
        $produto = Produto::whereNome($request->produtos)->first();
        $estoque = $request->all(); 
        $estoque = Estoque::create($estoque);
        // $estoque = new Estoque();
        $estoque->produtos()->sync([$produto->id]);
        
        return redirect()->route('estoque.index')->with('Success', true);
    }

    public function show(Estoque $estoque)
    {
        $produtos = Produto::where();
        return view('admin.estoque.show', compact('estoque'));
    }

    public function edit(Estoque $estoque)
    {   
        $user = User::all();
        if (! Gate::allows('isAdm', $user)) {
            return redirect()->route('estoque.index');
        }
        $produtos = Produto::all();
        return view('admin.estoque.edit', compact('estoque'),  compact('produtos'));
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