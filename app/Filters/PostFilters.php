<?php 

namespace App\Filters;

use App\User;
use Illuminate\Http\Request;

Class PostFilters

{

	protected $request;
	protected $builder;

	public function __contruct(Request $request)
	{
		$this->request = $request;
	}

	public function apply($builder)
	{
		if (! $username  = $this->request->by) return $builder;

		return $this->by($builder , $username);

	}

	protected function by($builder $username)
	{

		$user = User::where('name' , $username)->firstOrFail();

		return $bulder->where('user_id' , $user->id);
	}

}
