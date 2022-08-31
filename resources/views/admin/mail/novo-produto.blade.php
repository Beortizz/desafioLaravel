@component('mail::message')
## Produto Adicionado no Sistema
###    Nome: {{ $nome }}  
###    Preço: {{ $preco }} 
###    Sabor: {{ $sabor }}
####   Descrição: 
- {{ $descricao }} 
@endcomponent