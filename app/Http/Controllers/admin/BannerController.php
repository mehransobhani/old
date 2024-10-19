<?php

namespace App\Http\Controllers\admin;

use App\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BannerController extends Controller
{
	public function index()
	{
		$banners = Banner::all();

		return view('banners.index', compact('banners'));
	}

	public function edit($id)
	{
		$banner = Banner::findOrFail($id);

		return view('banners.edit', compact('banner'));
	}

	public function update(Request $request, $id)
	{

		$banner = Banner::findOrFail($id);

		//dd($news);

		if ($request->hasFile('img'))
		{
			$file_name = time() . '.' . $request->file('img')->getClientOriginalExtension();
			//dd($file_name);
			if ($request->file('img')->move('upload', $file_name))
			{
				//unlink('upload/' . $news->img);
				$banner->img = $file_name;
				//dd($news->img);
			}
		}

		$banner->title        = $request->title;
		$banner->descriptions = $request->descriptions;
		$banner->url          = $request->url;

		$banner->update();

		return redirect(route('admin.BannerList'));
	}

}
