<?php

namespace App\Http\Controllers\admin;

use App\Amazing;
use App\Http\Requests\AmazingRequest;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AmazingController extends Controller
{
	public function index()
	{
		$Amazing = Amazing::orderby('id', 'DESC')->paginate(10);

		return View('amazing.index', ['amazing' => $Amazing]);
	}

	public function create()
	{
		$products = Product::all()->pluck('title', 'id');

		return View('amazing.create', compact('products'));
	}

	public function store(AmazingRequest $request)
	{
		$Amazing            = new Amazing($request->all());
		$Amazing->timestamp = time() + $request->get('time') * 60 * 60;
		$Amazing->saveOrFail();
		$url = 'admin/amazing/' . $Amazing->id . '/edit';

		return redirect($url);
	}

	public function edit($id)
	{
		$Amazing = Amazing::findOrFail($id);

		$products = Product::all()->pluck('title', 'id');

		return view('amazing.edit', ['Amazing' => $Amazing, 'products' => $products]);
	}

	public function update(AmazingRequest $request, $id)
	{
		$Amazing = Amazing::findOrFail($id);
		$time    = $request->get('time');
		if ($time != $Amazing->time)
		{
			$Amazing->timestamp = time() + $time * 60 * 60;
		}
		$Amazing->update($request->all());
		$url = 'admin/amazing/' . $Amazing->id . '/edit';

		return redirect($url);
	}

	public function destroy($id)
	{
		$Amazing = Amazing::findOrFail($id);
		$Amazing->delete();

		return redirect()->back();
	}
}
