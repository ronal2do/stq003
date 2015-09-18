<?php 

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use \Serverfireteam\Panel\CrudController;

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
			$this->grid->add('email', 'Email');
			$this->grid->add('last_login', 'Ultimo Login');
			$this->addStylesToGrid();

      
                 
        return $this->returnView();
    }
    
    public function  edit($entity){
        
        parent::edit($entity);

     
			$this->edit = \DataEdit::source(new \App\Admins());

			$this->edit->label('Edit Category');

			$this->edit->add('email', 'Name', 'text');
			
			$this->edit->add('code', 'Code', 'text')->rule('required');


       
       
        return $this->returnEditView();
    }    
}
