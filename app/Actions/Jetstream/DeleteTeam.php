<?php

namespace App\Actions\Jetstream;

use Laravel\Jetstream\Contracts\DeletesTeams;

class DeleteTeam implements DeletesTeams
{
    /**
     * Delete the given team.
     *
     */
    public function delete(mixed $team): void
    {
        $team->purge();
    }
}
