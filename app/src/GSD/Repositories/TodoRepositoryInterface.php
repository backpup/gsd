<?php 
namespace GSD\Repositories;

use GSD\Entities\ListInterface;

interface TodoRepositoryInterface{

	public function load($id, $archived=false);

	public function exists($id, $archived=false);

	public function getAll($archived=false);

	public function save($id, ListInterface $list, $archived=false);
}




 ?>