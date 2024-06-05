<?php

namespace App\Services;

use App\Models\Color;
use App\Models\Taxi;
use App\Models\User;
use App\Models\UserTaxi;

class TaxiService
{
    public static function validateAndBuy(User $user, Taxi $taxi): bool|string|null
    {
        if ($validate = self::canBuy($user, $taxi)) {
            return $validate;
        }

        return self::buy($user, $taxi);
    }

    public static function validateAndPaint(User $user, UserTaxi $userTaxi, Color $color): bool|string|null
    {
        if ($validate = self::canPaint($user, $userTaxi, $color)) {
            return $validate;
        }

        return self::paint($user, $userTaxi, $color);
    }

    private static function buy(User $user, Taxi $taxi): bool
    {
        UserService::decreaseCredits($user, $taxi->price);

        $userTaxi = new UserTaxi();
        $userTaxi->user_id = $user->id;
        $userTaxi->taxi_id = $taxi->id;
        $userTaxi->price = $taxi->price;
        $userTaxi->save();

        return true;
    }

    private static function paint(User $user, UserTaxi $userTaxi, Color $color)
    {
        if ($userTaxi->first_painting == 0) {
            // free paint
            $userTaxi->first_painting = 1;
        } else {
            UserService::decreaseCredits($user, $color->price);

        }

        $userTaxi->color_id = $color->id;
        $userTaxi->save();
        return true;

    }

    public static function canBuy(User $user, Taxi $taxi): ?string
    {
        if ($user->credit < $taxi->price) {
            return 'Not enough credit.';
        }

        return null;
    }

    public static function canPaint(User $user, UserTaxi $userTaxi, Color $color): ?string
    {
        if ($userTaxi->first_painting == 0) {
            // free paint

        } else {
            if ($user->credit < $color->price) {
                return 'Not enough credit.';
            }
        }

        if ($userTaxi->color_id == $color->id) {
            return 'The taxi is already painted this color.';
        }

        return null;
    }
}
