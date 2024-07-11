<?php

namespace App\Filament\Client\Resources;

use App\Filament\Client\Resources\MyOrdersResource\Pages;
use App\Models\ClientOrder;
use App\Models\Client;
use App\Models\Service;
use App\Models\Employee;
use Carbon\Carbon;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class MyOrdersResource extends Resource
{
    protected static ?string $model = ClientOrder::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('employee_id')
                    ->label('Звукорежиссёр')
                    ->options(Employee::where('is_working', true)->pluck('name', 'id'))
                    ->required()
                    ->reactive()
                    ->afterStateUpdated(fn ($state, callable $set) => $set('disabled_dates', self::getDisabledDates($state))),
                Forms\Components\Select::make('service_id')
                    ->label('Услуга')
                    ->options(Service::where('is_active', true)->pluck('name', 'id'))
                    ->required()
                    ->reactive()
                    ->afterStateUpdated(function ($state, callable $set) {
                        $service = Service::find($state);
                        $set('price', $service ? $service->price : null);
                    }),
                Forms\Components\TextInput::make('price')
                    ->label('Цена')
                    ->disabled(),
                Forms\Components\DatePicker::make('date_of_order')
                    ->label('Дата')
                    ->required()
                    ->reactive()
                    ->minDate(Carbon::now()) // Отключение прошлых дат
                    ->disabledDates(fn ($get) => $get('disabled_dates') ?? [])
                    ->native(false) // Отключение нативного выбора даты
                    ->format('Y-m-d'), // Убедитесь, что дата сохраняется в правильном формате
                Forms\Components\FileUpload::make('audio_file')
                    ->label('Аудиофайл')
                    ->disk('public')
                    ->directory('audio_files')
                    ->acceptedFileTypes(['audio/*'])
                    ->maxSize(10240) // 10 MB
                    ->preserveFilenames()
                    ->storeFileNamesIn('original_name')
                    ->visibility('public')
                    ->getUploadedFileNameForStorageUsing(function ($file): string {
                        $fileName = $file->getClientOriginalName();
                        $extension = pathinfo($fileName, PATHINFO_EXTENSION);
                        $name = pathinfo($fileName, PATHINFO_FILENAME);
                        $slug = Str::slug($name, '-');

                        $timestamp = now()->timestamp;
                        $storedFileName = "{$timestamp}-{$slug}.{$extension}";
                        Log::info('Stored file name: ' . $storedFileName);
                        return $storedFileName;
                    })
                    ->openable()
                    ->downloadable(),
                Forms\Components\Textarea::make('description')
                    ->label('Описание'),
            ]);
    }
    public static function getDisabledDates($employeeId)
    {
        if (!$employeeId) {
            return [];
        }

        $dates = ClientOrder::where('employee_id', $employeeId)->pluck('date_of_order')->toArray();
        $pastDates = self::getPastDates();

        return array_merge($dates, $pastDates);
    }

    public static function getPastDates()
    {
        $today = Carbon::today();
        $dates = [];

        for ($date = Carbon::now()->subYear(); $date->lte($today); $date->addDay()) {
            if ($date->lt($today)) {
                $dates[] = $date->format('Y-m-d');
            }
        }

        return $dates;
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('client_id',auth()->id());
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('employees.name')->label('Звукорежиссёр'),
                Tables\Columns\TextColumn::make('services.name')->label('Услуга'),
                Tables\Columns\TextColumn::make('services.price')->label('Цена'),
                Tables\Columns\TextColumn::make('date_of_order')->label('Дата'),
                Tables\Columns\TextColumn::make('status')->label('Статус'),
                Tables\Columns\TextColumn::make('description')->label('Описание'),
                Tables\Columns\ViewColumn::make('audio_file')->label('Аудиофайл')
                    ->view('vendor.filament-panels.components.audio-player')
                    ->url(fn($record) => (string) $record->audio_file_url ?? ''),
            ])
            ->filters([
                SelectFilter::make('employee_id')
                    ->label('Звукорежиссёр')
                    ->options(Employee::all()->pluck('name', 'id')),
                SelectFilter::make('service_id')
                    ->label('Услуга')
                    ->options(Service::all()->pluck('name', 'id')),
                SelectFilter::make('status')
                    ->label('Статус заказа')
                    ->options([
                        'Не обработан' => 'Не обработан',
                        'Выполнен' => 'Выполнен',
                        'Подтверждён' => 'Подтверждён',
                    ]),
                Filter::make('date_of_order')
                    ->label('Дата заказа')
                    ->form([
                        Forms\Components\DatePicker::make('date_from')
                            ->label('С даты'),
                        Forms\Components\DatePicker::make('date_to')
                            ->label('По дату'),
                    ])
                    ->query(function (Builder $query, array $data) {
                        return $query
                            ->when($data['date_from'], fn ($query, $date) => $query->whereDate('date_of_order', '>=', $date))
                            ->when($data['date_to'], fn ($query, $date) => $query->whereDate('date_of_order', '<=', $date));
                    }),
            ])
            ->actions([
                //
            ])
            ->bulkActions([
                //
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMyOrders::route('/'),
            'create' => Pages\CreateMyOrders::route('/create'),
            'edit' => Pages\EditMyOrders::route('/{record}/edit'),
        ];
    }

    public static function getNavigationLabel(): string
    {
        return 'Мои заказы';
    }

    public static function getLabel(): string
    {
        return 'Заказа';
    }

    public static function getPluralLabel(): string
    {
        return 'Мои заказы';
    }
}
