<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRatingRequest;
use App\Http\Requests\UpdateRatingRequest;
use App\Http\Resources\Admin\RatingResource;
use App\Models\Rating;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RatingsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('rating_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new RatingResource(Rating::with(['services'])->get());
    }

    public function store(StoreRatingRequest $request)
    {
        $user = auth()->user();
        $serviceId = $request->get('service_id');
        $rating = $request->get('rating');
        $comment = $request->get('comment');

        $rating = Rating::create([
            'user_id' => $user->id,
            'service_id' => $serviceId,
            'rating' => $rating,
            'comment' => $comment
        ]);

        return response()->json('Success', 200);
    }

    public function show(Rating $rating)
    {
        $user = auth()->user();
        $userRatings = Rating::where('user_id', '=', $user->id)->pluck('id')->toArray();

        if(!in_array($rating->id, $userRatings)){
            abort_if('You do not have permission to modify this rating.', 403);
        }

        return response()->json($rating);
    }

    public function update(UpdateRatingRequest $request, Rating $rating)
    {
        $comment = $request->get('comment');
        $rate = $request->get('rate');

        $rating->update([
            'rating' => $rate,
            'comment' => $comment
        ]);

        return response()->json($rating);
    }

    public function destroy(Rating $rating)
    {
        $user = auth()->user();
        $userRatings = Rating::where('user_id', '=', $user->id)->pluck('id')->toArray();

        if(!in_array($rating->id, $userRatings)){
            abort_if('You do not have permission to modify this rating.', 403);
        }

        $rating->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function getUserRatings(Request $request)
    {
        $user = auth()->user();
        $ratings = Rating::where('user_id', '=', $user->id)->get();

        return response()->json($ratings);
    }
}
