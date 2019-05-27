<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviewRequest;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Resources\ReviewResource;
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
    public function all()
    {
        return ['message' => 200, 
                'error' => [], 
                'data' => ReviewResource::collection(Review::all())];
    }

    // Show all reviews by customer
    public function index(Customer $customer)
    {
        return ['message' => 200, 
                'error' => [], 
                'data' => ReviewResource::collection($customer->reviews)];
    }

    // add review 
    public function add(ReviewRequest $request, Customer $customer, Booking $booking)
    {
        $review = new Review;
        $review->booking_id = $booking->id;
        $review->review = $request->comment;
        $review->star = $request->ratings;
        // Save
        $customer->reviews()->save($review);
        // Enable back after performing operations
        return response(['message' => 202, 
                        'error' => [], 
                        'data' => new ReviewResource($review)],Response::HTTP_OK);
    }

    // update a review
    public function update(ReviewRequest $request, Customer $customer, Booking $booking, Review $review)
    {
        $review->review = $request->comment;
        $review->star = $request->ratings;
        $review->status = "edited";
        // Save
        $customer->reviews()->save($review);
        return response(['message' => 203, 
                        'error' => [], 
                        'data' => new ReviewResource($review)],Response::HTTP_OK);
    }

    // remove review
    public function remove(Customer $customer, Booking $booking, Review $review)
    {
        //
    }
}
