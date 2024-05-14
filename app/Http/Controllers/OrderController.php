<?php

namespace App\Http\Controllers;

use App\Models\order;
use Illuminate\Http\Request;
use App\Models\orderitem;
use Stripe;
use Session;
use Illuminate\Support\Facades\DB;
use Auth;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function order()
    {
        // jesy ye data idr q ana jab ap bhej hi ni rhy
        // request tb hi execute hoti jab us m data ho or wo data form sy ata ya phr api sy
        // or checkout py apka session ja rha hona cart wala 
        return view('checkout');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function process_order(Request $req)
    {

        // Set your secret key. Remember to switch to your live secret key in production.
        // See your keys here: https://dashboard.stripe.com/apikeys
        \Stripe\Stripe::setApiKey(env('SK_STRIPE'));
        // Token is created using Stripe Checkout or Elements!
        // Get the payment token ID submitted by the form:
        try {
            $charge = \Stripe\Charge::create([
               
                'amount' => 1 * 100,
                'currency' => 'usd',
                'description' => 'Charg for one dollar from 2nd batch 2nd',
                'source' => $req->stripeToken,
            ]);
            // dd($charge);
            $cart=Session::get('cart',[]);
        
            $order= new order;
            $order->firstname=isset($req->firstname)?$req->firstname:'';
            $order->lastname=isset($req->lastname)?$req->lastname:'';
            $order->email=isset($req->email)?$req->email:'';
            $order->adress=isset($req->adress)?$req->adress:'';
            $order->phoneno=isset($req->phoneno)?$req->phoneno:'';
            $order->country=isset($req->country)?$req->country:'';
            $order->state=isset($req->state)?$req->state:'';
            $order->zipcod=isset($req->zipcod)?$req->zipcod:'';
            $order->userid=(Auth::user())?Auth::user()->id:0;
            $order->total = 1;
            $order->charge_id = $charge->id;
            $order->trx_id = $charge->balance_transaction;
            $order->payment_type = ($req->payment_type == "card") ? "card" : "cod";
            $order->save();

            foreach ($cart as $key => $value) {
                orderitem::insert([
                    "order_id"=> $order->id,
                    "item_id"=>$value['id'],
                    "quantity"=>$value['quantity'],
                    "sub_total" => $value['price'],
                    "total" => $value['price'] * $value['quantity'],
                ]); 
            }
            // or checkout py apka session ja rha hona cart wala 
            return redirect(route('thankyou'));

        } catch (\Throwable $th) {
            return($th->getMessage());
        }

        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function order_completed() {
        return view("layouts.thankyou");
    }
    

    /**
     * Display the specified resource.
     */
    public function show(order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(order $order)
    {
        //
    }

    public function get_orders() {
        // $orders = order::get();
        // $orderArray = [];
        // foreach($orders as $order) {
        //     $orderArray[$order->id] = array(
        //         'order' => $order,
        //         'items' => $order->getOrderItems
        //     );
        // }
        
        // // dd($orderArray);
        // // $data->getOrder;
        // $data['users'] = $users;
        // return view('admin.order', $data);
        $order=DB::table('orders')->get();
        // dd($order);
        return view('admin.order', ['order'=>$order]);
    }
    public function about(){
        return view('about');
    }
    public function contact(){
        return view('contact');
    }
}
