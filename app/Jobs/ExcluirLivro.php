<?php

namespace App\Jobs;

use App\Mail\NovoEmail;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class ExcluirLivro implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $livro;
    public $dt_lancamento;
    private $mail;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($mail)
    {
        //
        $this->livro = $mail->livro;
        $this->dt_lancamento = $mail->dt_lancamento;
        $this->mail = $mail;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
//        $user = User::first();
//        //      SEND EMAIL CONFIG
//        $email = new NovoEmail(
//            $this->livro,
//            $this->dt_lancamento
//        );
//
//        $email->subject = 'Novo Livro Cadastrado';

//        $user = 'teste@teste.com';

//        Mail::to($user)->send($email);
        //      SEND EMAIL CONFIG
    }
}
