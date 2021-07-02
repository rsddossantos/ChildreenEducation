<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){}

    public function list($idChild = 1)
    {
        DB::table('childs')->update(['active'=>'0']);
        DB::table('childs')->where('id',$idChild)->update(['active'=>'1']);

        $list = DB::table('disciplines')
            ->where('id_child', $idChild)
            ->get();
        $child = DB::table('childs')
            ->get();

        return view('list', ['list' => $list, 'child' => $child]);
    }

    public function addPoints($id, $idChild)
    {
        $list = DB::table('disciplines')
            ->where('id_child', $idChild)
            ->where('id',$id)
            ->get();
        echo '<pre>';
        if (($id == 5 || $id == 25)) {
            if ($list[0]->points < 4) {
                if($this->fullPunish($list)) {
                    return redirect('/list/'.$idChild)->with('warning', 'Algum castigo deve ser cumprido!');
                } else {
                    DB::table('disciplines')->where('id',$id)->increment('points');
                }
            } else {
                DB::table('disciplines')->where('id',$id)->update(['points'=>'0']);
                if($list[0]->punishment1 == 0) {
                    DB::table('disciplines')->where('id',$id)->update(['punishment1'=>'1']);
                } elseif ($list[0]->punishment2 == 0) {
                    DB::table('disciplines')->where('id',$id)->update(['punishment2'=>'1']);
                } elseif ($list[0]->punishment3 == 0) {
                    DB::table('disciplines')->where('id',$id)->update(['punishment3'=>'1']);
                }
            }
        } elseif ($list[0]->points < 2) {
            if($this->fullPunish($list)) {
                return redirect('/list/'.$idChild)->with('warning', 'Algum castigo deve ser cumprido!');
            } else {
                DB::table('disciplines')->where('id',$id)->increment('points');
            }
        } else {
            DB::table('disciplines')->where('id',$id)->update(['points'=>'0']);
            if($list[0]->punishment1 == 0) {
                DB::table('disciplines')->where('id',$id)->update(['punishment1'=>'1']);
            } elseif ($list[0]->punishment2 == 0) {
                DB::table('disciplines')->where('id',$id)->update(['punishment2'=>'1']);
            } elseif ($list[0]->punishment3 == 0) {
                DB::table('disciplines')->where('id',$id)->update(['punishment3'=>'1']);
            }
        }
        return redirect('/list/'.$idChild);
    }

    public function clearPunish($id, $punish)
    {
        $field = 'punishment'.$punish;
        $child = DB::table('disciplines')->select('id_child')->where('id',$id)->get();
        DB::table('disciplines')->where('id',$id)->update([$field=>'0']);
        return redirect('/list/'.$child[0]->id_child);
    }

    private function fullPunish($list)
    {
        if ($list[0]->punishment1+$list[0]->punishment2+$list[0]->punishment3 == 3) {
            return true;
        } else{
            return false;
        }
    }
}
