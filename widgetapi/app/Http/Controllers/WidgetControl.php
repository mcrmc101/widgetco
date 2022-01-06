<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Widget;

class WidgetControl extends Controller
{
    //test
    public function testC(){
        return 'Testing Controller';
    }
    //all widgets
    public function allWidgets(){
        return Widget::all();
    }
    //add widgets
    public function addWidgets(Request $req){
        $wid = new Widget();
        $wid->size = e($req['size']);
        $wid->save();
        return response()->json(['Saved' => $wid], 200);
    }
    // delete widgets
    public function deleteWidgets(){
        $wid = Widget::all();
        foreach($wid as $w){
            $w->delete();
        }
        return response()->json(['Deleted'], 200);
    }

    //calculate
    public function calcWidgets(Request $req){
        //get submitted number
        $num = e($req['num']);
        //get widgets ordered by size
        $wid = Widget::orderBy('size','asc')->get();
        //make array of size values from all widgets
        $widArr = array();
        foreach($wid as $w){
            array_push($widArr,$w->size);
        }
        //get new array with size values as keys
        $resArr = array_fill_keys($widArr,0);
        //while submitted number is more than 0
        while($num > 0){
            //for each widget size
            foreach($widArr as $a){
                // if widget size is greater or equal to submitted number end loop
                if($a >= $num)break;
            }
            //add one to new size array count
            ++$resArr[$a];
            //subtract size value from submitted number until 0
            $num -= $a;
        }
        //return the new array with counts of size values
        return $resArr;
    }
}
