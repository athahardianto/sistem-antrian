<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Videos;
use Illuminate\Support\Facades\Storage;

class VideoController extends Controller
{
    // Menampilkan halaman dashboard petugas untuk upload video
    public function indexAdmin()
    {
        $currentVideo = Videos::where('key', 'active_video')->first();
        return view('video', compact('currentVideo'));
    }
    public function indexMonitoring()
    {
        $setting = Videos::where('key', 'active_video')->first();
        $currentVideo = $setting ? $setting->value : null;

        return view('monitoring-antrian-2', compact('currentVideo'));
    }

    // Proses upload video oleh petugas
    public function updateVideo(Request $request)
    {
        $request->validate([
            'video' => 'required|mimes:mp4,webm,ogg|max:1048576', // Max 1GB, sesuaikan kebutuhan
        ]);

        $setting = Videos::firstOrNew(['key' => 'active_video']);

        // Hapus video lama jika ada di storage public
        if ($setting->value && Storage::disk('public')->exists('videos/' . $setting->value)) {
            Storage::disk('public')->delete('videos/' . $setting->value);
        }

        // Upload video baru ke folder public/storage/videos
        $file = $request->file('video');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->storeAs('videos', $filename, 'public');

        // Simpan nama file ke database
        $setting->value = $filename;
        $setting->save();

        return redirect()->back()->with('success', 'Video informasi berhasil diperbarui!');
    }

    // Mengambil data video untuk halaman monitoring publik (bisa via API/JSON atau langsung compact)
    public function getActiveVideo()
    {
        $setting = Videos::where('key', 'active_video')->first();
        return $setting ? $setting->value : null;
    }
}
