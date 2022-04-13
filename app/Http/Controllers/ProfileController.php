<?php

namespace App\Http\Controllers;
use App\Models\Profile;
use App\Models\About;
use Validator;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function page_profile(Request $request)
    {
        $profile = Profile::first();
        return view('be.profile',compact('profile'));
    }

    public function page_about(Request $request)
    {
        $profile = About::first();
        return view('be.about',compact('profile'));
    }

    public function store_profile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'warna_bg' => 'required',
            'warna_text' => 'required',
        ]);

        if ($validator->fails()) {

            return response()->json([
                'status'    => 400,
                'message'   => 'Periksa Kembali Inputan Anda',
                'errors'    => $validator->messages(),
            ]);

        }else {
            
            if ($request->warna_bg == "#000000" || $request->warna_text == "#000000") {
                # code...
                return response()->json([
                    'status'    => 400,
                    'message'   => 'Geser / Ubah warna background dan text. Tidak bisa set data default Hitam Pekat',
                    'errors'    => 'Geser / Ubah warna background dan text. Tidak bisa set data default Hitam Pekat',
                ]);
            }else {
                # code...
                // store file in directory
                if ($request->icon !== null && $request->logo !== null) {
                    # code...
                    $filename1   = time().'_'.$request->icon->getClientOriginalName();
                    $request->icon->move(public_path('img/icon/'), $filename1);
    
                    $filename2   = time().'_'.$request->logo->getClientOriginalName();
                    $request->logo->move(public_path('img/logo/'), $filename2);
    
                    $data   = Profile::updateOrCreate(
                        [
                            'id' => $request->id
                        ],
                        [
                            'icon'     => $filename1,
                            'logo'     => $filename2,
                            'email'    => $request->email,
                            'warna_bg' => $request->warna_bg,
                            'warna_text' => $request->warna_text
                        ]
                    );
    
                }elseif ($request->icon !== null && $request->logo == null) {
                    # code...
                    $filename1   = time().'_'.$request->icon->getClientOriginalName();
                    $request->icon->move(public_path('img/icon/'), $filename1);
    
                    $data   = Profile::updateOrCreate(
                        [
                            'id' => $request->id
                        ],
                        [
                            'icon'     => $filename1,
                            'email'    => $request->email,
                            'warna_bg' => $request->warna_bg,
                            'warna_text' => $request->warna_text
                        ]
                    );
                }elseif ($request->icon !== null && $request->logo == null) {
                    # code...
                    $filename2   = time().'_'.$request->logo->getClientOriginalName();
                    $request->logo->move(public_path('img/logo/'), $filename2);
    
                    $data   = Profile::updateOrCreate(
                        [
                            'id' => $request->id
                        ],
                        [
                            'logo'     => $filename2,
                            'email'    => $request->email,
                            'warna_bg' => $request->warna_bg,
                            'warna_text' => $request->warna_text
                        ]
                    );
                }
    
                return response()->json(
                    [
                    'status'  => 200,
                    'message' => 'Profile has been updated'
                    ]
                );
            }
             
            
        }
       
    }

    public function store_about(Request $request)
    {
        if ($request->img !== null ) {
            # code...
            $filename1   = time().'_'.$request->img->getClientOriginalName();
            $request->img->move(public_path('img/about/'), $filename1);

            $data   = About::updateOrCreate(
                [
                    'id' => $request->id
                ],
                [
                    'img'     => $filename1,
                    'title'     => $request->title,
                    'deskripsi' => $request->deskripsi,
                ]
            );
        }else {
            # code...
            $data   = About::updateOrCreate(
                [
                    'id' => $request->id
                ],
                [
                    'title'     => $request->title,
                    'deskripsi' => $request->deskripsi,
                ]
            );
        }

        return response()->json(
            [
              'status'  => 200,
              'message' => 'About Us has been updated'
            ]
        );
    }
}
