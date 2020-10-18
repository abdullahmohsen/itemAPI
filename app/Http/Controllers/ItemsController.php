<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ItemsController extends Controller
{
    public function index()
    {
        $items = Item::all();
        return response()->json($items);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'text' => 'required',
            'body'=> 'required'
          ]);

          if($validator->fails()){
            $response = array('response' => $validator->messages(), 'success' => false);
            return $response;
          } else {
            // Create item
            $item = new Item;
            $item->text = $request->input('text');
            $item->body = $request->input('body');
            $item->save();

            return response()->json($item);
          }
    }

    public function show($id)
    {
        $items = Item::findOrFail($id);
        return response()->json($items);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'text' => 'required',
            'body'=> 'required'
          ]);

          if($validator->fails()){
            $response = array('response' => $validator->messages(), 'success' => false);
            return $response;
          } else {
            // Find an item
            $item = Item::findOrFail($id);
            $item->text = $request->input('text');
            $item->body = $request->input('body');
            $item->save();

            return response()->json($item);
        }
    }

    public function destroy($id)
    {
        $item = Item::findOrFail($id);
        $item->delete();
        $response = array('response' => 'Item deleted', 'success' => true);
        return $response;
    }
}
