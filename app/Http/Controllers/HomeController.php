<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public $child;

    public function __construct()
    {
        DB::table('childs')->update(['active'=>'0']);
        $this->child = DB::table('childs')->get();
    }

    public function list($idChild = 1)
    {
        DB::table('childs')->where('id',$idChild)->update(['active'=>'1']);
        $list = DB::table('disciplines')->where('id_child', $idChild)->get();
        $child = DB::table('childs')->get();

        return view('list', ['list' => $list, 'child' => $child]);
    }

    public function addPoints($id, $idChild)
    {
        $list = DB::table('disciplines')
            ->where('id_child', $idChild)
            ->where('id',$id)
            ->get();

        if (($id == 5 || $id == 25)) {
            if ($list[0]->points < 4) {
                if($list[0]->punishment1+$list[0]->punishment2+$list[0]->punishment3 == 3) {
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
            if($list[0]->punishment1+$list[0]->punishment2+$list[0]->punishment3 == 3) {
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

    public function report()
    {
        $rep = DB::table(DB::raw('(
        SELECT
            (SELECT name FROM childs WHERE disciplines.id_child=childs.id) AS child,
            title,
            punishment1+punishment2+punishment3 AS punish
        FROM disciplines
        )d'))
            ->where('d.punish','>','0')
            ->orderBy('d.child')
            ->get();

        return view('report', ['report' => $rep, 'child' => $this->child]);
    }
}
