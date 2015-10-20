<?php 

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use \Serverfireteam\Panel\CrudController;

use Illuminate\Http\Request;

class programasController extends CrudController{

     public function all($entity){
        parent::all($entity); 

        

			$this->filter = \DataFilter::source(new \App\Programas);
			$this->filter->add('nome', 'Nome', 'text');
			$this->filter->add('id', 'id', 'text');
			$this->filter->submit('buscar');
			$this->filter->reset('resetar');
			$this->filter->build();

			$this->grid = \DataGrid::source($this->filter);
			$this->grid->add('id', 'id');
			$this->grid->add('nome', 'Nome');
			$this->addStylesToGrid();
    
        return $this->returnView();
    }
    
    public function  edit($entity){
        
        parent::edit($entity);

			$this->edit = \DataEdit::source(new \App\Programas());

			$this->edit->label('Grupos');

			$this->edit->add('nome', 'Nome', 'text');
		

        return $this->returnEditView();
    }    
}
