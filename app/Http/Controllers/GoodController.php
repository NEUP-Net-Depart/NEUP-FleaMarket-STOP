<?php

namespace App\Http\Controllers;

use App\UserInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use App\GoodCat;
use App\GoodInfo;
use App\Transaction;
use App\TransactionLog;
use App\Http\Controllers\Controller;

class GoodController extends Controller
{
    /**
     * @function GoodController@getList
     * @input Request $request
     * @return View
     * @description Get the list of all goods.
     */
    public function getList(Request $request)
    {
        $data = [];
        $data['cats'] = GoodCat::orderby('cat_name', 'asc')->get();
        $data['goods'] = GoodInfo::orderby('id', 'asc')->get();
		if($request->session()->has('user_id')) 
		    $data['user_id'] = $request->session()->get('user_id');
		else 
		    $data['user_id'] = NULL;
		if($request->session()->has('is_admin'))
	        $data['is_admin'] = $request->session()->get('is_admin');
		else 
		    $data['is_admin'] = NULL;
        return view::make('good.goodList')->with($data);
    }

    public function check(Request $request)
    {
        $data = [];
        $user_id = $request->session()->get('user_id');
        $data['goods'] = Transaction::where('seller_id',$user_id)->where('status',1)->get();
        $data['sells'] = Transaction::where('seller_id',$user_id)->where('status',2)->get();
        $data['mysells'] = Transaction::where('seller_id',$user_id)->where('status',4)->get();
        $data['users'] = Transaction::where('buyer_id',$user_id)->where('status',3)->get();
        $data['transactions'] = Transaction::where('buyer_id',$user_id)->where('status',2)->get();
        return view::make('good.goodCheck')->with($data);
    }

    /**
     * @function GoodController@getInfo
     * @input Request $request, $good_id
     * @return View
     * @description Get the information of a specify goods.
     */
    public function getInfo(Request $request, $good_id)
    {
        $data = [];
        $data['goods'] = GoodInfo::where('id', $good_id)->first();
        $data['users'] = UserInfo::where('id',$data['goods']->user_id)->first();
        $data['sells'] = Transaction::where('good_id',$good_id)->first();
		if($request->session()->has('user_id')) 
		    $data['user_id'] = $request->session()->get('user_id');
		else 
		    $data['user_id'] = NULL;
		if($request->session()->has('is_admin'))
		    $data['is_admin'] = $request->session()->get('is_admin');
		else 
		    $data['is_admin'] = NULL;
        return view::make('good.goodInfo')->with($data);
    }

    public function allow(Request $request, $id)
    {
        $data = [];
        $user_id = $request->session()->get('user_id');
        $data['buyers'] = Transaction::where('id',$id)->first();
        $good = Transaction::find($id);
        if($good->status==1)
        $good->status = 2;
        else if($good->status==2&&$user_id==$good->seller_id)
            $good->status==3;
        else if($good->status==2&&user_id==$good->buyer_id)
            $good->status==4;
        else if($good->status==4||$good->status==3)
            $good->status=5;
        $good->save();
        return Redirect::to('/good');
    }

    public function getGood(Request $request, $good_id)
    {
        $data = GoodInfo::find($good_id);
        $buy = new Transaction;
        $buy->good_id = $good_id;
        $buy->buyer_id = $request->session()->get('user_id');
        $buy->seller_id = $data->user_id;
        $buy->status = 1;
        $buy->save();
        return Redirect::to('/good');
    }

    public function mygood(Request $request)
    {
        $data = [];
        $user_id = $request->session()->get('user_id');
        $data['mygoods'] = GoodInfo::where('user_id',$user_id)->get();
        return view::make('good.mygood')->with($data);
    }
    /**
     * @function GoodController@addGood
     * @input Request $request
     * @return Redirect
     * @description Add a new good.
     */
    public function addGood(Request $request)
    {
        if($request->method() == "GET"){
            $data = [];
			if(!$request->session()->has('user_id')) 
			    return Redirect::back();
            $data['cats'] = GoodCat::orderby('cat_name', 'asc')->get();
            return view::make('good.addPage')->with($data);
        }else{
			if(!$request->session()->has('user_id')) 
		        return Redirect::back();
            $this->validate($request, [
                'good_name' => 'required',
                'description' => 'required',
                'pricemin' => 'required',
                'pricemax' => 'required',
                'counts' => 'required',
            ]);
            $input = $request->all();
            $good = new GoodInfo;
            $good->good_name = $input['good_name'];
            $good->cat_id = $input['cat_id'];
            $good->description = $input['description'];
            $good->pricemin = $input['pricemin'];
            $good->pricemax = $input['pricemax'];
            $good->type = $input['type'];
            $good->counts = $input['counts'];
            $good->good_tag = $input['good_tag'];
            $good->user_id = $request->session()->get('user_id');
            $good->save();
            return Redirect::to('/good/add');
        }
    }

    /**
     * @function GoodController@editGood
     * @input Request $request, $good_id
     * @return Redirect
     * @description Edit a specify good.
     */
    public function editGood(Request $request, $good_id)
    {
        if($request->method() == "GET"){
            $data = [];
            $data['cats'] = GoodCat::orderby('cat_name', 'asc')->get();
            $data['goods'] = GoodInfo::where('id', $good_id)->get();
            return view::make('good.editPage')->with($data);
        }else{
			if(!$request->session()->has('user_id')) 
			    return Redirect::back();
            $this->validate($request, [
                'good_name' => 'required',
                'cat_id' => 'required',
                'description' => 'required',
                'pricemin' => 'required',
                'pricemax' => 'required',
                'type' => 'required',
                'counts' => 'required',
            ]);
            $input = $request->all();
            $good = GoodInfo::find($good_id);
			if($request->session()->get('user_id')!=$good->user_id && !$request->session()->has('is_admin')) 
		        return Redirect::back();
            $good->good_name=$input['good_name'];
            $good->cat_id=$input['cat_id'];
            $good->description=$input['description'];
            $good->pricemin=$input['pricemin'];
            $good->pricemax=$input['pricemax'];
            $good->type=$input['type'];
            $good->counts=$input['counts'];
            $good->good_tag=$input['good_tag'];
            $good->update();
            return Redirect::to('/good/'.$good_id.'/edit');
        }
    }

    /**
     * @function GoodController@deleteGood
     * @input Request $request, $good_id
     * @return Redirect
     * @description Delete a specify good.
     */
    public function deleteGood(Request $request, $good_id)
    {
        if(!$request->session()->has('user_id'))
            return Redirect::back();
        $good = GoodInfo::find($good_id);
        if($request->session()->get('user_id')!=$good->user_id)
            return Redirect::back();
        $good->delete();
        return Redirect::to('/good');
    }

	/*
	 * @function quickAccess
	 * @input $request (use query)
	 *
	 * @return Redirect or View
	 * @description Process the query and redirect to
	 *				certain good or list
	 */
	public function quickAccess(Request $request)
	{
		$data = [];
		$query = $request->input('query');
        $data['cats'] = GoodCat::orderby('cat_name', 'asc')->get();
		$data['goods'] = GoodInfo::where('good_name', 'like', $query)->get();
		if($request->session()->has('user_id')) 
		    $data['user_id'] = $request->session()->get('user_id');
		else 
		    $data['user_id'] = NULL;
		if($request->session()->has('is_admin'))
	        $data['is_admin'] = $request->session()->get('is_admin');
		else 
		    $data['is_admin'] = NULL;
        return view::make('good.goodList')->with($data);
	}
}
