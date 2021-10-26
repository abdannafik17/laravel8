<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\Globalvar;

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
        $data_kelas = 'XII-J';
        $simpan = Kelas::where('nama_kelas','=',$data_kelas)->get()->first();

        if(empty($simpan)) {
            $simpan = new Kelas();
            
        } 
        $simpan->nama_kelas = $data_kelas;
        $simpan->save();

        $gv = Globalvar::where('varname', '=','import_siswa')->get()->first();
        $gv->varvalue = '0';
        $gv->save();
    }
}
