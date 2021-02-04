<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Worker;

class IdentityController extends Controller
{
    public function checkStaff($id)
    {
        $staff = Worker::where('empNo', $id)
                    ->take(1)
                    ->get();

        return response()->json($staff);
    }

    public function allStaffs()
    {
        $staffs = Worker::get();
        return response()->json($staffs);
    }

    public function createStaff(Request $request)
    {
        $staff = new Worker();

        $staff->EmpNo = $request->input('empNo');
        $staff->EmpName = $request->input('empName');
        $staff->Company = $request->input('company');
        $staff->Division = $request->input('division');
        $staff->Department = $request->input('department');

        $staff->save();
        return response()->json($staff);
    }

    public function updateStaff(Request $request, $id)
    {
        if (Worker::where('EmpNo', $id)->exists()) {
            $staff = Worker::find($id->EmpNo);
            $staff->EmpNo = is_null($request->empNo) ? $staff->EmpNo : $request->empNo;
            $staff->EmpName = is_null($request->empName) ? $staff->EmpName : $request->empName;
            $staff->Company = is_null($request->company) ? $staff->Company : $request->company;
            $staff->Division = is_null($request->division) ? $staff->Division : $request->division;
            $staff->Department = is_null($request->department) ? $staff->Department : $request->department;

            $staff->save();

            return response()->json([
                "message" => "records updated successfully"
            ], 200);
        } else {
            return response()->json([
                "message" => "Staff not found"
            ], 404);
        }
    }

    public function deleteStaff($id)
    {
        if (Worker::where('EmpNo', $id)->exists()) {
            $staff = Worker::find($id->EmpNo);
            $staff->delete();

            return response()->json([
                "message" => "records deleted"
            ], 202);
        } else {
            return response()->json([
                "message" => "Staff not found"
            ], 404);
        }
    }
}
