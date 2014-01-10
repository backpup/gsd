<?php 
namespace GSD\Entities;

interface TaskInterface{

	public function isComplete();

	public function description();

	public function dateDue();

	public function dateCompleted();

	public function isNextAction();

	public function setIsComplete($complete);

	public function setDescription($description);

	public function setDateDue($date);

	public function setIsNextAction($nextAction);

	public function set($name, $value);

	public function get($name);
}

 ?>