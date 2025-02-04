<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 text-center font-weight-bold">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="container">
            <div class="row">
                <!-- Left Column -->
                <div class="col-12 col-md-6">
                    <!-- Profile Information Form -->
                    <div class="card mb-4">
                        <div class="card-body">
                            @include('profile.partials.update-profile-information-form')
                        </div>
                    </div>
    
                    <!-- Delete User Form -->
                    <div class="card mb-4">
                        <div class="card-body">
                            @include('profile.partials.delete-user-form')
                        </div>
                    </div>
                </div>
    
                <!-- Right Column -->
                <div class="col-12 col-md-6">
                    <!-- Update Password Form -->
                    <div class="card mb-4">
                        <div class="card-body">
                            @include('profile.partials.update-password-form')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>
