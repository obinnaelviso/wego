<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviewRequest;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Resources\Review\ReviewResource;
use App\Model\Review;
use App\Model\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class ReviewController extends Controller
{
    // Show all reviews
    public function index(Customer $customer)
    {
        return ReviewResource::collection($customer->reviews);
    }

    // add review 
    public function add(ReviewRequest $request, Customer $customer)
    {
        $review = new Review;
        $review->booking_id = $request->booking_id;
        $review->review = $request->comment;
        $review->star = $request->ratings;
        // Temp. disable foreign key check to insert car_id and booking_time_id
        Schema::disableForeignKeyConstraints();
        $customer->reviews()->save($review);
        Schema::enableForeignKeyConstraints();
        // Enable back after performing operations
        return response(['data' => new ReviewResource($review)],Response::HTTP_CREATED);
    }

   // show a review
 public function show(Customer $customer, Review $review)
    {
        return new ReviewResource($review);
    }

    // update a review
    public function update(Request $request, Customer $customer, Review $review)
    {
        $request['review'] = $request->comment;
        $request['star'] = $request->ratings;
        unset($request['comment']);
        unset($request['ratings']);
        $review->update($request->all());
        return response(['data' => new ReviewResource($review)],Response::HTTP_CREATED);
    }

    // remove review
    public function remove(Review $review)
    {
        //
    }
}
