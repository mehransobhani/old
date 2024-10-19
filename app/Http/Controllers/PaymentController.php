<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Order;
use Illuminate\Http\Request;
use Session;
use App\Classes\Getway\Zibal\Verify;
use App\Category; 
use View;
use App\Classes\SMS\OrderMessage;
use App\Classes\SMS\SMS;
use App\User; 
use App\Color; 
use App\OrderRow;
class PaymentController
{
    
        public function __construct()
    {
         $cat = Category::where('parent_id', 0)->get();
        View::share('categories', $cat);
    }
    public function requestPayment(Request $request)
    {
        if (Cart::has()) {
            if (Session::has('order_data')) {
                $pay_type = $request->get('pay_radio');
                settype($pay_type, 'integer');
                if (is_integer($pay_type)) {
                    $price = Session::get('price', 0);

                    $order = new Order();
                    $result = $order->add_order($pay_type);

                    $requestPayment = new \App\Classes\Getway\Zibal\Request();
                    $response = $requestPayment->request($price, $result->id);
                    if ($response->result == 100) {
                        $startGateWayUrl = "https://gateway.zibal.ir/start/" . $response->trackId;
                        return \Illuminate\Support\Facades\Redirect::secure($startGateWayUrl);
                    } else {
                        return redirect()->back()->with('error', $response->message);
                    }
                }
            } else {
                return redirect()->back();
            }
        } else {
            return redirect()->route('site.shipping');
        }
    }

    public
    function verifyPayment(Request $request)
    {
           $success = $request->get("success");
        $orderId = $request->get("orderId");
        $trackId = $request->get("trackId"); 
        if ( !$orderId || !$success || !$trackId)
            return view("payment.failed");
        if ($success == 1) {
            $veryfy = new Verify();
            $response = $veryfy->veryfy($trackId);
            if ($response->result == 100) {
                Order::where("id", $orderId)->update(["pay_status" => 1, "code1" => $trackId]);
                $orderRow = OrderRow::where("order_id", $orderId)->get();
                foreach ($orderRow as $row) {
                    $color = Color::find($row->color_id);
                    $color->inventory = $color->inventory - $row->number;
                    $color->save();
                }
                
                 try {
                    $order = Order::find($orderId);
                    $user = User::find($order->user_id);
                    SMS::send(OrderMessage::message($orderId), $user->username);
                }
                catch (\Throwable $throwable)
                {
                    $url = url('user/order?id=') . $orderId;
                   return redirect($url);
                }
                $url = url('user/order?id=') . $orderId;
                return redirect($url);
            }
        }
        Order::where("id", $orderId)->update(["order_status" => -1]);
        return view("payment.failed");
    }
}
