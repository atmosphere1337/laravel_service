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
			'name' => 'required',
			'number' => 'required',
			'mail' => 'required',
		]);
		$model = new Person($data);
		$model->save();
		Mail::to('boldyrevstudy@gmail.com')->send(new Mailer($model));
		return response()->json([
		'success' => 'true',
		]);	
	}
}
