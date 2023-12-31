<?php

namespace LaravelFrontendPresets\MaterialPreset;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\Console\PresetCommand;
use Laravel\Ui\UiCommand; 
use Laravel\Ui\AuthCommand;

class MaterialPresetServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        UiCommand::macro('material', function ($command) {
            MaterialPreset::install();
            
            $command->info('E-Invoice System scaffolding installed successfully.');
        });
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
