<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NovoProdutoEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $nome;
    public $sabor;
    public $preco;
    public $descricao;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($nome, $sabor, $preco, $descricao)
    {
        $this->nome = $nome;
        $this->sabor = $sabor;
        $this->preco = $preco;
        $this->descricao = $descricao;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('admin.mail.novo-produto');
    }
}