<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\Siswa;
use App\Models\Kelas;

class ImportSiswaCmd extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:siswa';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Background Process Import Data Siswa. ImportSiswaCmd';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $data_kelas = 'XII-H';
        $simpan = Kelas::where('nama_kelas','=',$data_kelas)->get()->first();

        if(empty($simpan)) {
            $simpan = new Kelas();
            
        } 
        $simpan->nama_kelas = $data_kelas;
        $simpan->save();
    }
}
