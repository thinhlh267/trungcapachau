<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Major;
use App\Models\AdmissionCategory;
use App\Models\Department; 
class AppServiceProvider extends ServiceProvider
{

    public function register(): void
    {
        //
    }


    public function boot(): void
    {
        try {
            View::share('headerMajors', Major::where('is_active', true)->get());

            $admissionMenu = AdmissionCategory::where('is_active', true)
                                            ->orderBy('sort_order')
                                            ->get();
            View::share('admissionMenu', $admissionMenu);

            $globalDepartments = Department::where('is_active', true)->get();
            View::share('globalDepartments', $globalDepartments);

        } catch (\Exception $e) {

            View::share('headerMajors', []);
            View::share('admissionMenu', []);
            View::share('globalDepartments', []); 
        }
        
    }
}