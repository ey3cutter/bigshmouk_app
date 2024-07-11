<?php

namespace App\Filament\Client\Resources\ClientRegisterResource\Pages\Auth;

use App\Filament\Client\Resources\ClientRegisterResource;
use Filament\Forms\Components\Component;
use Filament\Forms;
use Filament\Notifications\Notification;
use Filament\Pages\Auth\Register as BaseRegister;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class ClientRegister extends BaseRegister
{
    protected function getForms(): array
    {
        return [
            'form' => $this->form(
                $this->makeForm()
                    ->schema([
                        $this->getNameFormComponent(),
                        $this->getEmailFormComponent(),
                        $this->getPasswordFormComponent(),
                        $this->getPasswordConfirmationFormComponent(),
                        $this->getPhoneFormComponent(),
                    ])
                    ->statePath('data'),
            ),
        ];
    }

    protected function getPhoneFormComponent(): Component
    {
        return Forms\Components\TextInput::make('phone')
            ->required()
            ->numeric()
            ->label('Номер телефона (введите в формате 9000000000')
            ->minLength(10)
            ->maxLength(10);
    }
}


