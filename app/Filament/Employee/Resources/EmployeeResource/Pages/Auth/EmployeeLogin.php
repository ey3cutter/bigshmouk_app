<?php

namespace App\Filament\Employee\Resources\EmployeeResource\Pages\Auth;

use App\Filament\Employee\Resources\EmployeeResource;
use Filament\Forms\Components\Component;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\Page;
use Filament\Pages\Auth\Login as BaseAuth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Filament\Http\Responses\Auth\Contracts\LoginResponse;

class EmployeeLogin extends BaseAuth
{
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                $this->getEmailFormComponent(),
                $this->getPasswordFormComponent(),
                $this->getRememberFormComponent(),
            ])
            ->statePath('data');
    }

    public function authenticate(): ?\Filament\Http\Responses\Auth\Contracts\LoginResponse
    {
        $credentials = $this->getCredentialsFromFormData($this->data);

        if (Auth::guard('employee')->attempt($credentials)) {
            $user = Auth::guard('employee')->user();

            if (!$user->is_working) {
                Auth::guard('employee')->logout();

                $this->throwDeactivatedAccountException();
            }

            return app(LoginResponse::class);
        }

        $this->throwFailureValidationException();
    }

    protected function getCredentialsFromFormData(array $data): array
    {
        return [
            'email' => $data['email'],
            'password' => $data['password'],
        ];
    }

    protected function throwFailureValidationException(): never
    {
        throw ValidationException::withMessages([
            'data.email' => __('filament-panels::pages/auth/login.messages.failed'),
        ]);
    }

    protected function throwDeactivatedAccountException(): never
    {
        throw ValidationException::withMessages([
            'data.email' => 'Ваш аккаунт был деактивирован.',
        ]);
    }
}
