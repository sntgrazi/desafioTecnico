<?php

namespace App\Http\Controllers;

use App\Models\Pessoa;

class PessoaController extends Controller  {

    public function index()
    {
        $people = Pessoa::all(); 

        return view('welcome', compact('people'));
    }

    public function store() {

        
        $pessoa = Pessoa::create([ 
            'nome'=> request()->input('nome'),
            'email' => request()->input('email'),   
            'telefone'=> request()->input('telefone'),
            'data_nascimento'=> request()->input('data_nascimento'),
        ]);

        $pessoa->save();

        return redirect()->route('/')->with('success','');
    }

    public function update($id){
        $pessoa = Pessoa::find($id);    
        $pessoa->update([
            'nome'=> request()->input('nome'),
            'email'=> request()->input('email'),
            'telefone'=> request()->input('telefone'),
            'data_nascimento'=> request()->input('data_nascimento'),
            ]); 

        $pessoa->save();

        return redirect()->route('/')->with('success','');
    }

    public function destroy($id)	{
        $pessoa = Pessoa::find($id);
        $pessoa->delete();
        return redirect()->route('/')->with('success','');
    }




}