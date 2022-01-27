<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NovoLivro
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $titulo;
    public $dt_lancamento;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($titulo, $dt_lancamento)
    {
        //
        $this->titulo = $titulo;
        $this->dt_lancamento = $dt_lancamento;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
