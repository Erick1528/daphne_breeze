<?php

namespace App\Livewire;

use Livewire\Component;

class ReservationOptions extends Component
{
    /** Número para WhatsApp y llamadas (sin + ni espacios). Ej: 50412345678 */
    public string $whatsappNumber = '50412345678';

    /** Teléfono formateado para mostrar. Ej: +504 1234-5678 */
    public string $phoneDisplay = '+504 1234-5678';

    public string $email = 'reservas@daphnebreeze.com';

    public string $bookingUrl = 'https://www.booking.com';

    public string $airbnbUrl = 'https://www.airbnb.com';

    public function mount(): void
    {
        // Opcional: cargar desde config o env
        // $this->whatsappNumber = config('contact.whatsapp', '50412345678');
        // $this->phoneDisplay = config('contact.phone_display', '+504 1234-5678');
        // $this->email = config('contact.email');
        // $this->bookingUrl = config('contact.booking_url');
        // $this->airbnbUrl = config('contact.airbnb_url');
    }

    public function getWhatsAppLink(): string
    {
        return 'https://wa.me/' . preg_replace('/\D/', '', $this->whatsappNumber);
    }

    public function getTelLink(): string
    {
        return 'tel:+' . preg_replace('/\D/', '', $this->whatsappNumber);
    }

    public function render()
    {
        return view('livewire.reservation-options');
    }
}
