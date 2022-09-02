<?php

namespace App\Http\Controllers;
use App\Models\Produto;
use Illuminate\Http\Request;
use App\Models\Estoque;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Events\NovoProduto;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\ProdutosFormRequest;

use Storage;

class ProdutosController extends Controller
{
    public function index(Request $request)
    {
        $produtos = Produto::all();
        $msg = $request->session()->get('msg');
        return view('admin.produtos.index', compact('produtos'), compact('msg'));
    }

    public function create()
    {
        $user = User::all();
        if (! Gate::allows('isAdm', $user)) {
            return redirect()->route('produtos.index');
        }
        $produto = new Produto();
        
        return view('admin.produtos.create', compact('produto'));
        
    
    }

    public function store(ProdutosFormRequest $request)
    {
        $request->path = $request->file('path')->store('produtos');
        $produto = $request->all();
        $produto['path'] = $request->path;
        $eventoNovoProduto = new NovoProduto(
            $request->nome, 
            $request->sabor, 
            $request->preco,
            $request->descricao
        );

        event($eventoNovoProduto);        
        Produto::create($produto);

        $request->session()->flash('msg', 'Produto criado com sucesso');
        return redirect()->route('produtos.index')->with('Success', true);
    }

    public function show(Produto $produto)
    {
        $estoque = Estoque::all();
        return view('admin.produtos.show', compact('produto'), compact('estoque'));
    }

    public function edit(Produto $produto)
    {
        $user = User::all();
        if (! Gate::allows('isAdm', $user)) {
            return redirect()->route('produtos.index');
        }
        return view('admin.produtos.edit', compact('produto'));
    }

    public function update(ProdutosFormRequest $request, Produto $produto)
    {
        
        $request->path = $request->file('path')->store('produtos');
        $prod = $request->all();
        $prod['path'] = $request->path;
        $produto->update($prod);
        $request->session()->flash('msg', 'Produto editado com sucesso');
        return redirect()->route('produtos.index');
    }

    public function destroy(Produto $produto, Request $request)
    {
        Produto::destroy($produto->id);
        Storage::delete($produto->path);
        $request->session()->flash('msg', 'Produto excluído com sucesso');
        return redirect()->route('produtos.index');
    }
}