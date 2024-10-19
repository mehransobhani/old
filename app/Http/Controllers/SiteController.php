<?php

namespace App\Http\Controllers;

use App\Address;
use App\Amazing;
use App\Banner;
use App\Cart;
use App\Category;
use App\Color;
use App\Comment;
use App\Filter;
use App\Item;
use App\lib\Mobile_Detect;
use App\Mail\ContactMail;
use App\News;
use App\Product;
use App\ProductScore;
use App\Question;
use App\ReView;
use App\Service;
use App\Slider;
use App\CatProduct;
use App\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Mail;
use View;
use DB;
use Auth;
use Validator;
use Session;

class SiteController extends Controller
{
	protected $view;

	public function __construct()
	{

		/*$this->middleware('auth')->only(['show_cart']);*/

		$detect = new Mobile_Detect();
		if ($detect->isMobile() || $detect->isTablet())
		{
			$this->view = 'mobile.';

		}
		else
		{
			$this->view = '';
		}

		$cat = Category::where('parent_id', 0)->limit(9)->get();
		//dd($cat[3]->getChild[0]->getChild);
		View::share('categories', $cat);
	}

	public function index()
	{

		/*if (!\Illuminate\Support\Facades\Auth::check())
		{
			return 'سایت در حال بروزرسانی است!';
		}*/

		$slider          = Slider::orderBy('id', 'DESC')->limit(5)->get();
		$banners         = Banner::all();
		$news            = News::where('static', null)->orderBy('id', 'DESC')->limit(5)->get();
		$product         = Product::with('get_img')->where('product_status', 1)->orderBy('id', 'DESC')->limit(15)->get();
		$order_product   = Product::with('get_img')->where('product_status', 1)->orderBy('order_product', 'DESC')->limit(15)->get();
		$view_product    = Product::with('get_img')->where('product_status', 1)->orderBy('view', 'DESC')->limit(15)->get();
		$new_product     = Product::with('get_img')->where('product_status', 1)->orderBy('created_at', 'DESC')->limit(15)->get();
		$special_product = Product::with('get_img')->where('product_status', 1)->where('special', 1)->orderBy('created_at', 'DESC')->limit(15)->get();
		$amazing         = Amazing::with('get_img')->with('get_product')->orderBy('id', 'DESC')->get();
		$view_name       = $this->view . 'site/index';
		$old_amazing     = Amazing::orderBy('timestamp', 'DESC')->first();

		$siteBanners = array();

		foreach ($banners as $banner)
		{
			$siteBanners[$banner->position]['title']        = $banner->title;
			$siteBanners[$banner->position]['url']          = $banner->url;
			$siteBanners[$banner->position]['descriptions'] = $banner->descriptions;
			$siteBanners[$banner->position]['img']          = $banner->img;
		}

		return view('front-end.home', ['sliders' => $slider, 'siteBanners' => $siteBanners, 'news' => $news, 'products' => $product, 'order_product' => $order_product, 'view_product' => $view_product, 'new_product' => $new_product, 'special_product' => $special_product, 'amazing' => $amazing, 'old_amazing' => $old_amazing]);
	}

	public function show($code, $title)
	{
		$product = Product::with('get_images')->with('get_colors')
			->where(['code_url' => $code, 'title_url' => $title, 'show_product' => 1])->firstOrFail();
		//dd($product);
		$product->view = $product->view + 1;
		$product->update();
		$review = ReView::where(['product_id' => $product->id])->first();
		$items  = Item::get_product_item($product->id);
		//dd($items);
		$item_value = DB::table('item_product')->where('product_id', $product->id)->pluck('value', 'item_id')->toArray();
		//dd($item_value);
		$score_data = ProductScore::get_score($product->id);
		$view_name  = $this->view . 'site/show';

		/*comments section*/
		if (Auth::check())
		{
			$user_id = Auth::user()->id;

			$score   = ProductScore::with('get_user')->where(['user_id' => $user_id, 'product_id' => $product->id])->first();
			$comment = Comment::where(['user_id' => $user_id, 'product_id' => $product->id])->first();
		}
		else
		{
			$score   = null;
			$comment = null;
		}

		$productScores = ProductScore::with(['get_comment' => function ($query) use ($product) {
			$query->where(['product_id' => $product->id, 'status' => 1]);
		}])->where(['product_id' => $product->id])->orderBy('id', 'DESC')->paginate(10);


        $cats = $product->categories->pluck('id')->toArray();
		$relatedCatProducts = CatProduct::whereIn('cat_id',$cats)->distinct()->get()->pluck('product_id');
		$relatedProducts = Product::whereIn('id',$relatedCatProducts)->where('product_status',1)->get();
		$count = $relatedProducts->count();
		$relatedProducts = $relatedProducts->random($count);
		//dd($product->get_images[0]);
		return view('front-end.show_product',
			['product' => $product, 'review' => $review, 'items' => $items, 'item_value' => $item_value, 'score_data' => $score_data, 'score' => $score, 'comment' => $comment, 'productScores' => $productScores,'relatedProducts'=>$relatedProducts]
		);
	}

	public function set_service(Request $request)
	{
		$service_id = $request->get('service_id');
		$product_id = $request->get('product_id');
		$color_id   = $request->get('color_id');
		$product    = Product::with('get_service_name')->find($product_id);
		$colors     = $product->get_colors;
		$check      = Service::where(['parent_id' => $service_id, 'product_id' => $product_id, 'color_id' => $color_id])->orderby('id', 'DESC')->first();
		$view_name  = $this->view . 'include/info_box';

		return View($view_name, ['colors' => $colors, 'service' => $check, 'color_id' => $color_id, 'product' => $product, 'service_id' => $service_id]);
	}

	public function cart(Request $request, $product_id = null)
	{
		$product_id = $request->get('product_id', $product_id);
		$color_id   = $request->get('color_id', 0);
		$service_id = $request->get('service_id', 0);
		$qty        = $request->get('qty', 1);

		$product = Product::findOrFail($product_id);
		if($color_id==0)
		{
		    $minPrice=-1;
		    $prodColor=Color::where("product_id",$product_id)->where("inventory",">",0)->orderBy("price","ASC")->first();
		    if(!$prodColor)
		    return redirect()->back();
		    $color_id=$prodColor->id; 
		}

		$service = Service::where(['product_id' => $product_id, 'color_id' => $color_id, 'parent_id' => $service_id])->first();

		if ($service)
		{
			Cart::add_cart($product_id, $color_id, $service_id);
		}
		else
		{
			if ($color_id == 0 && $service_id != 0)
			{
				$service = Service::findOrFail($service_id);
				Cart::add_cart($product_id, $color_id, $service_id);
			}
            elseif ($color_id != 0 && $service_id == 0)
			{
				Color::where(['id' => $color_id, 'product_id' => $product_id])->firstOrFail();
				Cart::add_cart($product_id, $color_id, $service_id, $qty);
			}
            elseif ($color_id == 0 && $service_id == 0)
			{
				Cart::add_cart($product_id, $color_id, $service_id, $qty);
			}
		}

		//dd(Cart::get());

		session()->put('shopping_cart', true);

		return redirect()->back();
		//return redirect()->route('site.shoppingCart');

	}

	public function show_cart()
	{
		$view_name = $this->view . 'site/cart';

		$cart_data = Cart::get();
		//dd(auth()->user()->id);
		//$shipping = Address::with('get_shahr')->with('get_ostan')->where('user_id', auth()->user()->id)->orderBy('id', 'DESC')->get();

		return view('front-end.shopping_cart', compact('cart_data'));
	}

	public function del_cart(Request $request)
	{
		if ($request->ajax())
		{
			$product_id = $request->get('product_id', 0);
			$color_id   = $request->get('color_id', 0);
			$service_id = $request->get('service_id', 0);
			Cart::remove($product_id, $service_id, $color_id);
			$view_name = $this->view . 'include/ajax_cart';

			$cart_data = Cart::get();

			return view('front-end.ajax_shopping_cart', compact('cart_data'));
		}
	}

	public function change_cart(Request $request)
	{
		if ($request->ajax())
		{

			$product_id = $request->get('product_id', 0);
			$color_id   = $request->get('color_id', 0);
			$service_id = $request->get('service_id', 0);
			$number     = $request->get('number', 0);
			Cart::change($product_id, $service_id, $color_id, $number);
			$view_name = $this->view . 'include/ajax_cart';

			$cart_data = Cart::get();

			return view('front-end.ajax_shopping_cart', compact('cart_data'));
		}
	}

	public function check_login(Request $request)
	{
		if ($request->ajax())
		{
			if (Auth::check())
			{
				?>
				<?php

			}
			else
			{
				?>
                <script>
                    $("#myModal").modal('show');
                </script>
				<?php
			}
		}
	}

	public function comment_form($product)
	{
		$e = explode('-', $product);
		if (sizeof($e) == 2)
		{
			if ($e[0] == 'DKP')
			{
				$user_id = Auth::user()->id;
				$product = Product::with('get_img')->findOrFail($e[1]);
				$score   = ProductScore::with('get_user')->where(['user_id' => $user_id, 'product_id' => $product->id])->first();
				$comment = Comment::where(['user_id' => $user_id, 'product_id' => $product->id])->first();

				return View('site.comment_form', ['product' => $product, 'score' => $score, 'comment' => $comment]);
			}
			else
			{
				return view(404);
			}
		}
		else
		{
			return view(404);
		}
	}

	public function add_score(Request $request)
	{
		$range      = $request->get('range');
		$product_id = $request->get('product_id');
		if (is_array($range))
		{
			$user_id = Auth::user()->id;
			$count   = ProductScore::where(['user_id' => $user_id, 'product_id' => $product_id])->count();
			$time    = time();
			if ($count == 0)
			{
				$score_value = '';
				foreach ($range as $key => $value)
				{
					settype($value, 'integer');
					$v           = is_integer($value) ? $value : 0;
					$score_value .= $key . '_' . $value . '@#';
				}
				DB::table('product_score')->insert([
					'product_id' => $product_id,
					'value'      => $score_value,
					'user_id'    => $user_id,
					'time'       => $time
				]);
			}

		}

		return redirect()->back();
	}

	public function add_comment(Request $request)
	{
		$Validator = Validator::make($request->all(),
			['subject' => 'required'], [], ['subject' => 'عنوان نقد و بررسی']);
		if ($Validator->fails())
		{

			return redirect()->back()->withErrors($Validator)->withInput();
		}
		else
		{
			$product_id = $request->get('product_id');
			$product    = Product::findOrFail($product_id);
			$user_id    = Auth::user()->id;
			$count      = ProductScore::where(['user_id' => $user_id, 'product_id' => $product_id])->count();
			if ($count > 0)
			{

				$advantages    = $request->get('advantages');
				$disadvantages = $request->get('disadvantages');
				$a             = '';
				$d             = '';
				if (is_array($advantages))
				{
					foreach ($advantages as $key => $value)
					{
						$a .= $value . '@$E@';
					}
				}
				if (is_array($disadvantages))
				{
					foreach ($disadvantages as $key => $value)
					{
						$d .= $value . '@$E@';
					}
				}
				$Comment                = new Comment();
				$Comment->subject       = $request->get('subject');
				$Comment->product_id    = $product_id;
				$Comment->comment_text  = $request->get('comment_text');
				$Comment->advantages    = $a;
				$Comment->disadvantages = $d;
				$Comment->user_id       = $user_id;
				$Comment->status        = 0;
				$Comment->save();

			}

			return redirect()->back();
		}

	}

	public function get_tab_data(Request $request)
	{
		$tab_id     = $request->get('tab_id');
		$product_id = $request->get('product_id');
		define('product_id', $product_id);
		if ($request->ajax())
		{
			if ($tab_id == 'comment')
			{

				$productScores = ProductScore::with(['get_comment' => function ($query) {
					$query->where(['product_id' => product_id, 'status' => 1]);
				}])->where(['product_id' => $product_id])->orderBy('id', 'DESC')->paginate(10);

				if (Auth::check())
				{
					$user_id = Auth::user()->id;

					$score   = ProductScore::with('get_user')->where(['user_id' => $user_id, 'product_id' => $product_id])->first();
					$comment = Comment::where(['user_id' => $user_id, 'product_id' => $product_id])->first();
				}
				else
				{
					$score   = null;
					$comment = null;
				}

				return view('front-end.product_comment', ['productScores' => $productScores, 'product_id' => $product_id, 'comment' => $comment, 'score' => $score]);
			}
            elseif ($tab_id == 'question')
			{
				$question = Question::with('get_parent')->where(['product_id' => $product_id, 'status' => 1, 'parent_id' => 0])->orderBy('id', 'DESC')->paginate(10);

				return View('include.add_question', ['product_id' => $product_id, 'question' => $question]);
			}
			else
			{
				return 'error';
			}
		}
	}

	public function add_question(Request $request)
	{
		$product_id = $request->get('product_id');
		$Validator  = Validator::make($request->all(),
			['question' => 'required'], [], ['question' => 'متن پرسش']);
		if ($Validator->fails())
		{
			return redirect()->back()->withErrors($Validator)->withInput();
		}
		else
		{
			$user_id = Auth::user()->id;
			Product::findOrFail($product_id);
			$Question          = new Question($request->all());
			$Question->time    = time();
			$Question->user_id = $user_id;
			$Question->status  = 0;
			$Question->save();
			Session::put('status', 'پرسش شما با موفقیت ثبت شده و بعد از تایید مدیریت نمایش داده میشه');

			return redirect()->back();
		}
	}

	public function compare($product1, $product2 = null, $product3 = null, $product4 = null)
	{
		$array = ['product1' => $product1, 'product2' => $product2, 'product3' => $product3, 'product4' => $product4];
		$data  = array();
		foreach ($array as $key => $value)
		{
			if (!empty($value))
			{
				$a = explode('-', $value);
				if (sizeof($a) == 2)
				{
					if ($a[0] == 'DKP')
					{

						$product_id = $a[1];
						$data[$key] = $product_id;
					}
				}
			}
		}

		$items_id      = Item::check_item_product($data);
		$mode          = collect($items_id)->mode();
		$products      = array();
		$product_items = array();
		if (sizeof($mode) == 1)
		{
			$id       = $mode[0];
			$i        = Item::findOrFail($id);
			$cat_list = Category::where('parent_id', $i->cat_id)->pluck('cat_name', 'id')->toArray();
			$items    = Item::with('get_child')->where(['cat_id' => $i->cat_id, 'parent_id' => 0])->get();
			$i        = 0;
			foreach ($items_id as $key => $value)
			{
				if ($value == $id)
				{
					$product      = Product::with('get_img')->where(['id' => $key, 'show_product' => 1])->first();
					$products[$i] = $product;

					$product_items[$key] = DB::table('item_product')->where(['product_id' => $key])->pluck('value', 'item_id')->toArray();

					$i++;
				}
			}

			return view('front-end.compare', ['items' => $items, 'product_items' => $product_items, 'products' => $products, 'cat_list' => $cat_list]);
		}
		else
		{
			return view('404');
		}

	}

	public function get_compare_product(Request $request)
	{
		$cat_id     = $request->get('cat_id');
		$product_id = DB::table('cat_product')->where('cat_id', $cat_id)->pluck('product_id', 'id')->toArray();
		$product    = Product::with('get_img')->select(['title', 'code', 'id'])->whereIn('id', $product_id)->where(['show_product' => 1])->OrderBy('view', 'DESC')->limit(40)->get()->toJson();

		return $product;
	}

	public function viewNews($url)
	{
		$news = News::where('url', $url)->firstOrFail();

		return view('front-end.view_news', compact('news'));
	}

	public function showContact()
	{
		return view('front-end.contact_us');
	}

	public function sendContact(Request $request)
	{
		Mail::send(new ContactMail($request));

		return redirect('/');
	}

	public function listNews()
	{
		$news = News::where('static', null)->orderBy('id', 'desc')->paginate(5);

		//dd($news);

		return view('front-end.list_news', compact('news'));
	}

	public function showPage($page)
	{
		if ($page == 'about')
			$pageId = 1;
        elseif ($page == 'projects')
			$pageId = 2;
        elseif ($page == 'works')
			$pageId = 3;
        elseif ($page == 'free_delivery')
			$pageId = 4;
        elseif ($page == 'cod')
			$pageId = 5;
        elseif ($page == 'support')
			$pageId = 6;
        elseif ($page == 'guarantee')
			$pageId = 7;
        elseif ($page == 'راهنمای-خرید-از-تجهیزلند')
			$pageId = 11;
        elseif ($page == 'نحوه-ثبت-سفارش')
			$pageId = 12;
        elseif ($page == 'رویه-ارسال-سفارش')
			$pageId = 13;
        elseif ($page == 'شیوه-های-پرداخت')
			$pageId = 14;
        elseif ($page == 'قوانین-تجهیزلند')
			$pageId = 15;
        elseif ($page == 'شرایط-بازگرداندن-کالا')
			$pageId = 16;
        elseif ($page == 'تجهیز-رستوران')
			$pageId = 17;
        elseif ($page == 'تجهیز-کافی-شاپ')
			$pageId = 18;
        elseif ($page == 'تجهیز-فست-فود')
			$pageId = 19;
        elseif ($page == 'تجهیز-آشپزخانه-صنعتی')
			$pageId = 20;
        elseif ($page == 'تولید-انواع-یخچال-فروشگاهی')
			$pageId = 21;
        elseif ($page == 'فروش-محصولات-در-تجهیزلند')
			$pageId = 22;
        elseif ($page == 'خدمات-پس-از-فروش')
			$pageId = 23;
        elseif ($page == 'پرسش-های-متداول')
			$pageId = 24;
		else
			return abort(404);


		$news = News::findOrFail($pageId);

		return view('front-end.view_news', compact('news'));

	}

}
