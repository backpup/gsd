<?php 
namespace GSD\Providers;

use App;

class TodoManager{

	public function imATeapot()
	{
		return "I'm a teapot.";
	}

	public function makeList($id, $title)
	{
		$repository = App::make('TodoRepositoryInterface');
		if($repository->exists($id))
		{
			throw new \InvalidArgumentException("A list with that id already exists");
		}
		$list = App::make('ListInterface');
		$list->set('id', $id)
			 ->set('title', $title)
			 ->save();
		return $list;
	}

	public function allLists($archived=false)
	{
		$repository = App::make('TodoRepositoryInterface');
		return $repository->getAll($archived);
	}

	public function get($id, $archived=false)
	{
		$repository = App::make('TodoRepositoryInterface');
		if( !$repository->exists($id, $archived))
		{
			throw new \RuntimeException("List id=$id not found");
		}
		return $repository->load($id, $archived);
	}

}


 ?>