<?php

namespace Joaopaulolndev\FilamentEditProfile;

use Closure;
use Filament\Contracts\Plugin;
use Filament\Panel;
use Filament\Support\Concerns\EvaluatesClosures;
use Joaopaulolndev\FilamentEditProfile\Livewire\SanctumTokens;
use Joaopaulolndev\FilamentEditProfile\Pages\EditProfilePage;
use Livewire\Livewire;

class FilamentEditProfilePlugin implements Plugin
{
    use EvaluatesClosures;

    public Closure | bool $access = true;

    public Closure | bool $shouldRegisterNavigation = true;

    public Closure | int $sort = 90;

    public Closure | string $icon = '';

    public Closure | string $navigationGroup = '';

    public Closure | string $title = '';

    public Closure | string $navigationLabel = '';

    public Closure | bool $shouldShowDeleteAccountForm = true;

    public Closure | bool $shouldShowBrowserSessionsForm = true;

    protected Closure | bool $sanctumTokens = false;

    protected $sanctumPermissions = ['create', 'view', 'update', 'delete'];

    protected Closure | bool $shouldShowAvatarForm = false;

    protected string $avatarDirectory = 'avatars';

    protected array | string $avatarRules = ['max:1024'];

    public function getId(): string
    {
        return 'filament-edit-profile';
    }

    public function register(Panel $panel): void
    {
        $panel
            ->pages($this->preparePages());
    }

    protected function preparePages(): array
    {

        return [
            EditProfilePage::class,
        ];
    }

    public function boot(Panel $panel): void
    {
        if ($this->sanctumTokens) {
            Livewire::component('sanctum-tokens', SanctumTokens::class);
        }
    }

    public static function make(): static
    {
        return app(static::class);
    }

    public static function get(): static
    {
        /** @var static $plugin */
        $plugin = filament(app(static::class)->getId());

        return $plugin;
    }

    public function setTitle(Closure | string $value = ''): static
    {
        $this->title = $value;

        return $this;
    }

    public function getTitle(): ?string
    {
        return ! empty($this->title) ? $this->evaluate($this->title) : null;
    }

    public function setNavigationLabel(Closure | string $value = ''): static
    {
        $this->navigationLabel = $value;

        return $this;
    }

    public function getNavigationLabel(): ?string
    {
        return ! empty($this->navigationLabel) ? $this->evaluate($this->navigationLabel) : null;
    }

    public function setNavigationGroup(Closure | string $value = ''): static
    {
        $this->navigationGroup = $value;

        return $this;
    }

    public function getNavigationGroup(): ?string
    {
        return ! empty($this->navigationGroup) ? $this->evaluate($this->navigationGroup) : null;
    }

    public function setIcon(Closure | string $value = ''): static
    {
        $this->icon = $value;

        return $this;
    }

    public function getIcon(): ?string
    {
        return ! empty($this->icon) ? $this->evaluate($this->icon) : null;
    }

    public function setSort(Closure | int $value = 100): static
    {
        $this->sort = $value;

        return $this;
    }

    public function getSort(): int
    {
        return $this->evaluate($this->sort);
    }

    public function canAccess(Closure | bool $value = true): static
    {
        $this->access = $value;

        return $this;
    }

    public function getCanAccess(): bool
    {
        return $this->evaluate($this->access);
    }

    public function shouldRegisterNavigation(Closure | bool $value = true): static
    {
        $this->shouldRegisterNavigation = $value;

        return $this;
    }

    public function getShouldRegisterNavigation(): bool
    {
        return $this->evaluate($this->shouldRegisterNavigation);
    }

    public function shouldShowDeleteAccountForm(Closure | bool $value = true): static
    {
        $this->shouldShowDeleteAccountForm = $value;

        return $this;
    }

    public function getShouldShowDeleteAccountForm(): bool
    {
        return $this->evaluate($this->shouldShowDeleteAccountForm);
    }

    public function shouldShowBrowserSessionsForm(Closure | bool $value = true): static
    {
        $this->shouldShowBrowserSessionsForm = $value;

        if (config('session.driver') !== 'database') {
            $this->shouldShowBrowserSessionsForm = false;
        }

        return $this;
    }

    public function getShouldShowBrowserSessionsForm(): bool
    {
        if (config('session.driver') !== 'database') {
            $this->shouldShowBrowserSessionsForm = false;
        }

        return $this->evaluate($this->shouldShowBrowserSessionsForm);
    }

    public function getshouldShowSanctumTokens(): bool
    {
        return $this->evaluate($this->sanctumTokens);
    }

    public function shouldShowSanctumTokens(Closure | bool $condition = true, ?array $permissions = null)
    {
        $this->sanctumTokens = $condition;

        if (! is_null($permissions)) {
            $this->sanctumPermissions = $permissions;
        }

        return $this;
    }

    public function getSanctumPermissions(): array
    {
        return collect($this->sanctumPermissions)->mapWithKeys(function ($item, $key) {
            $key = is_string($key) ? $key : strtolower($item);

            return [$key => $item];
        })->toArray();
    }

    public function shouldShowAvatarForm(Closure | bool $value = true, ?string $directory = null, string | array | null $rules = null): static
    {
        $this->shouldShowAvatarForm = $value;

        if (! is_null($directory)) {
            $this->avatarDirectory = $directory;
        }

        if (! is_null($rules)) {
            $this->avatarRules = $rules;
        }

        return $this;
    }

    public function getShouldShowAvatarForm(): bool
    {
        return $this->evaluate($this->shouldShowAvatarForm);
    }

    public function getAvatarDirectory(): string
    {
        return $this->avatarDirectory;
    }

    public function getAvatarRules(): array | string
    {
        return $this->avatarRules;
    }
}
