<?php 

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use \Serverfireteam\Panel\CrudController;

use Illuminate\Http\Request;

class gruposController extends CrudController{

    public function all($entity){
        parent::all($entity); 

        

			$this->filter = \DataFilter::source(new \App\Grupos);
			$this->filter->add('nome', 'Nome', 'text');
			$this->filter->submit('buscar');
			$this->filter->reset('resetar');
			$this->filter->build();

			$this->grid = \DataGrid::source($this->filter);
			$this->grid->add('nome', 'Nome');
			$this->addStylesToGrid();
    
        return $this->returnView();
    }
    
    public function  edit($entity){
        
        parent::edit($entity);

			$this->edit = \DataEdit::source(new \App\Grupos());

			$this->edit->label('Grupos');

			$this->edit->add('nome', 'Nome', 'text');
		

        return $this->returnEditView();
    }    
}
