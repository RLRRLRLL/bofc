<?php

namespace App\Http\Livewire\Visitor;

use Livewire\Component;
use App\Models\ContactFormMessage;

class ContactForm extends Component
{
	public $name;
	public $email;
	public $text;
	public $successAlert = 'Message sent successfully.';

	protected $rules = [
		'name' => 'required|min:2',
		'text' => 'required|min:5|max:500',
		// 'email' => 'required|email:rfc,dns'
		'email' => 'required|email'
	];

	public function sendMessage()
	{
		$this->validate();

		ContactFormMessage::create([
			'name' => $this->name,
			'text' => $this->text,
			'email' => $this->email,
		]);

		sleep(1);
		
		$this->reset();
		$this->dispatchBrowserEvent('message-sent');
	}

    public function render()
    {
		if ($this->getErrorBag()->count() > 0)
		{
            $this->dispatchBrowserEvent('error-ocured');
        }

        return view('livewire.visitor.contact-form');
    }
}
