<?php

namespace App;

use Laravel\Socialite\Contracts\User as ProviderUser;

class SocialAccountService
{
    public function createOrGetUser(ProviderUser $providerUser)
    {
        $account = SocialAccount::whereProvider('facebook')
            ->whereProviderUserId($providerUser->getId())
            ->first();

        if ($account) {
            return $account->user;
        } else {

            $account = new SocialAccount([
                'provider_user_id' => $providerUser->getId(),
                'provider' => 'facebook'
            ]);

            $user = User::where('email', $providerUser->getEmail())->whereNotIn('email', [0])->first();


            if (!$user) {

                $role = Role::whereName([
                    'name' => 'regular'
                ])->first();

                $user = new User([
                    'email' => $providerUser->getEmail(),
                    'name' => $providerUser->getName()
                ]);


                $role->users()->save($user);


            }

            $account->user()->associate($user);
            $account->save();

            return $user;

        }

    }
}