<?php namespace App\Http\Controllers;
use App\Models\Attendance; //including model.
use App\Http\Controllers\Controller;

use DB; //database manager class - Illuminate\Database\DatabaseManager
use Input; //request class - Illuminate\Http\Request
use Auth; // auth class - Illuminate\Auth\AuthManager

use Carbon\Carbon; 


class AttendanceController extends Controller {

    public function index() {
        // Getting all records from model associates table.
        // $data = Attendance::all();
        // $data = Attendance::first();
        // $data = Attendance::paginate(15);

		$sort_columns = array('lastupdate', 'Name'); 
		$sort = in_array(Input::get('sort'), $sort_columns) ? Input::get('sort') : 'lastupdate'; 
		$order = Input::get('order') === 'asc' ? 'asc' : 'desc'; 

		$clients = DB::table('attendance')
			->select('clients.id', 'clients.hostname', 'clients.node_ip', 'clients.service_type', 'clients.hostname', 'clients.contact_person', 'clients.active', 'clients.contact_number', 'regions.name', 'service_code.description as sc_desc')
            ->leftjoin('regions', 'clients.region_id', '=', 'regions.id')
            ->leftjoin('service_code', 'clients.service_code', '=', 'service_code.name')
            ->where('lastdate', $order)
            ->orderBy($sort, $order)
            ->paginate(ADMIN_PAGINATION);

        // Returning data on view.
        // return view('attendance.index', ['data' => $data]);
		// return View::make('protected.admin.clients.index')->withClients($clients)->withAdmin($admin);
		return View::make('protected.admin.clients.index')->withClients($clients);



    }

    public function getList() {
        // Getting all records from model associates table.
        // $data = Attendance::all();
        // $data = Attendance::first();
        // $data = Attendance::paginate(15);

        $sort_columns = array('lastupdate', 'Name'); 
        $sort = in_array(Input::get('sort'), $sort_columns) ? Input::get('sort') : 'lastupdate'; 
        $order = Input::get('order') === 'asc' ? 'asc' : 'desc'; 

/*CREATE TABLE `attendance` (
  `idattendance_sheet` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(30) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `daytype` varchar(45) DEFAULT NULL,
  `leavetype` int(11) NOT NULL DEFAULT '0',
  `sche1` int(11) NOT NULL DEFAULT '0',
  `att_in` varchar(5) DEFAULT NULL,
  `att_break` varchar(5) DEFAULT NULL,
  `att_resume` varchar(5) DEFAULT NULL,
  `att_out` varchar(5) DEFAULT NULL,
  `att_ot` varchar(5) DEFAULT NULL,
  `att_done` varchar(5) DEFAULT NULL,
  `workhour` decimal(4,2) NOT NULL DEFAULT '0.00',
  `othour` decimal(4,2) NOT NULL DEFAULT '0.00',
  `shorthour` decimal(4,2) NOT NULL DEFAULT '0.00',
  `in_s` decimal(4,2) NOT NULL DEFAULT '0.00',
  `break_s` decimal(4,2) NOT NULL DEFAULT '0.00',
  `resume_s` decimal(4,2) NOT NULL DEFAULT '0.00',
  `out_s` decimal(4,2) NOT NULL DEFAULT '0.00',
  `ot_s` decimal(4,2) NOT NULL DEFAULT '0.00',
  `done_s` decimal(4,2) NOT NULL DEFAULT '0.00',
  `daytype_c` int(1) NOT NULL DEFAULT '0',
  `leavetype_c` int(1) NOT NULL DEFAULT '0',
  `remark_c` int(1) NOT NULL DEFAULT '0',
  `sche1_c` int(1) NOT NULL DEFAULT '0',
  `in_c` int(1) NOT NULL DEFAULT '0',
  `break_c` int(1) NOT NULL DEFAULT '0',
  `resume_c` int(1) NOT NULL DEFAULT '0',
  `out_c` int(1) NOT NULL DEFAULT '0',
  `ot_c` int(1) NOT NULL DEFAULT '0',
  `done_c` int(1) NOT NULL DEFAULT '0',
  `workhour_c` int(1) NOT NULL DEFAULT '0',
  `othour_c` int(1) NOT NULL DEFAULT '0',
  `shorthour_c` int(1) NOT NULL DEFAULT '0',
  `in_x` int(1) NOT NULL DEFAULT '0',
  `break_x` int(1) NOT NULL DEFAULT '0',
  `resume_x` int(1) NOT NULL DEFAULT '0',
  `out_x` int(1) NOT NULL DEFAULT '0',
  `ot_x` int(1) NOT NULL DEFAULT '0',
  `done_x` int(1) NOT NULL DEFAULT '0',
  `remark` int(11) NOT NULL DEFAULT '0',
  `hasmisspunch` tinyint(1) NOT NULL DEFAULT '0',
  `createdate` datetime DEFAULT '2012-01-01 00:00:00',
  `lastupdate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `shiftNo` int(1) NOT NULL DEFAULT '1',
  `diffothour` decimal(4,2) NOT NULL DEFAULT '0.00',
  `diffothour_c` int(1) NOT NULL DEFAULT '0',
  `in_o` varchar(5) DEFAULT NULL,
  `break_o` varchar(5) DEFAULT NULL,
  `resume_o` varchar(5) DEFAULT NULL,
  `out_o` varchar(5) DEFAULT NULL,
  `ot_o` varchar(5) DEFAULT NULL,
  `done_o` varchar(5) DEFAULT NULL,
  `SumWork` decimal(7,3) NOT NULL DEFAULT '0.000',
  `SumOT` decimal(7,3) NOT NULL DEFAULT '0.000',
  `SumDiffOT` decimal(7,3) NOT NULL DEFAULT '0.000',
  `SumShort` decimal(7,3) NOT NULL DEFAULT '0.000',
  `TotHr` decimal(7,3) NOT NULL DEFAULT '0.000',
  `TotWork` decimal(7,3) NOT NULL DEFAULT '0.000',
  `TotOT` decimal(7,3) NOT NULL DEFAULT '0.000',
  `TotDiff` decimal(7,3) NOT NULL DEFAULT '0.000',
  `TotDiffOT` decimal(7,3) NOT NULL DEFAULT '0.000',
  `BankHour` decimal(7,3) NOT NULL DEFAULT '0.000',
  `LeaveHour` decimal(7,3) NOT NULL DEFAULT '0.000',
  `SumWork_c` int(1) NOT NULL DEFAULT '0',
  `SumOT_c` int(1) NOT NULL DEFAULT '0',
  `SumDiffOT_c` int(1) NOT NULL DEFAULT '0',
  `SumShort_c` int(1) NOT NULL DEFAULT '0',
  `TotHr_c` int(1) NOT NULL DEFAULT '0',
  `TotWork_c` int(1) NOT NULL DEFAULT '0',
  `TotOT_c` int(1) NOT NULL DEFAULT '0',
  `TotDiff_c` int(1) NOT NULL DEFAULT '0',
  `TotDiffOT_c` int(1) NOT NULL DEFAULT '0',
  `BankHour_c` int(1) NOT NULL DEFAULT '0',
  `LeaveHour_c` int(1) NOT NULL DEFAULT '0',
  `requireApproval` tinyint(1) NOT NULL DEFAULT '0',
  `reasonNotApprove` text,
  `isApproved` tinyint(1) NOT NULL DEFAULT '0',
  `notified` tinyint(1) NOT NULL DEFAULT '0',
  `notes` text,
  `remark_mp` int(11) NOT NULL DEFAULT '0',
  `requireApproval_mp` tinyint(1) NOT NULL DEFAULT '0',
  `reasonNotApprove_mp` text,
  `isApproved_mp` tinyint(1) NOT NULL DEFAULT '0',
  `notified_mp` tinyint(1) NOT NULL DEFAULT '0',
  `notes_mp` text,
  PRIMARY KEY (`idattendance_sheet`),
  UNIQUE KEY `pk` (`userid`,`date`,`shiftNo`)
) ENGINE=InnoDB AUTO_INCREMENT=140435 DEFAULT CHARSET=utf8;

CREATE TABLE `user` (
  `Auto_No` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `userid` varchar(30) DEFAULT NULL,
  `ic` varchar(20) DEFAULT NULL,
  `Username` varchar(45) DEFAULT NULL,
  `Name` varchar(50) DEFAULT NULL,
  `lastname` varchar(45) DEFAULT NULL,
  `Address` varchar(200) DEFAULT NULL,
  `Phone` varchar(20) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `User_Group` int(11) DEFAULT '0',
  `designation` varchar(100) DEFAULT NULL,
  `Gender` text,
  `DOB` date DEFAULT NULL,
  `IssueDate` date DEFAULT '2012-01-01',
  `expirydate` date DEFAULT '2029-12-31',
  `picture` longtext,
  `pictureflag` tinyint(4) DEFAULT '0',
  `Remark` varchar(200) DEFAULT NULL,
  `define_14` varchar(50) DEFAULT NULL,
  `define_13` varchar(50) DEFAULT '0',
  `define_11` varchar(50) DEFAULT NULL,
  `define_4` varchar(50) DEFAULT NULL,
  `define_2` varchar(50) DEFAULT '0',
  `define_1` varchar(50) DEFAULT NULL,
  `SuspendedDate` datetime DEFAULT NULL,
  `CreateDate` datetime DEFAULT NULL,
  `LastUpdate` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `pay_rate` decimal(8,2) DEFAULT '0.00',
  `user_username` varchar(20) DEFAULT NULL,
  `user_pwd` varchar(256) DEFAULT NULL,
  `user_role` int(11) NOT NULL DEFAULT '2',
  `user_isactive` tinyint(1) NOT NULL DEFAULT '1',
  `user_pic` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Auto_No`),
  KEY `UserID` (`userid`),
  KEY `Name` (`Name`),
  KEY `User_Group` (`User_Group`)
) ENGINE=InnoDB AUTO_INCREMENT=419 DEFAULT CHARSET=utf8;

*/
        $userid = '920720145' ;
        $userid = '1666' ;

        $user = Auth::user();
//        var_dump($user);
        $userid = $user->userid;
//        var_dump($userid);


        //$data = DB::table('attendance')
        //    ->select('attendance.userid', 'attendance.date', 'attendance.lastupdate', 'user.Name')
        //    ->leftjoin('user', 'attendance.userid', '=', 'user.userid')
        //    ->where('attendance.userid', '=', $userid)
        //    ->whereBetween('attendance.lastupdate', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])
        //    ->orderBy($sort, $order)
        //    ->paginate(ADMIN_PAGINATION);

        // gell all - using datatable pagination
        $data = DB::table('attendance')
            ->select('attendance.userid', 'attendance.date', 'attendance.lastupdate', 'user.Name')
            ->leftjoin('user', 'attendance.userid', '=', 'user.userid')
            ->where('attendance.userid', '=', $userid)
            ->whereBetween('attendance.lastupdate', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])
            ->orderBy($sort, $order)
            ->get();

        // Returning data on view.
        // return view('attendance.index', ['data' => $data]);
        // return View::make('protected.admin.clients.index')->withClients($clients)->withAdmin($admin);
        return view('attendance.list')->withData($data);



    }

    public function getIndex() {
        return redirect('/attendance/list');
    }

}
