<?php

namespace App\Http\Controllers;

use App\Models\Scanning;
use Illuminate\Http\Request;
use DateTime;
use DateTimeZone;

class ScanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        // $scans = Scanning::where('EMP_NO', $id)->orderBy('START_TIME','DESC')->get();
        // return response()->json($scans);
        if (Scanning::where('EMP_NO', $id)->exists()) {
            $data = Scanning::where('EMP_NO', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($data, 200);
        } else {
            return response()->json([
                "message" => "Product not exists"
            ], 404);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $scan = new Scanning();

        $startDate = new DateTime($request->input('startTime'));
        $endDate = new DateTime($request->input('endTime'));
        $startRest = new DateTime($request->input('startRestTime'));
        $endRest = new DateTime($request->input('endRestTime'));

        $tz = new DateTimeZone('Asia/Kuala_Lumpur');

        $startDate->setTimezone($tz);
        $endDate->setTimezone($tz);
        $startRest->setTimezone($tz);
        $endRest->setTimezone($tz);

        if (!empty($request->input('startRestTime')) && !empty($request->input('endRestTime'))) {
            $scan->START_REST_TIME = $startRest;
            $scan->END_REST_TIME = $endRest;
            $scan->STATION = $request->input('station');
            $scan->BARCODE = $request->input('barcode');
            $scan->START_TIME = $startDate;
            $scan->END_TIME = $endDate;
            $scan->EMP_NO = $request->input('empNo');
        } else {
            $scan->STATION = $request->input('station');
            $scan->BARCODE = $request->input('barcode');
            $scan->START_TIME = $startDate;
            $scan->END_TIME = $endDate;
            $scan->EMP_NO = $request->input('empNo');
        }

        $scan->save();
        return response()->json($scan);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
