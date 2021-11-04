<?php

namespace App\Http\Controllers\Site;

use App\Comment;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;


class CommentController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'max:55',
            'email' => 'email|required|max:55',
            'comment' => 'required|max:1000'
        ]);
        if ($validator->fails()) {
            toastr()->error(trans('Error in filling form'));
            return redirect()->back()->withErrors($validator);
        }

        $comment = Comment::create(array_merge($request->all() , [
            'user_identity' => (Auth::check())? Auth::user()->id : $_SERVER['REMOTE_ADDR'],
            'status' => 'pending'
        ]));

        if($comment) {
            toastr()->success(trans('Your comment has been submitted and will be displayed after approval'));
            return redirect()->back();
        } else {
            toastr()->error(trans('Error in filling form'));
            return redirect()->back();
        }
    }

    public function reviews(Request $request){
        $pid = $request->pid;
        $comments = Comment::where('product_id',$pid)->get();
        $product = Product::findOrFail($pid);

        return view('site/product/reviews', compact('comments','product'));
    }
}
