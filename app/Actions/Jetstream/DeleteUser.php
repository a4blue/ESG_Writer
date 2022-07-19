<?php

namespace App\Actions\Jetstream;

use Illuminate\Support\Facades\DB;
use Laravel\Jetstream\Contracts\DeletesTeams;
use Laravel\Jetstream\Contracts\DeletesUsers;

class DeleteUser implements DeletesUsers
{
    /**
     * The team deleter implementation.
     *
     */
    protected \Laravel\Jetstream\Contracts\DeletesTeams $deletesTeams;

    /**
     * Create a new action instance.
     *
     * @return void
     */
    public function __construct(DeletesTeams $deletesTeams)
    {
        $this->deletesTeams = $deletesTeams;
    }

    /**
     * Delete the given user.
     *
     */
    public function delete(mixed $user): void
    {
        DB::transaction(function () use ($user): void {
            $this->deleteTeams($user);
            $user->deleteProfilePhoto();
            $user->tokens->each->delete();
            $user->delete();
        });
    }

    /**
     * Delete the teams and team associations attached to the user.
     *
     */
    protected function deleteTeams(mixed $user): void
    {
        $user->teams()->detach();

        $user->ownedTeams->each(function ($team): void {
            $this->deletesTeams->delete($team);
        });
    }
}
