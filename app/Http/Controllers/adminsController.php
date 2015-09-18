<?php 

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use \Serverfireteam\Panel\CrudController;
use Hash;
use Illuminate\Http\Request;

class adminsController extends CrudController{

    public function all($entity){
        parent::all($entity); 

       
			$this->filter = \DataFilter::source(new \App\Admins);
			$this->filter->add('name', 'Email', 'text');
			$this->filter->submit('buscar');
			$this->filter->reset('resetar');
			$this->filter->build();

			$this->grid = \DataGrid::source($this->filter);
			$this->grid->add('id', 'id');
			$this->grid->add('first_name', 'Nome');
			$this->grid->add('email', 'Email');
			$this->grid->add('created_at', 'Criado em:');
			$this->grid->add('updated_at', 'Atualizado em:');
			$this->addStylesToGrid();

      
                 
        return $this->returnView();
    }
    
    public function  edit($entity){
        
        parent::edit($entity);

		    \App\Admins::creating(function($data) {
		        $data->password = Hash::make(\Request::input('password'));
		    });
	
			$this->edit = \DataEdit::source(new \App\Admins());

			$this->edit->label('Editar Administradores');

			$this->edit->add('first_name', 'Name', 'text');
		
			$this->edit->add('email', 'email', 'text')->rule('required');

			$this->edit->add('password', 'Senha', 'text')->rule('required');


       
        return $this->returnEditView();
    }    
}
