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
    public function index()
    {
        $scans = Scanning::orderBy('ID','DESC')->get();
        return response()->json($scans);
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
        $tz = new DateTimeZone('Asia/Kuala_Lumpur');
        $startDate->setTimezone($tz);

        $scan->STATION = $request->input('station');
        $scan->BARCODE = $request->input('barcode');
        $scan->START_TIME = $startDate;
        $scan->EMP_NO = $request->input('empNo');

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
