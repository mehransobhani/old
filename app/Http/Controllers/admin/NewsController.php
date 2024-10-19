<?php

namespace App\Http\Controllers\admin;

use App\News;
use App\Order;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
	public function index(Request $request)
	{
		$news = News::orderBy('id', 'DESC')->paginate(10);

		return view('news.index', compact('news'));
	}

	public function create()
	{
		return view('news.create');
	}

	public function store(Request $request)
	{
		$this->validate($request, [
			'title'   => 'required',
			'content' => 'required',
			'img'     => 'required',
		], [
			'title.required'   => 'لطفا عنوان خبر را وارد نمایید',
			'content.required' => 'لطفا متن خبر را وارد نمایید',
			'img.required'     => 'لطفا تصویر خبر را وارد نمایید',
		]);


		$news = new News($request->all());


		$url = str_replace('-', '', $news->title);
		$url = str_replace('/', '', $url);

		$news->url = preg_replace('/\s+/', '-', $url);

		if ($request->hasFile('img'))
		{
			//dd($request->file('img'));
			$file_name = time() . '.' . $request->file('img')->getClientOriginalExtension();
			if ($request->file('img')->move('upload', $file_name))
			{
				$news->img = $file_name;
			}
		}

		$news->saveOrFail();

		return redirect()->route('admin.newsList');
	}

	public function edit($id)
	{
		$news = News::findOrFail($id);

		return view('news.edit', ['news' => $news]);
	}

	public function update(Request $request, $id)
	{
		$this->validate($request, [
			'title'   => 'required',
			'content' => 'required',
		], [
			'title.required'   => 'لطفا عنوان خبر را وارد نمایید',
			'content.required' => 'لطفا متن خبر را وارد نمایید',
			'img.required'     => 'لطفا تصویر خبر را وارد نمایید',
		]);

		$news = News::findOrFail($id);

		//dd($news);

		if ($request->hasFile('img'))
		{
			$file_name = time() . '.' . $request->file('img')->getClientOriginalExtension();
			//dd($file_name);
			if ($request->file('img')->move('upload', $file_name))
			{
				//unlink('upload/' . $news->img);
				$news->img = $file_name;
				//dd($news->img);
			}
		}

		$url = str_replace('-', '', $request->title);
		$url = str_replace('/', '', $url);

		$news->url = preg_replace('/\s+/', '-', $url);

		$news->title   = $request->title;
		$news->content = $request->input('content');

		$news->update();

		return redirect(route('admin.newsList'));
	}

	public function destroy($id)
	{
		$news = News::findOrFail($id);

		$news->delete();

		return redirect()->back();
	}

	public function del_img($id)
	{
		$news = News::findOrFail($id);
		$url  = $news->img;

		if (!empty($url))
		{
			if (file_exists('upload/' . $url))
			{
				$news->img = '';
				$news->update();
				unlink('upload/' . $url);
			}

		}

		return redirect()->back();
	}
}
