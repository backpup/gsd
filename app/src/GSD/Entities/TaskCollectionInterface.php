<?php 
namespace GSD\Entities;

interface TaskCollectionInterface{
	public function add(TaskInterface $task);

	public function get($index);

	public function getAll();

	public function remove($index);

}


 ?>
