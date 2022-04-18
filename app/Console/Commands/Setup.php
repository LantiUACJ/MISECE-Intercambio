<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use App\Model\User;

class Setup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'setup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $name = $this->ask('Introducir nombre');
        $email = $this->ask('Introducir email');
        $password = $this->secret('Introducir password');
        $rol_id = $this->ask('Introducir rol:  1) Admin, 2) Hospital, 3) Médico, 4) Paramédico, 5) Paciente');
        $hospital_id = $this->ask('Introducir hospital (0 para administrador)');
        $user = new \App\Models\User();
        $user->name = $name;
        $user->email = $email;
        $user->rol_id = $rol_id;
        $user->hospital_id = $hospital_id;
        $user->password = Hash::make($password);

        if($user->save()){
            $this->info('Administrador registrado correctamente');
        }
        return 0;
    }
}
