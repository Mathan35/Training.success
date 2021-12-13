<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\UserPersonalSkill;
use App\Models\UserTechSkill;
use App\helpers\General;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;
    use General;

     public function create(array $input)
     {

        Validator::make($input, [
            'name'             => ['required', 'string', 'max:255'],
            'email'            => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone_number'     => ['required', 'string', 'numeric', 'unique:users'],
            'password'         => $this->passwordRules(),
            'terms'            => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();
  
        return  User::create([
            'user_id'           => $this->random(),
            'name'              => $input['name'],
            'email'             => $input['email'],
            'phone_number'      => $input['phone_number'],
            'registration_date' => Carbon::today()->toDateString(),
            'registration_time' => Carbon::now()->toTimeString(),
            'ip_address'        => $this->getIp(),
            'password'          => Hash::make($input['password']),
            
        ]);
    }
}
