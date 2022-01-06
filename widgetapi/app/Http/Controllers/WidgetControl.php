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
    ##
    ##First attempt at calc function adapted from https://stackoverflow.com/questions/55496089/php-packing-widgets-into-the-fewest-number-of-boxes-plus-minimum-order-quanti  Didn't quite work according to the test paramaters

    ## unused
    ##
    public function calcWidgetsY(Request $req){
        //get submitted number
        $num = e($req['num']);
        //get widgets 
        $wid = Widget::all()->pluck('size')->toArray();
        //get new array with size values as keys
        $resArr = array_fill_keys($wid,0);
        while($num > 0){
            foreach($wid as $a){
                if($a >= $num)break;
            }
            ++$resArr[$a];
            $num -= $a;
        }
        return $resArr;
    }
    ##
    ##Final Calc function. Find closest pack size to inputted number then subtract pack size from number, keeping a count along the way. 
    ##
    public function calcWidgetsX(Request $req){
        $num = e($req['num']);
        $wid = Widget::all()->pluck('size')->toArray();
        $resArr = array_fill_keys($wid,0);
        while($num > 0){
            ##
            ## find closest in array function at https://stackoverflow.com/questions/5464919/find-a-matching-or-closest-value-in-an-array
            ##
            $closest = array_reduce($wid, function($carry, $item) use($num) {
            return (abs($item - $num) < abs($carry - $num) ? $item : $carry);
            }, reset($wid));
            $cnt = $resArr[$closest];
            $resArr[$closest] = $cnt + 1;
            $num = $num - $closest;
        }
        return array_filter($resArr);
    }

    ##Merged Calc Function


}
