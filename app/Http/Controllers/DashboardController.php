<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Innovation;
use App\Innovation_step;
use App\Institute;

class DashboardController extends Controller
{
    public function index()
    {
    	$ino_steps = Innovation_step::with('innovation')
        ->where('progress_persentage', '>', '0')
        ->where('progress_persentage', '<', '100')
        ->get();

        $inovasi = Innovation::all();
    	$jumlah_inovasi = $inovasi->count();

// MANA DIA? INI DIA! INI DIA!
        //NOMOR 2

        $total = DB::table('innovation_steps')
                ->select('innovation_id', DB::raw('SUM(progress_persentage) as total'))
                ->groupBy('innovation_id')
                ->havingRaw('SUM(progress_persentage) = ?', [600])
                ->get();

        

        $count = count($total);
        // dd($count);
        // die();


        $selesai = Innovation_step::all()
                    ->where('progress_persentage','=','100');


    	$institute = Institute::all();
    	$jumlah_institute = $institute->count();

        

        $semua_inovasi = Institute::withCount(['innovation'])
        ->get();

        // dd($semua_inovasi->innovation_count);
        // dd(Institute::with('innovation')->innovation->get());
        
        // $distribusi = Innovation_step::all();
        // //SELECT *, COUNT(innovation_id) FROM `innovation_steps` JOIN steps on innovation_steps.step_id = steps.id GROUP BY step_id
        //  ->count('innovation_id')
        //  ->join("innovation_steps","steps.id","=","steps.step_id")
        //  ->get();

        return view('dashboard.index', [
        	'ino_steps'=>$ino_steps,
        	'jumlah_inovasi'=>$jumlah_inovasi,
        	'jumlah_perangkat_daerah'=>$jumlah_institute,
            'semua_inovasi'=>$semua_inovasi,
            'jumlah_selesai' => $count,
            'distribusi'=>$distribusi

            
        ]);


    }

}
