<?php namespace App\Http\Controllers;
use App\Models\Staff; //including model.
use App\Http\Controllers\Controller;

//use App\Http\Requests;
use DB; //database manager class - Illuminate\Database\DatabaseManager
use Input; //request class - Illuminate\Http\Request
use Auth; // auth class - Illuminate\Auth\AuthManager
use Request;

use Carbon\Carbon; 


class StaffController extends Controller {

   
/*
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

    public function index()
    {
        //
        $staffs=Staff::all();
        return view('staff.index',compact('staffs'));
    }

    public function show($id)
    {
       $staff=Staff::find($id);
       return view('staff.show',compact('staff'));
    }

    public function create()
    {
       return view('staff.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
       $staff=Request::all();
       Staff::create($staff);
       return redirect('staffs');
    }
    public function edit($id)
    {
       $staff=Staff::find($id);
       return view('staff.edit',compact('staff'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
       //
       $staffUpdate=Request::all();
       $staff=Staff::find($id);
       $staff->update($staffUpdate);
       return redirect('staffs');
    }
    public function destroy($id)
    {
       Staff::find($id)->delete();
       return redirect('staffs');
    }

}
