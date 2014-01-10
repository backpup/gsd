<?php 
namespace GSD\Entities;

interface ListInterface{

	public function load($id);

	public function save();

	public function id();

	public function isArchived();

	public function isDirty();

	public function get($name);

	public function set($name, $value);

	public function title();

	public function archive();

	public function taskAdd($task);

	public function taskCount();

	public function task($index);

	public function taskGet($index, $name);

	public function taskSet($index, $name, $value);

	public function tasks();

	public function taskRemove($index);




}


 ?>