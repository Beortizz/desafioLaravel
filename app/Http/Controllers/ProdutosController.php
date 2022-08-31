<?php

namespace App\Http\Controllers;
use App\Models\Produto;
use Illuminate\Http\Request;
use App\Models\Estoque;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Events\NovoProduto;
use Storage;

class ProdutosController extends Controller
{
    public function index()
    {
        $produtos = Produto::all();
        return view('admin.produtos.index', compact('produtos'));
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

    public function store(Request $request)
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

    public function update(Request $request, Produto $produto)
    {
        $produto->update($request->all());
        return redirect()->route('produtos.index');
    }

    public function destroy(Produto $produto)
    {
        // dd($produto->path);
        Produto::destroy($produto->id);
        Storage::delete($produto->path);
        return redirect()->route('produtos.index');
    }
}