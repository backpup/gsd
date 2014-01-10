<?php 
namespace GSD\Entities;
use GSD\Repositories\TodoRepositoryInterface;

class TodoList implements ListInterface{

	protected $repository;
	protected $tasks;
	protected $attributes;
	protected $isDirty;

	//List attributes -------------------------------

	//List operations -------------------------------

	//Task operations -------------------------------

	public function __construct(TodoRepositoryInterface $repo, TaskCollectionInterface $collection)
	{
		$this->repository = $repo;
		$this->tasks = $collection;
		$this->attributes = array();
		$this->isDirty = false;
	}

	public function load($id)
	{
		throw new \Exception('not implemented');
	}

	public function save()
	{
		if($this->isDirty)
		{
			$archived = !empty($this->attributes['archived']);
			if(!array_key_exists($id, $this->attributes))
			{
				throw new \RuntimeException("cannot save if id is not set");
			}
			$id = $this->attributes['id'];
			if(! $this->repository->save($id, $this, $archived))
			{
				throw new \RuntimeException("Repository could not save");
			}
			$this->isDirty = false;
		}
		return $this;
	}

	public function id()
	{
		throw new \Exception('not implemented');
	}

	public function isArchived()
	{
		throw new \Exception('not implemented');
	}

	public function isDirty()
	{
		throw new \Exception('not implemented');
	}

	public function get($name)
	{
		throw new \Exception('not implemented');
	}

	public function set($name, $value)
	{
		throw new \Exception('not implemented');
	}

	public function title()
	{
		throw new \Exception('not implemented');
	}

	public function archive()
	{
		throw new \Exception('not implemented');
	}

	public function taskAdd($task)
	{
		throw new \Exception('not implemented');
	}

	public function taskCount()
	{
		throw new \Exception('not implemented');
	}

	public function task($index)
	{
		throw new \Exception('not implemented');
	}

	public function taskGet($index, $name)
	{
		throw new \Exception('not implemented');
	}

	public function taskSet($index, $name, $value)
	{
		throw new \Exception('not implemented');
	}

	public function tasks()
	{
		throw new \Exception('not implemented');
	}

	public function taskRemove($index)
	{
		throw new \Exception('not implemented');
	}


}




 ?>