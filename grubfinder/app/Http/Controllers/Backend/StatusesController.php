<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StatusRequest;
use App\Models\Status;
use Illuminate\Http\Request;

class StatusesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Status $status)
    {
        //
        $statuses = $status->get();
//        return $statuses;
        return view('statuses.index', compact('statuses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('statuses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StatusRequest $statusRequest ,Status $status)
    {
        //
        $status->create($statusRequest->all());
        return redirect()->route('backend.statuses.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Status $status
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Status $status)
    {
        return view('statuses.update', compact('status'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param Status $status
     * @param StatusRequest $statusRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Status $status, StatusRequest $statusRequest)
    {
        $status->update($statusRequest->all());
        return redirect()->route('backend.statuses.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Status $status
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Status $status)
    {
        //
        $status->delete();
        return redirect()->route('backend.statuses.index');
    }
}
