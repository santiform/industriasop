<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MiCorreoConAdjunto extends Mailable
{
    use Queueable, SerializesModels;

    public $detalles;
    public $archivoPdf;

    public function __construct($detalles, $archivoPdf)
    {
        $this->detalles = $detalles;
        $this->archivoPdf = $archivoPdf;
    }

    public function build()
    {
        return $this->view('emails.mi_correo_con_adjunto')
                    ->attach(storage_path('app/public/' . $this->archivoPdf));
    }
}
