<?php

namespace App\Console\Commands;

use App\Models\Client;
use Filament\Facades\Filament;
use Illuminate\Console\Command;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Hash;

class MakeClientCommand extends Command
{
    protected $description = 'Создать клиента';

    protected $signature = 'make:filament-client
                            {--name= : The name of the user}
                            {--email= : A valid and unique email address}
                            {--password= : The password for the user (min. 8 characters)}
                            {--phone= : The phone number of the user}';

    /**
     * @var array{'name': string | null, 'email': string | null, 'password': string | null, 'passport_number': string | null, 'age': string | null, 'position_id': string | null, 'is_admin': true | false}
     */
    protected array $options;

    /**
     * @return array{'name': string, 'email': string, 'password': string, 'passport_number': string, 'age': string, 'position_id': string, 'is_admin': boolean}
     */
    protected function getUserData(): array
    {
        return [
            'name' => $this->options['name'] ?? $this->ask('ФИО'),

            'email' => $this->options['email'] ?? $this->askValidEmail(),

            'password' => Hash::make($this->options['password'] ?? $this->secret('Пароль')),

            'phone' => $this->options['phone'] ?? $this->ask('Номер телефона'),
        ];
    }

    protected function askValidEmail(): string
    {
        $email = $this->ask('Email');

        while (! filter_var($email, FILTER_VALIDATE_EMAIL) || Client::where('email', $email)->exists()) {
            $this->error('The email address must be valid and unique.');
            $email = $this->ask('Email');
        }

        return $email;
    }

    protected function createUser(): Authenticatable
    {
        return Client::create($this->getUserData());
    }

    protected function sendSuccessMessage(Authenticatable $user): void
    {
        $loginUrl = Filament::getLoginUrl();

        $this->info('Success! ' . ($user->getAttribute('email') ?? $user->getAttribute('username') ?? 'You') . " may now log in at {$loginUrl}");
    }

    public function handle(): int
    {
        $this->options = $this->options();

        if (! Filament::getCurrentPanel()) {
            $this->error('Filament has not been installed yet: php artisan filament:install --panels');

            return static::INVALID;
        }

        $user = $this->createUser();
        $this->sendSuccessMessage($user);

        return static::SUCCESS;
    }
}
