<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExportController extends Controller
{
    public function admin_user_reports(Request $request)
    {
        ini_set('max_execution_time', 0);

        $dateFrom = Carbon::createFromFormat('Y-m-d', $request->date_from)->startOfDay();
        $dateTo = Carbon::createFromFormat('Y-m-d', $request->date_to)->endOfDay();
        $type = $request->user_type;

        $query = DB::table('users')
            ->whereBetween('created_at', [$dateFrom, $dateTo]);

        if (!empty($type)) {
            $query->where('user_type', $type);
        }

        $data = $query->get();

        $excelContent = "SN,Full Name,,Email,Username, User Status, User Type,  Date Created\n"; // Header row
        $i = 0;

        foreach ($data as $item) {
            $i++;
            if ($item->user_status == 1){
                $status = 'Activated';
            }else{
                $status = 'Deactivated';
            }

            if ($item->user_type == 1){
                $user_type = "User";
            }elseif ($item->user_type == 2){
                $user_type = "Model";
            }else{
                $user_type = "Admin";
            }
            $excelContent .= "$i,{$item->name},,{$item->email},{$item->username},{$status},{$user_type},{$item->created_at}\n";
        }
        $headers = array(
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=user_reports.csv",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        );
        return response()->stream(
            function () use ($excelContent) {
                echo $excelContent;
            },
            200,
            $headers
        );

    }

    public function admin_payment_reports(Request $request)
    {
        ini_set('max_execution_time', 0);

        $dateFrom = Carbon::createFromFormat('Y-m-d', $request->date_from)->startOfDay();
        $dateTo = Carbon::createFromFormat('Y-m-d', $request->date_to)->endOfDay();

        $query = DB::table('payments')
            ->whereBetween('created_at', [$dateFrom, $dateTo]);

        $data = $query->get();

        $excelContent = "SN,Amount,Email,Status, Payment Type, Gateway, ReferenceId, Date Created\n"; // Header row
        $i = 0;

        foreach ($data as $item) {
            $i++;

            $excelContent .= "$i,{$item->amount},{$item->user_email},{$item->status},{$item->payment_type},{$item->gateway},{$item->referenceId},{$item->created_at}\n";
        }
        $headers = array(
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=payment_reports.csv",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        );
        return response()->stream(
            function () use ($excelContent) {
                echo $excelContent;
            },
            200,
            $headers
        );

    }

}
