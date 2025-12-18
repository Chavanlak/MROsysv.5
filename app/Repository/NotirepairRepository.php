<?php

namespace App\Repository;

use App\Models\Notirepair;
use Illuminate\Support\Facades\DB;
use App\Models\Zone;
use Carbon\Carbon;
use PHPUnit\Framework\MockObject\ReturnValueNotConfiguredException;

class NotirepairRepository
{
    public static function getAllNotirepair()
    {
        return Zone::all();
    }
    public static function getAllStaffName()
    {
        return Zone::where('StaffName')->first();
    }
    public static function getAllNames()
    {
        return Zone::where('FirstName', 'LastName')->first();
    }
    public static function getSelectZoneEmail()
    {
        return Zone::whereNotNull('email')->first();
    }
    public static function getNameandZoneEmail()
    {
        return Zone::select(['StaffName', 'email'])
            ->whereNotNull('email')
            ->first();
    }
    public static function getZoneInfoByEmail($email)
    {
        return Zone::where('email', $email)
            ->first(); // ดึงข้อมูลของ zone ที่มี email ตรงกับที่ระบุ
    }
    public static function getEmailByCode($zoneId)
    {
        return Zone::where('zoneId', $zoneId)
            ->value('email'); // ดึง email ของ branch
    }
    public static function getemailZone($zonename)
    {
        return Zone::where('email', $zonename)->value('email');
    }
    // public static function save($branch){
    //     $notirepair = new Notirepair();
    //     $notirepair->branch = $branch;
    // }
    public static function saveNotiRepair($equipmentId, $DeatailNotirepair, $Zone, $branch, $branchCode)
    {
        $noti = new Notirepair();
        $noti->equipmentId = $equipmentId;
        $noti->DeatailNotirepair = $DeatailNotirepair;
        $noti->Zone = $Zone;
        $noti->branch = $branch;
        // 🛑 บันทึกรหัสสาขาใหม่ในคอลัมน์ branch_code ที่เพิ่มเข้ามา
        $noti->branchCode = $branchCode;
        $noti->DateNotirepair = Carbon::now();
        $noti->save();
        return $noti;
    }
    // public static function findZoneEmailByName($zonename){
    //     return Zone::where('StaffName','=',$zonename)
    //         ->first(['email']);
    // }
    public static function findZoneEmailByName($zonename)
    {
        return Zone::where('StaffName', '=', $zonename)
            ->first()
            ->email;
    }

    //ส่วนของ dashbord store
    public static function getNotirepirById($notiRepairId)
    {
        return NotiRepair::where('NotirepairId', $notiRepairId)->get();
    }
    // public static function CountNotirepair(){
    //     return Notirepair::count('NotirepairId')->get();
    // }
    public static function CountNotirepair()
    {
        return Notirepair::count();
    }
    public static function HistoryNotirepair()
    {
        return Notirepair::select('NotirepairId', 'DateNotirepair', 'DeatailNotirepair', 'equipment.equipmentName')
            ->leftJoin('equipment', 'notirepair.equipmentId', '=', 'equipment.equipmentId')
            ->get();
    }

    ///ส่วน dashbod ของ Admin crud 
    public static function getAllNotirepairByadmin()
    {
        return Notirepair::all();
    }

    public static function getAllNotiRepairWithDetails()
    {
        // เรียก Model Notirepair เป็นตัวตั้ง
        return Notirepair::leftJoin('equipment', 'notirepair.equipmentId', '=', 'equipment.equipmentId')
            ->select(
                'notirepair.*',             // เอาข้อมูลแจ้งซ่อมทั้งหมด (รวม zone, branch ที่มีอยู่แล้ว)
                'equipment.equipmentName'   // ✅ ดึงเพิ่มแค่ชื่ออุปกรณ์
            )
            ->get();
    }
    //ถ้ากระบวนการการทำงานทั้งหมดเสร็จเเล้วให้กดปิดงานโดยหน้าร้าน
    //พอมีการซ่อมเสร็จสิ้นเเล้ว พนักงานหน้าร้านจะกดปุ่มปิดงาน

    // public static function findById($notirepaitid){
    //     return Notirepair::find($notirepaitid);
    // }

    //การจัดการสถานะ
    // public static function updateStatus($notiId, $status)
    // {
    //     return DB::connection('third')
    //         ->table('statustracking')
    //         ->insert([
    //             'NotirepairId' => $notiId,
    //             'status'       => $status,
    //             'statusDate'   => Carbon::now(),
    //         ]);
    // }
    public static function findById($id)
    {
        return Notirepair::find($id);
    }
    public static function updateStatusTracking($notiId, $status)
    {
        return DB::connection('third')
            ->table('statustracking')
            ->insert([
                'NotirepairId' => $notiId,
                'status'       => $status,
                'statusDate'   => Carbon::now(),
            ]);
    }
    //ดึงสถานะบ่าสุด
    public static function getCurrentStatus($notiId)
    {
        return DB::connection('third')
            ->table('statustracking')
            ->where('NotirepairId', $notiId)
            ->orderByDesc('statustrackingId')
            ->value('status');
    }
    public static function closeJobInMainTable($id)
    {
        return Notirepair::where('NotirepairId', $id)->update([
            'closedJobs' => 'ปิดงานเรียบร้อย',
            'DateCloseJobs' => Carbon::now()
        ]);
    }
    //ofiicer

    public static function getTrackingListForAdmin($searchTerm = null, $perPage = 5)
    {
        // 1. ดึง ID ล่าสุดของสถานะจากตาราง statustracking (DB ที่สาม)
        $latestStatusId = DB::connection('third')
            ->table('statustracking')
            ->select('NotirepairId', DB::raw('MAX(statustrackingId) as latest_id'))
            ->groupBy('NotirepairId');

        // 2. Query หลัก
        // $query = Notirepair::select(
        //         'notirepair.*',
        //         'equipment.equipmentName',
        //         DB::raw("COALESCE(latest_status.status, 'ยังไม่ได้รับของ') as current_status"),
        //         'latest_status.statusDate as last_status_date'
        //     )
        //     ->leftJoin('equipment', 'notirepair.equipmentId', '=', 'equipment.equipmentId')
        //     // Join เพื่อเอา ID ล่าสุด
        //     ->leftJoinSub($latestStatusId, 'latest_id_table', function ($join) {
        //         $join->on('notirepair.NotirepairId', '=', 'latest_id_table.NotirepairId');
        //     })
        //     // Join เพื่อเอาชื่อสถานะจริงจาก DB ที่สาม
        //     ->leftJoin(
        //         DB::raw(env('THIRD_DB_DATABASE') . '.statustracking as latest_status'),
        //         function ($join) {
        //             $join->on('latest_status.NotirepairId', '=', 'notirepair.NotirepairId')
        //                  ->on('latest_status.statustrackingId', '=', 'latest_id_table.latest_id');
        //         }
        //     );
        // 2. Query หลัก
        $query = Notirepair::select(
            'notirepair.*',
            'equipment.equipmentName',
            // ตั้งชื่อ alias ให้ชัดเจน ป้องกันการทับกับ column ใน table หลัก
            DB::raw("COALESCE(latest_status.status, 'ยังไม่ได้รับของ') as current_status"),
            'latest_status.statusDate as last_status_date'
        )
            ->leftJoin('equipment', 'notirepair.equipmentId', '=', 'equipment.equipmentId')
            ->leftJoinSub($latestStatusId, 'latest_id_table', function ($join) {
                $join->on('notirepair.NotirepairId', '=', 'latest_id_table.NotirepairId');
            })
            ->leftJoin(
                // ใช้ config แทน env เพื่อความเสถียร
                DB::raw(config('database.connections.third.database') . '.statustracking as latest_status'),
                function ($join) {
                    $join->on('latest_status.NotirepairId', '=', 'notirepair.NotirepairId')
                        ->on('latest_status.statustrackingId', '=', 'latest_id_table.latest_id');
                }
            );

        // 3. ระบบค้นหา (ถ้ามี)
        if ($searchTerm) {
            $query->where(function ($q) use ($searchTerm) {
                $q->where('notirepair.NotirepairId', 'like', "%$searchTerm%")
                    ->orWhere('notirepair.branchCode', 'like', "%$searchTerm%")
                    ->orWhere('equipment.equipmentName', 'like', "%$searchTerm%");
            });
        }

        return $query->orderBy('notirepair.DateNotirepair', 'desc')
            ->paginate($perPage)
            ->withQueryString();
    }
}
