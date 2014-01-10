<?php 
namespace GSD\Providers;

use Illuminate\Support\ServiceProvider;

class TodoServiceProvider extends ServiceProvider{

	public function register()
	{
		$this->app['todo']=$this->app->share(function(){
			return new TodoManager;
		});

		$this->app->bind('GSD\Entities\ListInterface', 'GSD\Entities\TodoList');
	}
//What we're doing here is creating a service provider that will bind a TodoManager to the Ioc
//container with a key named todo
}



 ?>