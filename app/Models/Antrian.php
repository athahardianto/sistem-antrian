<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class Antrian
{
    public function index()
    {
        return DB::table('antrians')->get();
    }

    public function getAntrianToday()
    {
        return DB::table('antrians')
            ->where('tanggal', today())
            ->get();
    }

    public function countAntrian()
    {
        return DB::table('antrians')
            ->where('tanggal', today())
            ->count();
    }

    public function getAntrianNow()
    {
        return DB::table('antrians')
            ->select('no_antrian')
            ->where('tanggal', today())
            ->where('status', '1')
            ->orderBy('updated_date', 'desc')
            ->first();
    }

    public function getAntrianSelanjutnya()
    {
        return DB::table('antrians')
            ->select('no_antrian')
            ->where('tanggal', today())
            ->where('status', '0')
            ->orderBy('no_antrian', 'asc')
            ->first();
    }

    public function getSisaAntrian()
    {
        return DB::table('antrians')
            ->where('tanggal', today())
            ->where('status', '0')
            ->count();
    }

    public function insertAntrian()
    {
        try {
            DB::beginTransaction();

            $maxAntrian = DB::table('antrians')
                ->where('tanggal', today())
                ->max('no_antrian');

            $noAntrian = ($maxAntrian ?? 0) + 1;

            DB::table('antrians')->insert([
                'tanggal' => now(),
                'no_antrian' => $noAntrian,
                'status' => '0',
            ]);

            DB::commit();
            return ['status' => true, 'no_antrian' => $noAntrian];
        } catch (\Throwable $th) {
            DB::rollBack();
            return [
                'status' => false,
                'msg' => $th->getMessage()
            ];
        }
    }

    public function updateStatusAntrian($id)
    {
        try {
            DB::beginTransaction();

            // REVISI: Dihapus bagian $data->no_antrian yang undefined
            $update = DB::table('antrians')
                ->where('id', $id)
                ->update([
                    'status' => '1',
                    'updated_date' => now()
                ]);

            if (!$update) {
                DB::rollBack();
                return [
                    'status' => false,
                    'msg' => 'Gagal mengupdate data antrian'
                ];
            }

            DB::commit();
            return ['status' => true];
        } catch (\Throwable $th) {
            DB::rollBack();
            return [
                'status' => false,
                'msg' => $th->getMessage()
            ];
        }
    }

    public function resetAntrian(){
        try {
            // Truncate akan menghapus seluruh data dan mereset ID kembali ke 1
            DB::table('antrians')->truncate();
            return ['status' => true, 'msg' => 'Berhasil mereset seluruh data antrian.'];
        } catch (\Throwable $th) {
            return ['status' => false, 'msg' => $th->getMessage()];
        }
    }
}