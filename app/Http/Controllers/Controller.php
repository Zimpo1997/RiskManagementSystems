<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    

    public function date_th($strDate, $use = 0)
    {
        //Readme 
        /** Parameter $use = 1 return 'day mount year hour:minute' */
        /** Parameter $use = 2 return 'day mountcut year' */
        /** Parameter $use = 3 return 'day mountfull year' */
        /** Parameter $use = any return 'day mountfull year fulltime' */

        $strYear = date("Y", strtotime($strDate)) + 543;
        $strMonth = date("n", strtotime($strDate));
        $strDay = date("j", strtotime($strDate));
        $strHour = date("H", strtotime($strDate));
        $strMinute = date("i", strtotime($strDate));
        $strSeconds = date("s", strtotime($strDate));
        $strMonthCut = array("", "ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค.");
        $strMonthFull = array("", "มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");
        $strMonthThai = $strMonthFull[$strMonth];
        if ($use == 3) :
            $strMonthThai = $strMonthFull[$strMonth];
            return "$strDay $strMonthThai $strYear";
        elseif ($use == 2) :
            $strMonthThai = $strMonthCut[$strMonth];
            return "$strDay $strMonthThai " . substr($strYear, 2, 3);
        elseif ($use == 1) :
            return "$strDay $strMonthThai $strYear $strHour:$strMinute";
        else :
            return "$strDay $strMonthThai $strYear $strHour:$strMinute:$strSeconds";
        endif;
    }

    public function month_th_mini($strM)
    {
        $strMonthCut = array("", "ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค.");
        return $strMonthCut[intval($strM)];
    }

    public function month_th_full($strM)
    {
        $strMonthFull = array("", "มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");
        return $strMonthFull[intval($strM)];
    }

    public function date_en($strDate)
    {
        $strYear = date("Y", strtotime($strDate));
        $strMonth = date("n", strtotime($strDate));
        $strDay = date("j", strtotime($strDate));
        $strHour = date("H", strtotime($strDate));
        $strMinute = date("i", strtotime($strDate));
        $strSeconds = date("s", strtotime($strDate));
        $strMonthCut = array("", "January", "February", "March", "April", "Mar", "June", "July", "August", "September", "October", "November", "December");
        $strMonthThai = $strMonthCut[$strMonth];
        return "$strMonthThai $strDay $strYear";
    }

    public function dmytoymd($strDate)
    {
        $date = explode('/', $strDate);
        return $date[2] . "-" . $date[1] . "-" . $date[0];
    }
    public function DateDiff($strDate1, $strDate2)
    {
        return (strtotime($strDate2) - strtotime($strDate1)) /  (60 * 60 * 24);  // 1 day = 60*60*24
    }
    public function TimeDiff($strTime1, $strTime2)
    {
        return (strtotime($strTime2) - strtotime($strTime1)) /  (60 * 60); // 1 Hour =  60*60
    }
    public function DateTimeDiff($strDateTime1, $strDateTime2)
    {
        return (strtotime($strDateTime2) - strtotime($strDateTime1)) /  (60 * 60); // 1 Hour =  60*60
    }
}
