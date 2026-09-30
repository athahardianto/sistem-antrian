<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Antrian;

class AntrianController extends Controller
{
    protected $antrian;

    public function __construct(Antrian $antrian)
    {
        $this->antrian = $antrian;
    }

    public function panggilanAntrianView()
    {
        $data = [
            'antrianToday'       => $this->antrian->getAntrianToday(),
            'antrianJumlah'      => $this->antrian->countAntrian(), // REVISI: Perbaikan nama method
            'antrianNow'         => $this->antrian->getAntrianNow(),
            'antrianSelanjutnya' => $this->antrian->getAntrianSelanjutnya(),
            'antrianSisa'        => $this->antrian->getSisaAntrian(),
        ];

        return view('panggilan_antrian', ['data' => $data]);
    }

    public function antrianToday()
    {
        // REVISI: Format ditambahkan wrapper 'data' agar langsung kompatibel dengan DataTables Ajax
        return response()->json([
            'data' => $this->antrian->getAntrianToday()
        ]);
    }

    public function antrianJumlah()
    {
        return response()->json(['total' => $this->antrian->countAntrian()]);
    }

    public function antrianNow()
    {
        $now = $this->antrian->getAntrianNow();
        return response()->json(['no_antrian' => $now ? $now->no_antrian : '-']);
    }

    public function antrianSelanjutnya()
    {
        $next = $this->antrian->getAntrianSelanjutnya();
        return response()->json(['no_antrian' => $next ? $next->no_antrian : '-']);
    }

    public function antrianSisa()
    {
        return response()->json(['total' => $this->antrian->getSisaAntrian()]);
    }

    public function inputAntrian()
    {
        return response()->json($this->antrian->insertAntrian());
    }

    public function updateStatusAntrian(Request $request, $id)
    {
        return response()->json($this->antrian->updateStatusAntrian($id));
    }

    public function resetAntrian()
    {
        $result = $this->antrian->resetAntrian();
        return response()->json($result);
    }
}