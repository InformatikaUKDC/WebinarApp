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
    public function addNewEvent(Request $request)
    {
        // validation request
        $validate = Validator::make($request->all(), [
            'image' => 'required',
            'title' => 'required|unique:tb_events',
            'description' => 'required',
            'background' => 'required',
            'type_activity' => 'required',
            'speaker' => 'required',
            'link_feedback' => 'required',
        ], [
            'image' => [
                'required' => 'Gambar harus diisi'
            ],
            'title' => [
                'required' => 'Event harus diisi',
                'unique' => 'Event sudah ada'
            ],
            'description' => [
                'required' => 'Deskripsi harus diisi'
            ],
            'background' => [
                'required' => 'Background harus diisi'
            ],
            'type_activity' => [
                'required' => 'Jenis aktivitas harus diisi'
            ],
            'speaker' => [
                'required' => 'Pembicara harus diisi'
            ],
            'link_feedback' => [
                'required' => 'Link feedback harus diisi'
            ]
        ]);
        if ($validate->fails()) {
            return response()->json(['message' => $validate->errors()], 200);
        }

        $event_data = [
            'image' => $request->input('image'),
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'background' => $request->input('background'),
            'type_activity' => $request->input('type_activity'),
            'speaker' => $request->input('speaker'),
            'is_published' => 1,
            'link_feedback' => $request->input('link_feedback')
        ];

        $events = $this->eventsModel::create($event_data);
        return response()->json($events, 201);
    }

    // view events
    public function viewEvents()
    {
        $events = $this->eventsModel->paginate(10);
        return response()->json($events, 200);
    }

    // delete event
    public function deleteEvent($idEvent)
    {
        try {
            $event = $this->eventsModel->where('id', '=', $idEvent)->first();
            if (!empty($event)) {
                $this->eventsModel->where('id', '=', $idEvent)->delete();
                return response()->json('Event telah berhasil dihapus', 200);
            } else {
                return response()->json('Event tidak ditemukan', 200);
            }
        } catch (\Throwable $th) {
            return response()->json('Event gagal dihapus', 200);
        }
    }

    // update event
    public function updateEvent(Request $request, $idEvent)
    {
        // bentuk post adalah JSON
        // search event
        $event = $this->eventsModel->where('id', '=', $idEvent)->first();
        if (!empty($event)) {
            $validate = Validator::make($request->all(), [
                'title' => 'unique:tb_events',
            ], [
                'title' => [
                    'unique' => 'Event sudah ada'
                ]
            ]);
            if ($validate->fails()) {
                return response()->json(['message' => $validate->errors()], 200);
            }

            // update Eloquent
            $this->eventsModel->where('id', '=', $idEvent)->update($request->all());
            return response()->json('Event berhasil diupdate', 200);
        } else {
            return response()->json('Event tidak ditemukan', 200);
        }
    }

    // detail specific event
    public function detailEvent($idEvent)
    {
        $event = $this->eventsModel->where('id', '=', $idEvent)->first();
        if (!empty($event)) {
            return response()->json($event, 200);
        } else {
            return response()->json('Event tidak ditemukan', 200);
        }
    }
}
