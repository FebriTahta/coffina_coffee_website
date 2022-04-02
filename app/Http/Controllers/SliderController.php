<?php

namespace App\Http\Controllers;
use Validator;
use App\Models\Slider;
use DataTables;
use File;
use Illuminate\Http\Request;

class SliderController extends Controller
{

    public function page_slider(Request $request)
    {
        if(request()->ajax())
        {
            $data   = Slider::orderBy('id','desc');
            return DataTables::of($data)
                    ->addColumn('image', function($data){
                        $url=asset("img/slider/".$data->img); 
                        return '<img src='.$url.' border="0" width="100px" align="center" />'; 
                    })
                    ->addColumn('option', function($data){
                        $actionBtn = '<a href="#" type="button" data-id="'.$data->id.'" data-image="'.$data->img.'" data-toggle="modal" data-target="#modaledit" data-mini_title="'.$data->mini_title.'" data-src="'.asset('img/slider/'.$data->img).'" data-long_title="'.$data->long_title.'" class="text-primary" >UPDATE | </a>';
                        $actionBtn .= ' <a href="#" type="button" data-id="'.$data->id.'" data-image="'.$data->img.'" data-toggle="modal" data-target="#large" class="text-danger"> DELETE</a>';
                        return $actionBtn;
                    })
            ->rawColumns(['option','image'])
            ->make(true);
        }
        return view('be.slider');
    }

    public function store_slider(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'mini_title' => 'nullable',
            'long_title' => 'nullable',
            'img'        => 'required'
        ]);

        if ($validator->fails()) {

            return response()->json([
                'status'    => 400,
                'message'   => 'Periksa Kembali Inputan Anda',
                'errors'    => $validator->messages(),
            ]);

        }else {

            // store file in directory
            $filename   = time().'_'.$request->img->getClientOriginalExtension();
            $request->img->move(public_path('img/slider/'), $filename);
            
            // store surat masuk
            $data   = Slider::updateOrCreate(
                [
                    'id' => $request->id
                ],
                [
                    'mini_title'     => $request->mini_title,
                    'long_title'     => $request->long_title,
                    'img'            => $filename,
                ]
            );

            return response()->json(
                [
                  'status'  => 200,
                  'message' => 'Slide show & ads has been updated'
                ]
            );
        }
    }

    public function update_slider(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'mini_title' => 'nullable',
            'long_title' => 'nullable',
        ]);

        if ($validator->fails()) {

            return response()->json([
                'status'    => 400,
                'message'   => 'Periksa Kembali Inputan Anda',
                'errors'    => $validator->messages(),
            ]);

        }else {

            if ($request->img !== null) {
                # img tidak kosong code...
                //REMOVE FILE
                $file_lama = Slider::find($request->id);
                unlink('img/slider/'.$file_lama->img);

                // store file in directory
                $filename   = time().'_'.$request->img->getClientOriginalExtension();
                $request->img->move(public_path('img/slider/'), $filename);
                
                // store surat masuk
                $data   = Slider::updateOrCreate(
                    [
                        'id' => $request->id
                    ],
                    [
                        'mini_title'     => $request->mini_title,
                        'long_title'     => $request->long_title,
                        'img'            => $filename,
                    ]
                );


            }else {
                # img kosong code...
                $data   = Slider::updateOrCreate(
                    [
                        'id' => $request->id
                    ],
                    [
                        'mini_title'     => $request->mini_title,
                        'long_title'     => $request->long_title,
                    ]
                );
            }
            

            return response()->json(
                [
                  'status'  => 200,
                  'message' => 'Slide show & ads has been updated'
                ]
            );
        }
    }

    public function delete_slider(Request $request)
    {
        
        //REMOVE FILE
        unlink('img/slider/'.$request->img);
        //REMOVE DATA
        $data = Slider::where('id',$request->id)->delete();

        return response()->json(
            [
            'status'  => 200,
            'message' => 'Slide show & ads has been Deleted'
            ]
        );
    }
}
