@extends('layouts.user.dashboard-header')
@section('content')
      


    <!-- Page Header section start here -->
    <div class="pageheader-section style-2">
        <div class="container ">
            <div class="row  ">
                <div class="col-lg-12 col-12 mb-5">
                    <div class="pageheader-content mb-5">
                        <h2 class="phs-title mb-3"><a class="text-decoration-none" href="{{route('home')}}">Home</a> / <span class="text-primary">Profile</span> </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header section ending here -->

    <!-- course section start here -->
    <div class="course-single-section padding-tb section-bg ">
        <div class="container card bg-light">
            <div class="m-3">
                <!-- Messages -->
                <x-Message-component/> 
                <x-app-layout>
                <div>
                    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                        @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                            @livewire('profile.update-profile-information-form')
            
                            <x-jet-section-border />
                        @endif
            
                        @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                            <div class="mt-10 sm:mt-0">
                                @livewire('profile.update-password-form')
                            </div>
            
                            <x-jet-section-border />
                        @endif
            
                        @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                            <div class="mt-10 sm:mt-0">
                                @livewire('profile.two-factor-authentication-form')
                            </div>
            
                            <x-jet-section-border />
                        @endif
            
                        <div class="mt-10 sm:mt-0">
                            @livewire('profile.logout-other-browser-sessions-form')
                        </div>
            
                        @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                            <x-jet-section-border />
            
                            <div class="mt-10 sm:mt-0">
                                @livewire('profile.delete-user-form')
                            </div>
                        @endif
                    </div>
                </div>
            </x-app-layout>
            </div>
        </div>
    </div>
@endsection