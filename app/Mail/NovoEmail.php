<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NovoEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $titulo;
    public $dt_lancamento;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($titulo, $dt_lancamento)
    {
        $this->titulo = $titulo;
        $this->dt_lancamento = $dt_lancamento;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.email');
    }
}
