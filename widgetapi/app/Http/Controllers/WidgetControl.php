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
    
    ##Calc function. Find closest pack size to inputted number then subtract pack size from number, keeping a count along the way 
    ##
    public function calcWidgets(Request $req){
        $num = e($req['num']);
        $wid = Widget::all()->pluck('size')->toArray();
        $resArr = array_fill_keys($wid,0);
        while($num > 0){
            ##
            ## found closest function at https://stackoverflow.com/questions/5464919/find-a-matching-or-closest-value-in-an-array
            ##
            $closest = array_reduce($wid, function($carry, $item) use($num) {
            return (abs($item - $num) < abs($carry - $num) ? $item : $carry);
            }, reset($wid));
            $cnt = $resArr[$closest];
            $resArr[$closest] = $cnt + 1;
            $num = $num - $closest;
        }
        return $resArr;
    }

}
