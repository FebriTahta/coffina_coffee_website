<?php

namespace App\Http\Controllers;
use App\Models\Choice;
use App\Models\Message;
use Validator;
use DataTables;
use Illuminate\Http\Request;

class ChoiceController extends Controller
{
    public function page_choice(Request $request)
    {
        if(request()->ajax())
        {
            $data   = Choice::orderBy('id','desc');
            return DataTables::of($data)
                    ->addColumn('option', function($data){
                        $actionBtn = '<a href="#" type="button" data-id="'.$data->id.'" data-name="'.$data->name.'" data-toggle="modal" data-target="#modaledit" class="text-primary" > UPDATE </a>';
                        $actionBtn .= ' <a href="#" type="button" data-id="'.$data->id.'" data-toggle="modal" data-target="#large" class="text-danger"> DELETE</a>';
                        return $actionBtn;
                    })
            ->rawColumns(['option'])
            ->make(true);
        }
        return view('be.choice');
    }

    public function store_choice(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validator->fails()) {

            return response()->json([
                'status'    => 400,
                'message'   => 'Periksa Kembali Inputan Anda',
                'errors'    => $validator->messages(),
            ]);

        }else {
        
            $data   = Choice::updateOrCreate(
                [
                    'id' => $request->id
                ],
                [
                    'name'     => $request->name,
                ]
            );
        }

        return response()->json(
            [
              'status'  => 200,
              'message' => 'Multiple Choice has been updated'
            ]
        );
    }

    public function delete_choice(Request $request)
    {
        $id=$request->id;
        $choice = Choice::find($request->id);
        $all = Message::all();
        foreach ($all as $key => $value) {
            # code...
            $value->choice($request->id)->detach();
        }
        return response()->json(
            [
              'status'  => 200,
              'message' => 'Multiple Choice has been Deleted'
            ]
        );
    }

    public function store_message(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validator->fails()) {

            return response()->json([
                'status'    => 400,
                'message'   => 'Periksa Kembali Inputan Anda',
                'errors'    => $validator->messages(),
            ]);

        }else {
        
            $data   = Message::updateOrCreate(
                [
                    'id' => $request->id
                ],
                [
                    'name'     => $request->name,
                    'email'     => $request->email,
                    'phone'     => $request->phone,
                    'deskripsi'     => $request->deskripsi,
                    'status'     => 'belum dibaca',
                ]
            );

            if ($request->choice_id !== null) {
                # code...
                $data->choice()->attach($request->choice_id);
            }
        }

        return response()->json(
            [
              'status'  => 200,
              'message' => 'Message successfully sent'
            ]
        );
    }

    public function page_message(Request $request)
    {
        return view('be.message');
    }  
    
    public function change_status_message($id)
    {
        $data = Message::find($id);

        if ($data->status == 'belum dibaca') {
            # code...
            $data->update([
                'status' => 'sudah dibaca',
            ]);

            return response()->json(
                [
                  'status'  => 200,
                  'message' => 'Seen message'
                ]
            );
        }
    }

    public function remove_message($id)
    {
        Message::find($id)->delete();
        return response()->json(
            [
              'status'  => 200,
              'message' => 'remove message'
            ]
        );
    }
}
