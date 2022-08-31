<?php

namespace App\Listeners;

use App\Events\NovoProduto;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Mail\NovoProdutoEmail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class EnviarEmailNovoProduto implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\NovoProduto  $event
     * @return void
     */
    public function handle(NovoProduto $event)
    {
        $users = User::all();
        foreach ($users as $i => $user) 
        {
            if($user->permissao == true)
            {
                $multiplicador = $i + 1;
                $email = new NovoProdutoEmail(
                $event->nome, 
                $event->sabor, 
                $event->preco,
                $event->descricao
                );
            $when = now()->addSeconds($multiplicador * 10);
            $email->subject = 'Novo Produto Adicionado';
            Mail::to($user)->later($when,$email);   
            }
      
        }
    }
}