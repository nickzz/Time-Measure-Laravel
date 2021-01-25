<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;

class IdentityController extends Controller
{
    public function checkStaff($id)
    {
        if (Staff::where('EmpNo', $id)->exists()) {
            $staff = Staff::where('EmpNo', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($staff, 200);
        } else {
            return response()->json([
                "message" => "Staff not found"
            ], 404);
        }
    }

    public function allStaffs()
    {
        $staffs = Staff::get()->toJson(JSON_PRETTY_PRINT);
        return response($staffs, 200);
    }

    public function createStaff(Request $request)
    {
        $staff = new Staff();

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
        if (Staff::where('EmpNo', $id)->exists()) {
            $staff = Staff::find($id->EmpNo);
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
        if (Staff::where('EmpNo', $id)->exists()) {
            $staff = Staff::find($id->EmpNo);
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
