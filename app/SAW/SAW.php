<?php

namespace App\SAW;
use App\Models\Mahasiswa;
use App\Models\Prodi;
use App\Models\Atribut;
use App\Models\Kriteria;
use Barryvdh\DomPDF\Facade\Pdf;
use DB;
use Auth;

class SAW
{
    public function index(){
        $data = Mahasiswa::select('nim_mahasiswa','id')->get();
        for($i = 0; $i<count($data); $i++){
            $temp_level1 = Atribut::select('id','kriteria_id','mahasiswa_id','value')->where('mahasiswa_id',$data[$i]->id)->get();
            for($j = 0 ; $j<count($temp_level1);$j++){
                $r = 'p'.($j+1);
                $data[$i]->$r = $temp_level1[$j]->value;
            }
            unset($data[$i]->id);
        }
        return $data;
    }

    public function getData(){
        $data = Mahasiswa::select('nim_mahasiswa','id')->get();
        for($i = 0; $i<count($data); $i++){
            $temp_level1 = Atribut::select('id','kriteria_id','mahasiswa_id','value')->where('mahasiswa_id',$data[$i]->id)->get();
            for($j = 0 ; $j<count($temp_level1);$j++){
                $r = 'p'.($j+1);
                $data[$i]->$r = $temp_level1[$j]->value;
            }
            unset($data[$i]->id);
        }
        return $data;
    }

    public function sample()
    {
        $DATA = Mahasiswa::getData();
        $DATA = json_decode (json_encode ($DATA), FALSE);

        // return $DATA;
        // $DATA = DB::select("SELECT nim, nama, p1, p2,p3,bidang,p4,p5 FROM example;");

        $COUNTING_DATA = ['p1', 'p2', 'p3', 'p4', 'p5'];
        // $COUNTING_DATA_MIN_MAX = ['MAX', 'MIN', 'MAX', 'MAX', 'MIN'];
        $COUNTING_DATA_MIN_MAX = DB::table('kriteria')->pluck('status')->toArray();
        // return $COUNTING_DATA_MIN_MAX;
        // MAX = BENEFIT, MIN = COST
        $BOBOT = DB::table('kriteria')->pluck('bobot')->toArray();

        // return $DATA;

        //CATATAN 1
        // $MAX = [];
        // for ($i = 0; $i < count($DATA); $i++) {
        //     $t = [];
        //     foreach ($DATA[$i] as $k => $d) {
        //         if (in_array($k, $COUNTING_DATA)) {
        //             $t[$k] = $d;
        //         }
        //     }
        //     $MAX[] = $t;
        // }
        // return $MAX;
        //END CATATAN 1

        $CONVERT = [];
        for ($i = 0; $i < count($DATA); $i++) {
            $t = [];
            foreach ($DATA[$i] as $k => $d) {
                if (in_array($k, $COUNTING_DATA)) {
                    $CONVERT[$k][] = number_format($d, 2);
                }
            }
        }
        //CATATAN 2
        // return $CONVERT;
        //END CATATAN 2

        $MAX = [];
        $MIN = [];
        foreach ($CONVERT as $k => $v) {
            $MAX[$k] = max($v);
            $MIN[$k] = min($v);
        }

        //catatan 3
        // $sent = [
        //     "MAX" => $MAX,
        //     "MIN" => $MIN,
        // ];
        // return $sent;
        //end catatan 3

        for ($i = 0; $i < count($DATA); $i++) {
            for ($j = 0; $j < count($COUNTING_DATA); $j++) {
                $r = $COUNTING_DATA[$j];
                $n = $COUNTING_DATA[$j] . "_level2";
                if ($COUNTING_DATA_MIN_MAX[$j] == "Benefit") {
                    $DATA[$i]->$n = number_format($DATA[$i]->$r / $MAX[$r], 2);
                } else { //MIN
                    $DATA[$i]->$n = number_format($MIN[$r] / $DATA[$i]->$r, 2);
                }
            }
        }

        //catatan 4
        // $sent = [
        //     "DATA" => $DATA,
        // ];
        // return $sent;
        //end catatan 4


        for ($i = 0; $i < count($DATA); $i++) {
            for ($j = 0; $j < count($COUNTING_DATA); $j++) {
                $r = $COUNTING_DATA[$j] . "_level2";
                $n = $COUNTING_DATA[$j] . "_level3";
                // $nr =  $r . "_level3_rumus"; //catatan 5
                $DATA[$i]->$n = number_format($DATA[$i]->$r * $BOBOT[$j], 2);
                // $DATA[$i]->$nr = $DATA[$i]->$r . "*" . $BOBOT[$j]; //catatan 5
            }
        }
        //catatan 5
        // $sent = [
        //     "STATUS" => $COUNTING_DATA_MIN_MAX,
        //     "BOBOT" =>$BOBOT,
        //     "DATA" => $DATA,
        // ];
        // return $sent;
        //end catatan 5

        for ($i = 0; $i < count($DATA); $i++) {
            $r = 0;
            for ($j = 0; $j < count($COUNTING_DATA); $j++) {
                $t = $COUNTING_DATA[$j] . "_level3";
                $r = number_format($r + $DATA[$i]->$t, 2);
            }
            $DATA[$i]->pSum_level3 = $r;
        }

        //catatan 6
        // $sent = [
        //     "DATA" => $DATA,
        // ];
        // return $sent;
        //end catatan 6

        $FOR_RANGE = [];
        for ($i = 0; $i < count($DATA); $i++) {
            $FOR_RANGE[] = (float)number_format($DATA[$i]->pSum_level3, 2);
        }

        //catatan 7
        // return $FOR_RANGE;
        //end catatan 7

        $ordered_values = $FOR_RANGE;
        rsort($ordered_values);
        // return $ordered_values;

        $ranking = [];
        foreach ($FOR_RANGE as $key => $value) {
            foreach ($ordered_values as $ordered_key => $ordered_value) {
                if ($value === $ordered_value) {
                    $key = $ordered_key;
                    break;
                }
            }
            $ranking[] = ((int) $key + 1);
        }

        //catatan 8

        // return $ranking;
        //end catatan 8

        for ($i = 0; $i < count($DATA); $i++) {
            $DATA[$i]->ranking = $ranking[$i];
        }
        // return $DATA;
        $sent = [
            "DATA" => $DATA,
            "MAX" => $MAX,
            "MIN" => $MIN,
            "BOBOT" => $BOBOT,
        ];
        // return $sent;
        return view('admin.saw.hasil', $sent);
    }

    public function sample2()
    {
        $DATA = Mahasiswa::getData();
        $DATA = json_decode (json_encode ($DATA), FALSE);


        // $DATA = DB::select("SELECT nim, nama, p1, p2,p3,bidang,p4,p5 FROM example;");

        $COUNTING_DATA = ['p1', 'p2', 'p3', 'p4', 'p5'];
        // $COUNTING_DATA_MIN_MAX = ['MAX', 'MIN', 'MAX', 'MAX', 'MIN'];
        $COUNTING_DATA_MIN_MAX = DB::table('kriteria')->pluck('status')->toArray();
        // return $COUNTING_DATA_MIN_MAX;
        // MAX = BENEFIT, MIN = COST
        $BOBOT = DB::table('kriteria')->pluck('bobot')->toArray();

        // return $DATA;

        //CATATAN 1
        // $MAX = [];
        // for ($i = 0; $i < count($DATA); $i++) {
        //     $t = [];
        //     foreach ($DATA[$i] as $k => $d) {
        //         if (in_array($k, $COUNTING_DATA)) {
        //             $t[$k] = $d;
        //         }
        //     }
        //     $MAX[] = $t;
        // }
        // return $MAX;
        //END CATATAN 1

        $CONVERT = [];
        for ($i = 0; $i < count($DATA); $i++) {
            $t = [];
            foreach ($DATA[$i] as $k => $d) {
                if (in_array($k, $COUNTING_DATA)) {
                    $CONVERT[$k][] = number_format($d, 2);
                }
            }
        }
        //CATATAN 2
        // return $CONVERT;
        //END CATATAN 2

        $MAX = [];
        $MIN = [];
        foreach ($CONVERT as $k => $v) {
            $MAX[$k] = max($v);
            $MIN[$k] = min($v);
        }

        //catatan 3
        // $sent = [
        //     "MAX" => $MAX,
        //     "MIN" => $MIN,
        // ];
        // return $sent;
        //end catatan 3

        for ($i = 0; $i < count($DATA); $i++) {
            for ($j = 0; $j < count($COUNTING_DATA); $j++) {
                $r = $COUNTING_DATA[$j];
                $n = $COUNTING_DATA[$j] . "_level2";
                if ($COUNTING_DATA_MIN_MAX[$j] == "MAX") {
                    $DATA[$i]->$n = number_format($DATA[$i]->$r / $MAX[$r], 2);
                } else { //MIN
                    $DATA[$i]->$n = number_format($MIN[$r] / $DATA[$i]->$r, 2);
                }
            }
        }

        //catatan 4
        // $sent = [
        //     "DATA" => $DATA,
        // ];
        // return $sent;
        //end catatan 4


        for ($i = 0; $i < count($DATA); $i++) {
            for ($j = 0; $j < count($COUNTING_DATA); $j++) {
                $r = $COUNTING_DATA[$j] . "_level2";
                $n = $COUNTING_DATA[$j] . "_level3";
                // $nr =  $r . "_level3_rumus"; //catatan 5
                $DATA[$i]->$n = number_format($DATA[$i]->$r * $BOBOT[$j], 2);
                // $DATA[$i]->$nr = $DATA[$i]->$r . "*" . $BOBOT[$j]; //catatan 5
            }
        }
        //catatan 5
        // $sent = [
        //     "DATA" => $DATA,
        // ];
        // return $sent;
        //end catatan 5

        for ($i = 0; $i < count($DATA); $i++) {
            $r = 0;
            for ($j = 0; $j < count($COUNTING_DATA); $j++) {
                $t = $COUNTING_DATA[$j] . "_level3";
                $r = number_format($r + $DATA[$i]->$t, 2);
            }
            $DATA[$i]->pSum_level3 = $r;
        }

        //catatan 6
        // $sent = [
        //     "DATA" => $DATA,
        // ];
        // return $sent;
        //end catatan 6

        $FOR_RANGE = [];
        for ($i = 0; $i < count($DATA); $i++) {
            $FOR_RANGE[] = (float)number_format($DATA[$i]->pSum_level3, 2);
        }

        //catatan 7
        // return $FOR_RANGE;
        //end catatan 7

        $ordered_values = $FOR_RANGE;
        rsort($ordered_values);

        $ranking = [];
        foreach ($FOR_RANGE as $key => $value) {
            foreach ($ordered_values as $ordered_key => $ordered_value) {
                if ($value === $ordered_value) {
                    $key = $ordered_key;
                    break;
                }
            }

            $ranking[] = ((int) $key + 1);
        }

        //catatan 8
        // return $ranking;
        //end catatan 8

        for ($i = 0; $i < count($DATA); $i++) {
            $DATA[$i]->ranking = $ranking[$i];
        }
        // return $DATA;
        $sent = [
            "DATA" => $DATA,
            "MAX" => $MAX,
            "MIN" => $MIN,
            "BOBOT" => $BOBOT,
        ];
        // return $sent;
        return view('admin.saw.hasil2', $sent);
    }

    public function sample3()
    {
        $DATA = Mahasiswa::getData();
        $DATA = json_decode (json_encode ($DATA), FALSE);


        // $DATA = DB::select("SELECT nim, nama, p1, p2,p3,bidang,p4,p5 FROM example;");

        $COUNTING_DATA = ['p1', 'p2', 'p3', 'p4', 'p5'];
        // $COUNTING_DATA_MIN_MAX = ['MAX', 'MIN', 'MAX', 'MAX', 'MIN'];
        $COUNTING_DATA_MIN_MAX = DB::table('kriteria')->pluck('status')->toArray();
        // return $COUNTING_DATA_MIN_MAX;
        // MAX = BENEFIT, MIN = COST
        $BOBOT = DB::table('kriteria')->pluck('bobot')->toArray();

        // return $DATA;

        //CATATAN 1
        // $MAX = [];
        // for ($i = 0; $i < count($DATA); $i++) {
        //     $t = [];
        //     foreach ($DATA[$i] as $k => $d) {
        //         if (in_array($k, $COUNTING_DATA)) {
        //             $t[$k] = $d;
        //         }
        //     }
        //     $MAX[] = $t;
        // }
        // return $MAX;
        //END CATATAN 1

        $CONVERT = [];
        for ($i = 0; $i < count($DATA); $i++) {
            $t = [];
            foreach ($DATA[$i] as $k => $d) {
                if (in_array($k, $COUNTING_DATA)) {
                    $CONVERT[$k][] = number_format($d, 2);
                }
            }
        }
        //CATATAN 2
        // return $CONVERT;
        //END CATATAN 2

        $MAX = [];
        $MIN = [];
        foreach ($CONVERT as $k => $v) {
            $MAX[$k] = max($v);
            $MIN[$k] = min($v);
        }

        //catatan 3
        // $sent = [
        //     "MAX" => $MAX,
        //     "MIN" => $MIN,
        // ];
        // return $sent;
        //end catatan 3

        for ($i = 0; $i < count($DATA); $i++) {
            for ($j = 0; $j < count($COUNTING_DATA); $j++) {
                $r = $COUNTING_DATA[$j];
                $n = $COUNTING_DATA[$j] . "_level2";
                if ($COUNTING_DATA_MIN_MAX[$j] == "MAX") {
                    $DATA[$i]->$n = number_format($DATA[$i]->$r / $MAX[$r], 2);
                } else { //MIN
                    $DATA[$i]->$n = number_format($MIN[$r] / $DATA[$i]->$r, 2);
                }
            }
        }

        //catatan 4
        // $sent = [
        //     "DATA" => $DATA,
        // ];
        // return $sent;
        //end catatan 4


        for ($i = 0; $i < count($DATA); $i++) {
            for ($j = 0; $j < count($COUNTING_DATA); $j++) {
                $r = $COUNTING_DATA[$j] . "_level2";
                $n = $COUNTING_DATA[$j] . "_level3";
                // $nr =  $r . "_level3_rumus"; //catatan 5
                $DATA[$i]->$n = number_format($DATA[$i]->$r * $BOBOT[$j], 2);
                // $DATA[$i]->$nr = $DATA[$i]->$r . "*" . $BOBOT[$j]; //catatan 5
            }
        }
        //catatan 5
        // $sent = [
        //     "DATA" => $DATA,
        // ];
        // return $sent;
        //end catatan 5

        for ($i = 0; $i < count($DATA); $i++) {
            $r = 0;
            for ($j = 0; $j < count($COUNTING_DATA); $j++) {
                $t = $COUNTING_DATA[$j] . "_level3";
                $r = number_format($r + $DATA[$i]->$t, 2);
            }
            $DATA[$i]->pSum_level3 = $r;
        }

        //catatan 6
        // $sent = [
        //     "DATA" => $DATA,
        // ];
        // return $sent;
        //end catatan 6

        $FOR_RANGE = [];
        for ($i = 0; $i < count($DATA); $i++) {
            $FOR_RANGE[] = (float)number_format($DATA[$i]->pSum_level3, 2);
        }

        //catatan 7
        // return $FOR_RANGE;
        //end catatan 7

        $ordered_values = $FOR_RANGE;
        rsort($ordered_values);

        $ranking = [];
        foreach ($FOR_RANGE as $key => $value) {
            foreach ($ordered_values as $ordered_key => $ordered_value) {
                if ($value === $ordered_value) {
                    $key = $ordered_key;
                    break;
                }
            }

            $ranking[] = ((int) $key + 1);
        }

        //catatan 8
        // return $ranking;
        //end catatan 8

        for ($i = 0; $i < count($DATA); $i++) {
            $DATA[$i]->ranking = $ranking[$i];
        }
        // return $DATA;
        $sent = [
            "DATA" => $DATA,
            "MAX" => $MAX,
            "MIN" => $MIN,
            "BOBOT" => $BOBOT,
        ];
        // return $sent;
        return view('admin.saw.hasil3', $sent);
    }

    public function sample3PDF()
    {
        $DATA = Mahasiswa::getData();
        $DATA = json_decode (json_encode ($DATA), FALSE);


        // $DATA = DB::select("SELECT nim, nama, p1, p2,p3,bidang,p4,p5 FROM example;");

        $COUNTING_DATA = ['p1', 'p2', 'p3', 'p4', 'p5'];
        // $COUNTING_DATA_MIN_MAX = ['MAX', 'MIN', 'MAX', 'MAX', 'MIN'];
        $COUNTING_DATA_MIN_MAX = DB::table('kriteria')->pluck('status')->toArray();
        // return $COUNTING_DATA_MIN_MAX;
        // MAX = BENEFIT, MIN = COST
        $BOBOT = DB::table('kriteria')->pluck('bobot')->toArray();
        // return $DATA;

        //CATATAN 1
        // $MAX = [];
        // for ($i = 0; $i < count($DATA); $i++) {
        //     $t = [];
        //     foreach ($DATA[$i] as $k => $d) {
        //         if (in_array($k, $COUNTING_DATA)) {
        //             $t[$k] = $d;
        //         }
        //     }
        //     $MAX[] = $t;
        // }
        // return $MAX;
        //END CATATAN 1

        $CONVERT = [];
        for ($i = 0; $i < count($DATA); $i++) {
            $t = [];
            foreach ($DATA[$i] as $k => $d) {
                if (in_array($k, $COUNTING_DATA)) {
                    $CONVERT[$k][] = number_format($d, 2);
                }
            }
        }
        //CATATAN 2
        // return $CONVERT;
        //END CATATAN 2

        $MAX = [];
        $MIN = [];
        foreach ($CONVERT as $k => $v) {
            $MAX[$k] = max($v);
            $MIN[$k] = min($v);
        }

        //catatan 3
        // $sent = [
        //     "MAX" => $MAX,
        //     "MIN" => $MIN,
        // ];
        // return $sent;
        //end catatan 3

        for ($i = 0; $i < count($DATA); $i++) {
            for ($j = 0; $j < count($COUNTING_DATA); $j++) {
                $r = $COUNTING_DATA[$j];
                $n = $COUNTING_DATA[$j] . "_level2";
                if ($COUNTING_DATA_MIN_MAX[$j] == "MAX") {
                    $DATA[$i]->$n = number_format($DATA[$i]->$r / $MAX[$r], 2);
                } else { //MIN
                    $DATA[$i]->$n = number_format($MIN[$r] / $DATA[$i]->$r, 2);
                }
            }
        }

        //catatan 4
        // $sent = [
        //     "DATA" => $DATA,
        // ];
        // return $sent;
        //end catatan 4


        for ($i = 0; $i < count($DATA); $i++) {
            for ($j = 0; $j < count($COUNTING_DATA); $j++) {
                $r = $COUNTING_DATA[$j] . "_level2";
                $n = $COUNTING_DATA[$j] . "_level3";
                // $nr =  $r . "_level3_rumus"; //catatan 5
                $DATA[$i]->$n = number_format($DATA[$i]->$r * $BOBOT[$j], 2);
                // $DATA[$i]->$nr = $DATA[$i]->$r . "*" . $BOBOT[$j]; //catatan 5
            }
        }
        //catatan 5
        // $sent = [
        //     "DATA" => $DATA,
        // ];
        // return $sent;
        //end catatan 5

        for ($i = 0; $i < count($DATA); $i++) {
            $r = 0;
            for ($j = 0; $j < count($COUNTING_DATA); $j++) {
                $t = $COUNTING_DATA[$j] . "_level3";
                $r = number_format($r + $DATA[$i]->$t, 2);
            }
            $DATA[$i]->pSum_level3 = $r;
        }

        //catatan 6
        // $sent = [
        //     "DATA" => $DATA,
        // ];
        // return $sent;
        //end catatan 6

        $FOR_RANGE = [];
        for ($i = 0; $i < count($DATA); $i++) {
            $FOR_RANGE[] = (float)number_format($DATA[$i]->pSum_level3, 2);
        }

        //catatan 7
        // return $FOR_RANGE;
        //end catatan 7

        $ordered_values = $FOR_RANGE;
        rsort($ordered_values);

        $ranking = [];
        foreach ($FOR_RANGE as $key => $value) {
            foreach ($ordered_values as $ordered_key => $ordered_value) {
                if ($value === $ordered_value) {
                    $key = $ordered_key;
                    break;
                }
            }

            $ranking[] = ((int) $key + 1);
        }

        //catatan 8
        // return $ranking;
        //end catatan 8

        for ($i = 0; $i < count($DATA); $i++) {
            $DATA[$i]->ranking = $ranking[$i];
        }
        // return $DATA;
        $sent = [
            "DATA" => $DATA,
            "MAX" => $MAX,
            "MIN" => $MIN,
            "BOBOT" => $BOBOT,
        ];
        // return $sent;
        // $pdf = PDF::loadView('admin.saw.hasil3pdf', $sent);
        // return $pdf->download('saw.pdf');
        return view('admin.saw.hasil3pdf', $sent);
    }

    public function mahasiswa(){
        $MHS = Mahasiswa::where('nim_mahasiswa', Auth::user()->nim_mahasiswa)->first();
        $PRODI = Prodi::findorfail($MHS->prodi_id);
        $DATA = Mahasiswa::getData();
        $DATA = json_decode (json_encode ($DATA), FALSE);


        // $DATA = DB::select("SELECT nim, nama, p1, p2,p3,bidang,p4,p5 FROM example;");

        $COUNTING_DATA = ['p1', 'p2', 'p3', 'p4', 'p5'];
        $COUNTING_DATA_MIN_MAX = ['MAX', 'MIN', 'MAX', 'MAX', 'MIN'];
        $BOBOT = [0.25, 0.15, 0.20, 0.30, 0.10];

        // return $DATA;

        //CATATAN 1
        // $MAX = [];
        // for ($i = 0; $i < count($DATA); $i++) {
        //     $t = [];
        //     foreach ($DATA[$i] as $k => $d) {
        //         if (in_array($k, $COUNTING_DATA)) {
        //             $t[$k] = $d;
        //         }
        //     }
        //     $MAX[] = $t;
        // }
        // return $MAX;
        //END CATATAN 1

        $CONVERT = [];
        for ($i = 0; $i < count($DATA); $i++) {
            $t = [];
            foreach ($DATA[$i] as $k => $d) {
                if (in_array($k, $COUNTING_DATA)) {
                    $CONVERT[$k][] = number_format($d, 2);
                }
            }
        }
        //CATATAN 2
        // return $CONVERT;
        //END CATATAN 2

        $MAX = [];
        $MIN = [];
        foreach ($CONVERT as $k => $v) {
            $MAX[$k] = max($v);
            $MIN[$k] = min($v);
        }

        //catatan 3
        // $sent = [
        //     "MAX" => $MAX,
        //     "MIN" => $MIN,
        // ];
        // return $sent;
        //end catatan 3

        for ($i = 0; $i < count($DATA); $i++) {
            for ($j = 0; $j < count($COUNTING_DATA); $j++) {
                $r = $COUNTING_DATA[$j];
                $n = $COUNTING_DATA[$j] . "_level2";
                if ($COUNTING_DATA_MIN_MAX[$j] == "MAX") {
                    $DATA[$i]->$n = number_format($DATA[$i]->$r / $MAX[$r], 2);
                } else { //MIN
                    $DATA[$i]->$n = number_format($MIN[$r] / $DATA[$i]->$r, 2);
                }
            }
        }

        //catatan 4
        // $sent = [
        //     "DATA" => $DATA,
        // ];
        // return $sent;
        //end catatan 4


        for ($i = 0; $i < count($DATA); $i++) {
            for ($j = 0; $j < count($COUNTING_DATA); $j++) {
                $r = $COUNTING_DATA[$j] . "_level2";
                $n = $COUNTING_DATA[$j] . "_level3";
                // $nr =  $r . "_level3_rumus"; //catatan 5
                $DATA[$i]->$n = number_format($DATA[$i]->$r * $BOBOT[$j], 2);
                // $DATA[$i]->$nr = $DATA[$i]->$r . "*" . $BOBOT[$j]; //catatan 5
            }
        }
        //catatan 5
        // $sent = [
        //     "DATA" => $DATA,
        // ];
        // return $sent;
        //end catatan 5

        for ($i = 0; $i < count($DATA); $i++) {
            $r = 0;
            for ($j = 0; $j < count($COUNTING_DATA); $j++) {
                $t = $COUNTING_DATA[$j] . "_level3";
                $r = number_format($r + $DATA[$i]->$t, 2);
            }
            $DATA[$i]->pSum_level3 = $r;
        }

        //catatan 6
        // $sent = [
        //     "DATA" => $DATA,
        // ];
        // return $sent;
        //end catatan 6

        $FOR_RANGE = [];
        for ($i = 0; $i < count($DATA); $i++) {
            $FOR_RANGE[] = (float)number_format($DATA[$i]->pSum_level3, 2);
        }

        //catatan 7
        // return $FOR_RANGE;
        //end catatan 7

        $ordered_values = $FOR_RANGE;
        rsort($ordered_values);

        $ranking = [];
        foreach ($FOR_RANGE as $key => $value) {
            foreach ($ordered_values as $ordered_key => $ordered_value) {
                if ($value === $ordered_value) {
                    $key = $ordered_key;
                    break;
                }
            }

            $ranking[] = ((int) $key + 1);
        }

        //catatan 8
        // return $ranking;
        //end catatan 8

        for ($i = 0; $i < count($DATA); $i++) {
            $DATA[$i]->ranking = $ranking[$i];
        }
        // return $DATA;
        $sent = [
            "MHS" =>$MHS,
            "PRODI" => $PRODI,
            "DATA" => $DATA,
            "MAX" => $MAX,
            "MIN" => $MIN,
            "BOBOT" => $BOBOT,
        ];
        // return $sent;
        // $pdf = PDF::loadView('admin.saw.hasil3pdf', $sent);
        // return $pdf->download('saw.pdf');
        return view('mhs.ranking', $sent);
    }
}