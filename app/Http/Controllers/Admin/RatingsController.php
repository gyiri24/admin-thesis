<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyRatingRequest;
use App\Http\Requests\StoreRatingRequest;
use App\Http\Requests\UpdateRatingRequest;
use App\Models\Rating;
use App\Models\Service;
use App\Models\Transaction;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RatingsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('rating_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ratings = Rating::with(['service'])->get();

        return view('admin.ratings.index', compact('ratings'));
    }

    public function create()
    {
        abort_if(Gate::denies('rating_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $services = Service::pluck('name', 'id');

        return view('admin.ratings.create', compact('services'));
    }

    public function store(StoreRatingRequest $request)
    {
        $data = $request->only('rating', 'comment', 'service');

        Rating::create([
            'rating' => $data['rating'],
            'service_id' => $data['service'],
            'comment' => $data['comment'] ?? null,
            'user_id' => auth()->user()->id ?? null
        ]);

        return redirect()->route('admin.ratings.index');
    }

    public function edit(Rating $rating)
    {
        abort_if(Gate::denies('rating_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $services = Transaction::pluck('price', 'id');

        $rating->load('services');

        return view('admin.ratings.edit', compact('rating', 'services'));
    }

    public function update(UpdateRatingRequest $request, Rating $rating)
    {
        $rating->update($request->all());
        $rating->services()->sync($request->input('services', []));

        return redirect()->route('admin.ratings.index');
    }

    public function show(Rating $rating)
    {
        abort_if(Gate::denies('rating_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rating->load('services');

        return view('admin.ratings.show', compact('rating'));
    }

    public function destroy(Rating $rating)
    {
        abort_if(Gate::denies('rating_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rating->delete();

        return back();
    }

    public function massDestroy(MassDestroyRatingRequest $request)
    {
        $ratings = Rating::find(request('ids'));

        foreach ($ratings as $rating) {
            $rating->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
