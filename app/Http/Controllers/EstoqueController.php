<?php

namespace App\Http\Controllers;
use App\Models\Estoque;
use Illuminate\Http\Request;
use App\Models\Produto;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\EstoqueProduto;
use App\Http\Requests\EstoqueFormRequest;

class EstoqueController extends Controller
{
    public function index(Request $request)
    {
        $estoque = Estoque::all();
        $msg = $request->session()->get('msg');
        return view('admin.estoque.index', compact('estoque'), compact('msg'));
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

    public function store(EstoqueFormRequest $request)
    {
        $produto = Produto::whereNome($request->produtos)->first();
        $estoque = $request->all(); 
        $estoque = Estoque::create($estoque);
        $request->session()->flash('msg', 'Estoque criado com sucesso');
        $estoque->produtos()->sync([$produto->id]);
        return redirect()->route('estoque.index')->with('Success', true);
    }

    public function show(Estoque $estoque)
    {
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
        $produto = Produto::whereNome($request->produtos)->first();
        $estoque->update($request->all());
        $estoque->produtos()->sync([$produto->id]);
        $request->session()->flash('msg', 'Estoque criado com sucesso');
        return redirect()->route('estoque.index');
        
    }

    public function destroy(Estoque $estoque, Request $request)
    {
        Estoque::destroy($estoque->id);
        $request->session()->flash('msg', 'Estoque excluído com sucesso');
        return redirect()->route('estoque.index');
    }

}