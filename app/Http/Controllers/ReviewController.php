<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        $review= Review::get();

        return view('customer.review', [
            'review'=> $review

        ]);




    }
    public function store(Request $request)
    {
        //dd($request);
        $review= $request-> writereview;


        $this->validate($request, [
            'writereview'=> 'required',


        ]);
        review::create([
            "body"=>$review,
            "customer_id"=>4,

        ]);

        return Redirect('/review');


    }
}
