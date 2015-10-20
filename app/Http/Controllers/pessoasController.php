<?php 

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use \Serverfireteam\Panel\CrudController;

use Illuminate\Http\Request;

class pessoasController extends CrudController{

     public function all($entity){
        parent::all($entity); 

        

			$this->filter = \DataFilter::source(new \App\Pessoas);
			$this->filter->add('nome', 'Nome', 'text');
			$this->filter->add('id_grupo', 'Grupo', 'text');
			$this->filter->add('id_programa', 'Programa', 'text');
			$this->filter->submit('buscar');
			$this->filter->reset('resetar');
			$this->filter->build();

			$this->grid = \DataGrid::source($this->filter);
			$this->grid->add('nome', 'Nome');
			$this->grid->add('sexo', 'Sexo');
			$this->grid->add('nascimento', 'nascimento');
			$this->grid->add('responsavel', 'Responsável');
			$this->grid->add('email', 'Email');
			$this->grid->add('tel-fixo', 'Telefone Fixo');
			$this->grid->add('rua', 'Logradouro');
			$this->grid->add('numero', 'Numero');
			$this->grid->add('bairro', 'bairro');
			$this->grid->add('id_grupo', 'Grupo');
			$this->grid->add('id_programa', 'Programa');
			$this->addStylesToGrid();
    
        return $this->returnView();
    }
    
    public function  edit($entity){
        
        parent::edit($entity);

			$this->edit = \DataEdit::source(new \App\Pessoas());

			$this->edit->label('Mailling');

			$this->edit->add('nome', 'Nome','text' );
			$this->edit->add('sexo', 'Sexo','text');
			$this->edit->add('nascimento', 'Nascimento','text');
			$this->edit->add('responsavel', 'Responsável','text');
			$this->edit->add('email', 'Email','text');
			$this->edit->add('tel-fixo', 'Telefone Fixo','text');
			$this->edit->add('tel-celular', 'Telefone Celular','text');
			$this->edit->add('rua', 'Logradouro','text');
			$this->edit->add('numero', 'Numero','text');
			$this->edit->add('complemento', 'Complemento','text');
			$this->edit->add('bairro', 'bairro','text');
			$this->edit->add('cidade', 'cidade','text');
			$this->edit->add('estado', 'estado','text');
			$this->edit->add('id_grupo', 'Grupo', 'select')->options(\App\Grupos::lists("nome","id")->all());
			$this->edit->add('id_programa', 'Programa', 'select')->options(\App\Programas::lists("nome","id")->all());

        return $this->returnEditView();
    } 
}
