<?php 
use GSD\Providers\TodoManager;

class TodoManagerTest extends TestCase{
	public function testImATeapot()
	{
		$obj = new TodoManager;
		$this->assertEquals($obj->imATeapot(), "I'm a teapot.");
	}

	public function testFacade()
	{
		$this->assertEquals(Todo::imATeapot(), "I'm a teapot.");
	}

	public function testMakeListThrowsExceptionWhenExists()
	{
		App::bind('TodoRepositoryInterface', function(){
			$mock=Mockery::mock('GSD\Repositories\TodoRepositoryInterface');
			$mock->shouldReceive('exists')
				->once()
				->andThrow(InvalidArgumentException, "A list with that id already exists");
				//->andReturn(true);
			return $mock;
		});

		Todo::makeList('abc', 'try abc');
	}

	public function testMakeList()
	{
		App::bind('TodoRepositoryInterface', function(){
			$mock = Mockery::mock('GSD\Repositories\TodoRepositoryInterface');
			$mock->shouldReceive('exists')
				->once()
				->andReturn(false);
			return $mock;
		});

		App::bind('ListInterface', function(){
			$mock=Mockery::mock('GSD\Entities\ListInterface');
			$mock->shouldReceive('set')->twice()->andReturn($mock, $mock);
			$mock->shouldReceive('save')->once()->andReturn($mock);
			return $mock;
		});

		$list = Todo::makeList('abc', 'abc yo');
		$this->assertInstanceOf('GSD\Entities\ListInterface', $list);

	}

	public function testAllListsReturnsArray()
	{
		App::bind('TodoRepositoryInterface', function(){
			$mock = Mockery::mock('GSD\Repositories\TodoRepositoryInterface');
			$mock->shouldReceive('getAll')
				->once()
				->andReturn(array());
			return $mock;
		});

		$result = Todo::allLists();
		$this->assertInternalType('array', $result);

	}

	public function testAllArchivedListsReturnsArray()
	{
		App::bind('TodoRepositoryInterface', function(){
			$mock = Mockery::mock('GSD\Repositories\TodoRepositoryInterface');
			$mock->shouldReceive('getAll')
				->once()
				->andReturn(array());
			return $mock;
		});
		$result = Todo::allLists(true);
		$this->assertInternalType('array', $result);
	}

	public function testGetListThrowsExceptionWhenMissing()
	{
		App::bind('TodoRepositoryInterface', function(){
			$mock=Mockery::mock('GSD\Repositories\TodoRepositoryInterface');
			$mock->shouldReceive('exists')
				->once()
				->andReturn(false);
			return $mock;
		});
		Todo::get('abc');
	}

	public function testGetListReturnsCorrectType()
	{
		App::bind('TodoRepositoryInterface', function(){
			$mock=Mockery::mock('GSD\Repositories\TodoRepositoryInterface');
			$mock->shouldReceive('exists')
				->once()
				->andReturn(true);
			$list = Mockery::mock('GSD\Entities\ListInterface');
			$mock->shouldReceive('load')->once()->andReturn($list);
			return $mock;
		});

		$checkList = Todo::get('abc');
		$this->assertInstanceOf('GSD\Entities\ListInterface', $checkList);

	}

}


 ?>