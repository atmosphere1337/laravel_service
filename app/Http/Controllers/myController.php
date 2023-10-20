<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;
use Mail;
use App\Mail\Mailer;

class myController extends Controller
{
    public function main(Request $request)
	{
		$data = $request->validate([
			'name' => 'required|min:2',
			'number' => 'required|numeric|digits:11',
			'mail' => 'required|email',
		]);
		$model = new Person($data);
		$model->save();
		Mail::to('boldyrevstudy@gmail.com')->send(new Mailer($model));
		return response()->json([
		'success' => 'true',
		]);	
	}
}
