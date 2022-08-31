<?php

namespace App\Http\Controllers;
use App\Models\Produto;
use Illuminate\Http\Request;
use App\Models\Estoque;
use Illuminate\Support\Facades\Mail;
use App\Mail\NovoProduto;

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
        $produto = $request->all();
      
        $email = new NovoProduto(
            $request->nome, 
            $request->sabor, 
            $request->preco,
            $request->descricao
        );
        
        $email->subject = 'Novo Produto Adicionado';
        $user = $request->user();
        Mail::to($user)->send($email);
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