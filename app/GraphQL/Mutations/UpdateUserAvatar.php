<?php

namespace App\GraphQL\Mutations;

use App\Models\User;

final class UpdateUserAvatar
{
    /**
     * @param null $_
     * @param array{} $args
     * @return mixed
     */
    public function __invoke($_, array $args)
    {
        $file = $args['image'];

        $path = $file->storePublicly('uploads');
        $user = User::whereId($args['id'])->first();
        $user->update(['avatar' => $path]);

        return $user;
    }
}
