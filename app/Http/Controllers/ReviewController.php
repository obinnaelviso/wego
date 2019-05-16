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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Customer $customer)
    {
        return ReviewResource::collection($customer->reviews);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReviewRequest $request, Customer $customer)
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer, Review $review)
    {
        return new ReviewResource($review);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer, Review $review)
    {
        $request['review'] = $request->comment;
        $request['star'] = $request->ratings;
        unset($request['comment']);
        unset($request['ratings']);
        $review->update($request->all());
        return response(['data' => new ReviewResource($review)],Response::HTTP_CREATED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer, Review $review)
    {
        $review->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
