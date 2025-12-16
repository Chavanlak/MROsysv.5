<?php

// namespace App\Http\Controllers;
// use Illuminate\Support\Facades\Auth;
// use App\Models\User;
// use App\Repository\UserRepository;
// use Illuminate\Http\Request;

// class UserController extends Controller
// {
//    public static function login(){
//     return view('login');
//    }

//    public static function loginPost(){
//     $credentials = [
//         'staffname'=>request('staffname'),
//         'staffpassword'=>request('staffpassword')
//     ];
//     if(Auth::attempt($credentials)){
//         return redirect('/repair')->with('success','Login Successful');

//    }
//     else{
//         return redirect('/loginerror')->with('error','Login Failed');
//     }
//    }
//    public static function logineror(){
//     return "error";
//    }
//    public static function checklogin(){
//     return "Hello i can see this";
//    }
//    public static function page(){
//     return view('repair');
//    }
// }
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use PHPUnit\Framework\MockObject\ReturnValueNotConfiguredException;
use App\Repository\PermissionBMRepository;

class UserController extends Controller
{
    public function login()
    {
        return view('login');
    }
    //new 

//     public function loginPost(Request $request) {
//         $staffcode = $request->input('staffcode');
//         $staffpassword = $request->input('staffpassword');
        
//         // 1. ดึงข้อมูล User
//         $user = DB::table('staff_rc')->where('staffcode', $staffcode)->first();
    
//         if (!$user) {
//             return redirect('/')->with('error', 'ไม่พบผู้ใช้นี้');
//         }
//         if ($user->staffpassword !== $staffpassword) {
//             return redirect('/')->with('error', 'รหัสผ่านไม่ถูกต้อง');
//         }
    
//         // 2. เก็บ Session (แก้คำว่า looged เป็น logged ให้ด้วยครับ)
//     Session::put('logged_in', true);
//     Session::put('staffname', $user->staffname);
//     Session::put('staffcode', $user->staffcode);
//     Session::put('permis_BM', $user->permis_BM);
//     Session::put('role', $user->role);
//     if ($user->role === 'AdminTechnicianStore') {
//         return redirect('/noti'); 
//     }
    

   
//         if ($user->permis_BM == 'N' || $user->permis_BM == 'n') {
//             // Frontstaff ที่ไม่ใช่ BM จะมาหน้านี้
//             return redirect('/repair'); 
//         } 
//         else {
//             // Frontstaff ที่เป็น BM จะมาหน้านี้ (ถูกต้องตามต้องการ)
//             return redirect('/repairBM'); 
//         }
//     // }
// }
// public function loginPost(Request $request){

//     $staffcode = $request->input('staffcode');
//     $staffpassword = $request->input('staffpassword');
//     $user = DB::table('staff_rc')->where('staffcode',$staffcode)->first();

//     // 1. ตรวจสอบว่ามี User หรือไม่
//     if(!$user){
//         return redirect('/')->with('error','ไม่พบผู้ใช้');
//     }

//     // 2. ตรวจสอบรหัสผ่าน
//     if($user->staffpassword != $staffpassword){
//         return redirect('/')->with('error', 'รหัสผ่านไม่ถูกต้อง'); 
//     } // <--- *** จุดที่เติม: ต้องปิดปีกกาตรงนี้ครับ ***

//     // 3. เก็บ Session (โค้ดนี้จะทำงานเมื่อรหัสผ่านถูกแล้วเท่านั้น)
//     Session::put('logged_in',true);
//     Session::put('staffname',$user->staffname);
//     Session::put('staffcode',$user->staffcode);
//     Session::put('permis_BM',$user->permis_BM);
//     Session::put('role',$user->role);

//     // 4. Redirect ตาม Role

//     // CASE A: Admin
//     if ($user->role === 'AdminTechnicianStore') {
//         return redirect()->route('noti.list');
//     }

//     // CASE B: FrontStaff
//     // *** ระวัง: เช็คใน Database ว่าเป็น 'FrontStaff' (S ใหญ่) หรือ 'Frontstaff' (s เล็ก) ***
//     // ใส่ให้ตรงกับในฐานข้อมูลนะครับ (ส่วนใหญ่ที่เห็นก่อนหน้านี้คุณใช้ S ใหญ่)
//     if ($user->role === 'FrontStaff' && $user->permis_BM === 'Y') {
//         return redirect()->route('noti.storefront');
//     }

//     // CASE C: User ทั่วไป (และ BM แผนกอื่น)
//     // ส่งไป Route /repair (ซึ่งมี Middleware customauth คอยเช็ค Session logged_in ที่เราเพิ่งสร้างข้างบน)
//     return redirect('/repair')->with('success', 'เข้าสู่ระบบสำเร็จ');
// }
public function loginPost(Request $request){

    $staffcode = $request->input('staffcode');
    $staffpassword = $request->input('staffpassword');
    $loginMode = $request->input('login_mode'); // รับค่า mode ที่เลือกมา (repair หรือ storefront)

    $user = DB::table('staff_rc')->where('staffcode',$staffcode)->first();

    // 1. ตรวจสอบว่ามี User หรือไม่
    if(!$user){
        return redirect('/')->with('error','ไม่พบผู้ใช้');
    }

    // 2. ตรวจสอบรหัสผ่าน
    if($user->staffpassword != $staffpassword){
        return redirect('/')->with('error', 'รหัสผ่านไม่ถูกต้อง'); 
    }

    // 3. เก็บ Session
    Session::put('logged_in',true);
    Session::put('staffname',$user->staffname);
    Session::put('staffcode',$user->staffcode);
    Session::put('permis_BM',$user->permis_BM);
    Session::put('role',$user->role);
    if ($user->role === 'FrontStaff' || $user->role === 'Frontstaff') {
        try {
            // ดึงรหัสสาขา (Branch Code) จาก permission_bm (ฐานข้อมูล MMS)
            $branchCode = PermissionBMRepository::getBranchCode($staffcode); 
            
            // เก็บ Branch Code ลงใน Session
            Session::put('branch_code', $branchCode); 
            
            // Note: ถ้าต้องการชื่อสาขาด้วย ต้องเพิ่ม Logic ดึงชื่อสาขามาเก็บใน Session ด้วย

        } catch (\Throwable $th) {
            // หากเกิด Error เช่น ไม่พบข้อมูลใน permission_bm, ให้จัดการ Error ที่นี่
            // คุณอาจเลือกที่จะให้ล็อกอินผ่าน แต่แสดงข้อความเตือน หรือบังคับไม่ให้ล็อกอินต่อ
            // ในที่นี้ เราจะอนุญาตให้ผ่าน แต่เตือนว่าอาจมีปัญหาการกรอง
            Session::put('branch_code', null); 
            // return redirect('/')->with('error', 'เข้าสู่ระบบสำเร็จ แต่ไม่พบข้อมูลสาขาในฐานข้อมูล MMS');
        }
    }
    // 4. Redirect ตาม Mode ที่เลือกมา
    
    // --- กรณีเลือกเข้าโหมด "หน้าร้าน" (Front Staff) ---
    if ($loginMode === 'storefront') {
        // เช็คก่อนว่า User มีสิทธิ์ FrontStaff จริงไหม
        // (เช็คทั้ง s เล็ก s ใหญ่เผื่อไว้ หรือเช็คตาม DB จริงของคุณ)
        if ($user->role === 'FrontStaff' || $user->role === 'Frontstaff') {
             return redirect()->route('noti.storefront');
        } else {
             // ถ้าเลือกโหมดหน้าร้าน แต่ไม่มีสิทธิ์
             return redirect('/')->with('error', 'คุณไม่มีสิทธิ์เข้าใช้งานส่วนหน้าร้าน');
        }
    }

    // --- กรณีเลือกเข้าโหมด "แจ้งซ่อม" (Repair) หรืออื่นๆ ---
    // (Admin อาจจะข้ามเงื่อนไขนี้ไป Dashboard Admin เลยก็ได้ แล้วแต่ Design)
    if ($user->role === 'AdminTechnicianStore') {
        return redirect()->route('noti.list');
    }

    // ถ้าเลือกโหมด Repair ให้ส่งไปที่ /repair 
    // ตัว Controller ShowRepairForm ของคุณจะจัดการเองว่าถ้าเป็น BM ให้ไปหน้า repairBM ถ้าไม่ใช่ให้ไปหน้า repair ปกติ
    return redirect('/repair')->with('success', 'เข้าสู่ระบบสำเร็จ');
}
    public function loginerror()
    {
        return view('loginerror');
    }

    public function logout()
    {
        Session::flush();
        // return redirect('/login');
        return redirect('/');
    }

    public function showrepair()
    {
        return view('repair');
    }

    //dashbord
    //auth store
    public static function loginDashbord(){
        return view('authen.loginTechnicialStore');
    }
    public static function loginPostDashbord(Request $request){
        $staffcode = $request->input('staffcode');
        $staffpassword = $request->input('staffpassword');
        $user = DB::table('staff_rc')->where('staffcode',$staffcode)->first();
        $role = DB::table('staff_rc')->where('role',)->first();
        if($role === 'Frontstaff'){
            return redirect('/loginFrontstaff');
        }
        if($role == 'AdminTechnicianStore'){
            return redirect('loginTechnicialStore');
        }
        if(!$user){
            return redirect('/loginTechnicialStore')->with('error','ไม่พบผู้ใช้นี้');
        }
        if($user->staffpassword != $staffpassword){
            return redirect('/loginTechnicialStore')->with('error','รหัสผ่านไม่ถูกต้อง');
        }
        Session::put('logged_in', true);  
        Session::put('staffname',$user->staffname);
        Session::put('staffcode',$user->staffcode);
        Session::put('role',$user->role);
        // dd($user);
        // return redirect('/notirepairlist');
        return redirect('/noti'); 
    }
    public static function loginerrorstore(){
        return view('loginerror');
    }
    public static function logoutstore(){
        Session::flush();
        return redirect('/loginstore');
    }
    //auth front
    

}

?>


