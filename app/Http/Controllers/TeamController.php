<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Team;
use App\Models\Sosmed;
use Validator;
use DataTables;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function page_team(Request $request)
    {
        if(request()->ajax())
        {
            $data   = Team::orderBy('id','desc')->with('user','sosmed');
            return DataTables::of($data)
                    ->addColumn('image', function($data){
                        $url=asset("img/team/".$data->img); 
                        return '<img src='.$url.' border="0" width="100px" align="center" />'; 
                    })
                    ->addColumn('option', function($data){
                        $actionBtn = '<a href="#" type="button" data-id="'.$data->id.'" data-deskripsi="'.$data->deskripsi.'" data-position="'.$data->position.'" data-src="'.asset('img/team/'.$data->img).'" data-name="'.$data->name.'" data-email="'.$data->user->email.'" data-pass="'.$data->user->pass.'" data-toggle="modal" data-target="#modaledit" class="text-primary" >UPDATE </a>';
                        $actionBtn .= ' <a href="#" type="button" data-id="'.$data->id.'" data-image="'.$data->img.'" data-toggle="modal" data-target="#large" class="text-danger"> DELETE</a>';
                        return $actionBtn;
                    })
                    ->addColumn('email', function($data){
                        return $data->user->email;
                    })
                    ->addColumn('pass', function($data){
                        return $data->user->pass;
                    })
                    ->addColumn('sosmed', function($data){
                        $add = '<a href="#" data-id="'.$data->id.'" data-toggle="modal" data-target="#modaladdsosmed" class="text-primary"> add social media</a>';
                        $sosmed = [];
                        if ($data->sosmed->count()) {
                            # code...
                            foreach ($data->sosmed as $key => $value) {
                                # code...
                                $sosmed[] = '<a href="#" class="text-danger" data-toggle="modal" data-target="#modaleditsosmed" data-link="'.$value->link.'" data-name="'.$value->name.'" data-id="'.$value->id.'" data-team_id="'.$value->team_id.'">'.$value->name.'</a>';
                            }
                            return $add.'<br>'.implode('<br>',$sosmed);
                        }else {
                            # code...
                            return $add;
                        }
                        
                    })
            ->rawColumns(['option','image','email','pass','sosmed'])
            ->make(true);
        }

        return view('be.team');
    }

    public function store_team(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'deskripsi' => 'required',
            'positon' => 'require'
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
                $request->img->move(public_path('img/team/'), $filename);
                
                $data   = Team::updateOrCreate(
                    [
                        'id' => $request->id
                    ],
                    [
                        'name'     => $request->name,
                        'deskripsi' => $request->deskripsi,
                        'img' => $filename,
                        'position' => $request->position,
                    ]
                );
                
            }else {
                # code...
                $data   = Team::updateOrCreate(
                    [
                        'id' => $request->id
                    ],
                    [
                        'name'     => $request->name,
                        'deskripsi' => $request->deskripsi,
                        'position' => $request->position,
                    ]
                );
            }

            $user   = User::updateOrCreate(
                [
                    'id' => $request->id
                ],
                [
                    'username'     => $data->name,
                    'email' => $request->email,
                    'team_id' => $data->id,
                    'pass' => $request->pass,
                    'role' => 'admin',
                    'password' => Hash::make($request->pass),
                ]
            );
        }

        return response()->json(
            [
              'status'  => 200,
              'message' => 'Team has been Added'
            ]
        );
    }

    public function delete_team(Request $request)
    {
        if ($request->id == auth()->user()->id) {
            # code...
            return response()->json([
                'status'    => 400,
                'message'   => 'Cant remove self account',
            ]);
        }
        else {
            # code...
            $team = Team::find($request->id);
            if ($team->sosmed->count() > 0) {
                # code...
                Sosmed::where('team_id',$team->id)->delete();
            }
            unlink('img/team/'.$request->img);
            User::where('team_id', $request->id)->first()->delete();
            Team::find($request->id)->delete();

            return response()->json(
                [
                'status'  => 200,
                'message' => 'Team has been Deleted'
                ]
            );
        }
        
    }

    public function store_sosmed(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'link' => 'required',
            'team_id' => 'required'
        ]);

        if ($validator->fails()) {

            return response()->json([
                'status'    => 400,
                'message'   => 'Periksa Kembali Inputan Anda',
                'errors'    => $validator->messages(),
            ]);

        }else {

            $sosmed   = Sosmed::updateOrCreate(
                [
                    'id' => $request->id
                ],
                [
                    'name'     => $request->name,
                    'team_id' => $request->team_id,
                    'link' => $request->link,
                ]
            );

        }

        return response()->json(
            [
            'status'  => 200,
            'message' => 'Social media has been added'
            ]
        );
    }

    public function delete_sosmed(Request $request)
    {
        Sosmed::find($request->id)->delete();
        return response()->json(
            [
            'status'  => 200,
            'message' => 'Social media has been deleted'
            ]
        );

    }
}
