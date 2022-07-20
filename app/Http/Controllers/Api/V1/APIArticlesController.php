<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Articles;

class APIArticlesController extends Controller
{
    public function show(){
        return response()->json([
            "message" => "Request Success",
            "data" => Articles::all(),
        ], 200);
    }

    public function create(Request $request){
        $validator = Validator::make($request->all(), [
            'title' => 'string|required',
            'content' => 'string|required',
            'image' => 'string|required',
            'category_id' => 'integer|required',
        ]);

        if($validator->fails()){
            return response()->json([
                'message' => $validator->errors(),
            ], 422);
        }

        $data = [
            'title' => $request->title,
            'content' => $request->content,
            'image' => $request->image,
            'user_id' => Auth::user()->id,
            'category_id' => $request->category_id,
        ];

        $query = Articles::create($data);

        if($query){
            return response()->json([
                'message' => 'Input Article Success',
            ]);
        } else {
            return response()->json([
                'message' => 'Cant Input Article',
            ]);
        }
    }

    public function update(Request $request){
        $validator = Validator::make($request->all(), [
            'id' => 'integer|required',
            'data.*.title' => 'string',
            'data.*.content' => 'string',
            'data.*.image' => 'string',
            'data.*.category_id' => 'integer',
        ]);

        if($validator->fails()){
            return response()->json([
                'message' => $validator->errors(),
            ], 422);
        }

        // Contoh inputan
        /* 
            {
                'id' : 1, //ID Buku
                'data' : [
                    {
                        'title' : 'Book Title',
                        'content' : 'Book Content',
                    },
                ]
            }
        */

        $data = $request->data[0];
        $data['user_id'] = Auth::user()->id;

        $query = Articles::where('id', $request->id)->update($request->data[0]);

        if($query){
            return response()->json([
                'message' => 'Update Article Success',
            ]);
        } else {
            return response()->json([
                'message' => 'Cant Update Article',
            ]);
        }
    }

    public function delete(Request $request){
        $validator = Validator::make($request->all(), [
            'id' => 'integer|required',
        ]);

        if($validator->fails()){
            return response()->json([
                'message' => $validator->errors(),
            ], 422);
        }

        $query = Articles::where('id', $request->id)->delete();

        if($query){
            return response()->json([
                'message' => 'Delete Article Success',
            ]);
        } else {
            return response()->json([
                'message' => 'Cant Delete Article',
            ]);
        }
    }
}
