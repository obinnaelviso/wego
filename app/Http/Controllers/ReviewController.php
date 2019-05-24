<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviewRequest;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Resources\Review\ReviewResource;
use App\Model\Review;
use App\Model\Customer;
use App\Model\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class ReviewController extends Controller
{
    public function __construct() {
        $this->middleware('auth:api')->except('index','show');
    }
    
    // Show all reviews
    public function index(Customer $customer)
    {
        return ReviewResource::collection($customer->reviews);
    }

    // add review 
    public function add(ReviewRequest $request, Customer $customer, Booking $booking)
    {
        $review = new Review;
        $review->booking_id = $booking->id;
        $review->review = $request->comment;
        $review->star = $request->ratings;
        $review->status = $request->status;
        // Save
        $customer->reviews()->save($review);
        // Enable back after performing operations
        return response(['data' => new ReviewResource($review)],Response::HTTP_CREATED);
    }

   // show a review
 public function show(Customer $customer, Booking $booking, Review $review)
    {
        return new ReviewResource($review);
    }

    // update a review
    public function update(Request $request, Customer $customer, Booking $booking, Review $review)
    {
        $review->review = $request->comment;
        $review->star = $request->ratings;
        $review->status = "edited";
        // Save
        $customer->reviews()->save($review);
        return response(['data' => new ReviewResource($review)],Response::HTTP_CREATED);
    }

    // remove review
    public function remove(Customer $customer, Booking $booking, Review $review)
    {
        //
    }
}
