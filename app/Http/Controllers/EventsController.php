<?php

namespace App\Http\Controllers;

use App\Models\Events;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EventsController extends Controller
{
    public $eventsModel;
    public function __construct()
    {
        $this->eventsModel = new Events();
    }

    // post new Events
    public function addNewEvents(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'title' => 'unique:tb_events'
        ], [
            'title:unique' => 'Event sudah ada'
        ]);
        if ($validate->fails()) {
            return response()->json($validate->customMessages, 200);
        }
        $events = $this->eventsModel::create($request->all());
        return response()->json($events, 201);
    }

    public function viewEvents()
    {
        return response()->json('View Events', 200);
    }
}
