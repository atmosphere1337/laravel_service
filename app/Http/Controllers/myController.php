<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;

class myController extends Controller
{
    public function main(Request $request)
	{
		$data = $request->validate([
			'name' => 'required',
			'number' => 'required',
			'mail' => 'required',
		]);
		$model = new Person($data);
		$model->save();
		return response()->json([
		'hello' => '1',
		'world' => '2',
		]);	
	}
}
