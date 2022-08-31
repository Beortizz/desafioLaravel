<?php

namespace App\Http\Controllers;
use App\Models\Produto;
use Illuminate\Http\Request;
use App\Models\Estoque;
use Illuminate\Support\Facades\Mail;
use App\Mail\NovoProduto;
use App\Models\User;


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
        $users = User::all();
        foreach ($users as $i => $user) 
        {
            $multiplicador = $i + 1;
            $email = new NovoProduto(
            $request->nome, 
            $request->sabor, 
            $request->preco,
            $request->descricao
        );
        $when = now()->addSeconds($multiplicador * 10);
        $email->subject = 'Novo Produto Adicionado';
        Mail::to($user)->later($when,$email);
        }
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