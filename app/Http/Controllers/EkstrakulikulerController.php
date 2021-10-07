<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakulikuler;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class EkstrakulikulerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $ekstrakulikuler = Ekstrakulikuler::all();
            
            return DataTables::of($ekstrakulikuler)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm" data-id='.$row->id.'>Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm" data-id='.$row->id.'>Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        } catch (QueryException $err) {
            return response()->json([
                'message' => 'Failed '.$err->errorInfo,
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'nama' => 'required|string|max:255',
            ]);
    
            if ($validator->fails()) {
                return response()->json([
                    'message' => 'Failed To Create',
                    'data' => $validator->errors(),
                ], Response::HTTP_INTERNAL_SERVER_ERROR);
            }

            $ekstrakulikuler = Ekstrakulikuler::create($validator->validated());

            $response = [
                'message' => 'Ekstrakulikuler Created',
                'data' => $ekstrakulikuler
            ];
            
            return response()->json($response, Response::HTTP_OK);
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Failed '.$e,
            ],Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ekstrakulikuler  $ekstrakulikuler
     * @return \Illuminate\Http\Response
     */
    public function show(Ekstrakulikuler $ekstrakulikuler)
    {
        try {
            $response = [
                'message' => 'Ekstrakulikuler Obtained',
                'data' => $ekstrakulikuler
            ];
            return response()->json($response, Response::HTTP_OK);
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Failed '.$e->errorInfo,
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ekstrakulikuler  $ekstrakulikuler
     * @return \Illuminate\Http\Response
     */
    public function edit(Ekstrakulikuler $ekstrakulikuler)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ekstrakulikuler  $ekstrakulikuler
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ekstrakulikuler $ekstrakulikuler)
    {
        try {
            $rules = [
                'nama' => 'required|string|max:255',
            ];

            $validator = Validator::make($request->all(), $rules);
    
            if ($validator->fails()) {
                return response()->json([
                    'message' => 'Failed To Update',
                    'data' => $validator->errors(),
                ], Response::HTTP_INTERNAL_SERVER_ERROR);
            }
    
            $ekstrakulikuler = $ekstrakulikuler->update($validator->validated());
    
            $response = [
                'message' => 'Ekstrakulikuler Updated',
                'data' => $ekstrakulikuler
            ];
            
            return response()->json($response, Response::HTTP_OK);
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Failed '.$e,
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ekstrakulikuler  $ekstrakulikuler
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ekstrakulikuler $ekstrakulikuler)
    {
        try {
            $ekstrakulikuler->delete();

            $response = [
                'message' => 'Siswa Deleted',
            ];
            return response()->json($response, Response::HTTP_OK);
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Failed '.$e->errorInfo,
            ]);
        }
    }
}
