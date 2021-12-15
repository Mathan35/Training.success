<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

<div class="container">
    <div class="row">
        <div class="col-md-12">
        
        <h1 class = "back-home mt-4" ><a class = "text-primary" href="/">Home</a></h1>
            <div class = "profile-detail shadow mt-4"><br>
            @include('layouts.error-message')   
                <h1 class = "">Manage profile Information</h1>
                <div class = "profile-body">
                    <form action="{{route('create_profile')}}" method="post">
                        @csrf
                        <div class="mt-4">
                            <label for="personal_skills" value="{{ __('Personal Skills') }}" >Personal Skills</lebel>
                            @forelse($getPesonalSkill as $data)
                            <input id="personal_skills" value = "{{$data['skill_name']}}"  class=" mt-1 " type="text" name="personal_skills"   />
                            @empty
                            <input id="personal_skills" class=" mt-1 " type="text" name="personal_skills"   />
                            @endforelse
                        </div>
                        <div class="mt-4">
                            <label for="technical_skills" value="{{ __('Technical Skills') }}" >Technical Skills</lebel>
                            @forelse($getTechSkill as $value)
                            <input id="technical_skills" value = "{{$value['skill_name']}}"   class="" type="text" name="technical_skills" />
                            @empty
                            <input id="technical_skills"   class="" type="text" name="technical_skills" />
                            @endforelse
                        </div>
                        <div class="mt-4">
                            <label for="instagram_url" value="{{ __('Instagram URL') }}" >Instagram URL</lebel>
                            <input id="instagram_url" value = "{{$getUserDetails->instagram_url}}" class="" type="text" name="instagram_url"   />
                        </div>
                        <div class="mt-4">
                            <label for="facebook_url" value="{{ __('Facbook URL') }}" >Facbook URL</lebel>
                            <input id="facebook_url"  value = "{{$getUserDetails->facebook_url}}"    class="" type="text" name="facebook_url" />

                        </div>
                        <div class="mt-4">
                            <label for="linkedin_url" value="{{ __('Linked In URL') }}" >Linked In URL</lebel>
                            <input id="linkedin_url" value = "{{$getUserDetails->linkedin_url}}"  class="" type="text" name="linkedin_url"  />
                        </div>
                        <div class="mt-4">
                            <label for="recovery_email" value="{{ __('Recovery Email') }}" >Recovery Email</lebel>
                            <input id="recovery_email" class="" type="email"  value = "{{$getUserDetails->recovery_email}}"   name="recovery_email"  />
                        </div>
                        <x-jet-button class="ml-0 mt-3 mb-4">
                                {{ __('Update') }}
                            </x-jet-button>
                        <br>
                </form>
            
                </div>
            </div>
        </div>
                
    </div>
</div>
</x-app-layout>
