<?php

declare(strict_types=1);

namespace App\Http\Presenters;

use App\Contracts\PresenterCollectionInterface;
use App\Models\User;
use Illuminate\Support\Collection;

final class UserPresenter implements PresenterCollectionInterface
{
    public function present(User $user): array
    {
        return [
            'id' => $user->getId(),
            'name' => $user->getName(),
            'email' => $user->getEmail(),
            'role' => $user->getRole(),
        ];
    }

    public function presentCollection(Collection $collection): array
    {
        return $collection->map(
            function (User $user) {
                return $this->present($user);
            }
        )->all();
    }
}
