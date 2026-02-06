<?php

namespace App\Livewire;

use App\Mail\ContactMail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class ContactForm extends Component
{
    public string $name = '';

    public string $email = '';

    public string $subject = '';

    public string $message = '';

    public bool $sent = false;

    protected $rules = [
        'name'    => 'required|string|min:2|max:100',
        'email'   => 'required|email',
        'subject' => 'required|string|min:3|max:150',
        'message' => 'required|string|min:10|max:2000',
    ];

    protected array $messages = [
        'name.required'   => 'El nombre es obligatorio.',
        'name.min'       => 'El nombre debe tener al menos 2 caracteres.',
        'name.max'       => 'El nombre no puede superar 100 caracteres.',
        'email.required' => 'El correo electrónico es obligatorio.',
        'email.email'    => 'Introduce un correo electrónico válido.',
        'subject.required' => 'El asunto es obligatorio.',
        'subject.min'    => 'El asunto debe tener al menos 3 caracteres.',
        'subject.max'    => 'El asunto no puede superar 150 caracteres.',
        'message.required' => 'El mensaje es obligatorio.',
        'message.min'     => 'El mensaje debe tener al menos 10 caracteres.',
        'message.max'     => 'El mensaje no puede superar 2000 caracteres.',
    ];

    protected function validationAttributes(): array
    {
        return [
            'name'    => 'nombre',
            'email'   => 'correo electrónico',
            'subject' => 'asunto',
            'message' => 'mensaje',
        ];
    }

    public function submit(): void
    {
        Log::info('ContactForm: submit() llamado', [
            'name' => $this->name,
            'email' => $this->email,
            'subject' => $this->subject,
        ]);

        $this->validate();

        try {
            Log::info('ContactForm: Intentando enviar email a info@hoteldaphnebreeze.com');
            
            Mail::to('info@hoteldaphnebreeze.com')
                ->send(new ContactMail($this->name, $this->email, $this->subject, $this->message));

            Log::info('ContactForm: Email enviado correctamente');
            
            $this->sent = true;
            $this->reset(['name', 'email', 'subject', 'message']);
        } catch (\Exception $e) {
            Log::error('ContactForm: Error al enviar email', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
            
            $this->sent = true;
            $this->reset(['name', 'email', 'subject', 'message']);
        }
    }

    public function render()
    {
        return view('livewire.contact-form');
    }
}
