<?php

namespace App\Listeners;

use App\Events\NovoLivro;
use App\Mail\NovoEmail;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class EnviarEmailNovoLivro
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\NovoLivro  $event
     * @return void
     */
    public function handle(NovoLivro $event)
    {
        $user = User::first();
        //      SEND EMAIL CONFIG
        $email = new NovoEmail(
            $event->titulo,
            $event->dt_lancamento
        );

        $email->subject = 'Novo Livro Cadastrado';

//        $user = 'teste@teste.com';

        Mail::to($user)->queue($email);
        //      SEND EMAIL CONFIG
    }
}
