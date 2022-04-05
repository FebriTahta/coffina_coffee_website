<?php

namespace App\Http\Controllers;
use App\Models\Jenis;
use App\Models\Product;
use Validator;
use DataTables;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function page_jenis(Request $request)
    {
        if(request()->ajax())
        {
            $data   = Jenis::orderBy('id','desc');
            return DataTables::of($data)
                    ->addColumn('option', function($data){
                        $actionBtn = '<a href="#" type="button" data-id="'.$data->id.'" data-name="'.$data->name.'" data-toggle="modal" data-target="#modaledit" class="text-primary" > UPDATE </a>';
                        $actionBtn .= ' <a href="#" type="button" data-id="'.$data->id.'" data-image="'.$data->img.'" data-toggle="modal" data-target="#large" class="text-danger"> DELETE</a>';
                        return $actionBtn;
                    })
            ->rawColumns(['option'])
            ->make(true);
        }

        return view('be.jenis_product');
    }

    public function page_product(Request $request)
    {
        if(request()->ajax())
        {
            $data   = Product::orderBy('id','desc')->with('jenis');
            return DataTables::of($data)
                    ->addColumn('image', function($data){
                        $url=asset("img/product/".$data->img); 
                        return '<img src='.$url.' border="0" width="100px" align="center" />'; 
                    })
                    ->addColumn('option', function($data){
                        $actionBtn = '<a href="#" type="button" data-id="'.$data->id.'" data-deskripsi="'.$data->deskripsi.'" data-src="'.asset('img/product/'.$data->img).'" data-name="'.$data->name.'" data-toggle="modal" data-target="#modaledit" class="text-primary" >UPDATE </a>';
                        $actionBtn .= ' <a href="#" type="button" data-id="'.$data->id.'" data-image="'.$data->img.'" data-toggle="modal" data-target="#large" class="text-danger"> DELETE</a>';
                        return $actionBtn;
                    })
                    ->addColumn('jenis', function($data){
                        $jenis = $data->jenis->name;
                        return $jenis;
                    })
            ->rawColumns(['option','jenis','image'])
            ->make(true);
        }
        $jenis = Jenis::all();
        return view('be.product',compact('jenis'));
    }

    public function store_jenis(Request $request)
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
        
            $data   = Jenis::updateOrCreate(
                [
                    'id' => $request->id
                ],
                [
                    'name'     => $request->name,
                    'slug'     => Str::slug($request->name)
                ]
            );
        }

        return response()->json(
            [
              'status'  => 200,
              'message' => 'Jenis Product has been updated'
            ]
        );
    }

    public function delete_jenis(Request $request)
    {
        $data = Jenis::find($request->id);
        if ($data->product->count() > 0) {
            # code...
            return response()->json(
                [
                  'status'  => 400,
                  'message' => 'Katalog ini mempunyai product, Hapus product pada katalog ini terlebih dahulu untuk menghapus katalog ini'
                ]
            );

        }else {
            # code...
            $data = Jenis::find($request->id)->delete();
            return response()->json(
                [
                  'status'  => 200,
                  'message' => 'Jenis Product has been deleted'
                ]
            );
        }

        
    }

    public function store_product(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'deskripsi' => 'required',
        ]);

        if ($validator->fails()) {

            return response()->json([
                'status'    => 400,
                'message'   => 'Periksa Kembali Inputan Anda',
                'errors'    => $validator->messages(),
            ]);

        }else {
        
            if ($request->img !== null) {
                # code...
                // store file in directory
                $filename   = time().'.'.$request->img->getClientOriginalExtension();
                $request->img->move(public_path('img/product/'), $filename);
                if ($request->jenis_id !== null) {
                    # code...
                    $data   = Product::updateOrCreate(
                        [
                            'id' => $request->id
                        ],
                        [
                            'name'     => $request->name,
                            'deskripsi' => $request->deskripsi,
                            'img' => $filename,
                            'jenis_id' => $request->jenis_id,
                        ]
                    );
                }else {
                    # code...
                    $data   = Product::updateOrCreate(
                        [
                            'id' => $request->id
                        ],
                        [
                            'name'     => $request->name,
                            'deskripsi' => $request->deskripsi,
                            'img' => $filename,
                        ]
                    );
                }
                
            }else {
                # code...
                if ($request->jenis_id !== null) {
                    # code...
                    $data   = Product::updateOrCreate(
                        [
                            'id' => $request->id
                        ],
                        [
                            'name'     => $request->name,
                            'deskripsi' => $request->deskripsi,
                            'jenis_id' => $request->jenis_id,
                        ]
                    );
                }else {
                    # code...
                    $data   = Product::updateOrCreate(
                        [
                            'id' => $request->id
                        ],
                        [
                            'name'     => $request->name,
                            'deskripsi' => $request->deskripsi,
                        ]
                    );
                }
            }

            
        }

        return response()->json(
            [
              'status'  => 200,
              'message' => 'Product has been updated'
            ]
        );
    }

    public function delete_product(Request $request)
    {
        unlink('img/product/'.$request->img);
        $data = Product::find($request->id)->delete();
        return response()->json(
            [
              'status'  => 200,
              'message' => 'Product has been deleted'
            ]
        );
    }
}
