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
        $num = e($req['num']);
        $wid = Widget::orderBy('size','asc')->pluck('size')->get();
        /*$widArr = array();
        foreach($wid as $w){
            array_push($w->size);
        }*/
        return $wid;
    }
}
