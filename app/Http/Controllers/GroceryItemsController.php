<?php

namespace App\Http\Controllers;

use App\GroceryItem;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class GroceryItemsController extends Controller
{
    public function index(){
        return GroceryItem::where('bought' , 0)->get();
    }

    public function newGroceryItem(Requests\GroceryItemRequest $request){
        die('x');
        $gi = new GroceryItem();
        $gi->name = $request->get('name');
        $gi->inCart = 0;
        $gi->bought = 0;
        $gi->save();
        return ['Success'=> 'Item Saved'];
        //return "Test";
    }

    public function update(Request $request, $id){
        $validator = \Validator::make($request->all(), ['name'=>'string']);
        if($validator->passes()){
            $gi = GroceryItem::findOrFail($id);
            $gi->fill($request->all());
            $gi->save();
            return ['Success'=> 'Ok'];
        }
        return ['Error' => $validator->errors()->all()];
    }

    public function buyCart(Request $request){
        $validator = \Validator::make($request->all(),
            ['cartItems' => 'required']);

        if($validator->passes()){

            foreach($request->get('cartItems') as $item){
                $gi = GroceryItem::findOrFail($item['id']);
                $gi->fill($item);
                $gi->save();
            }

            return ['Success' => 'Ok'];
        }
        return ['Error' => 'Not Sure, Check API'];
    }
}
