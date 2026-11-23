<?php

namespace App\Policies;

use App\Models\Article;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ArticlePolicy
{
    public function create(User $user): Response
    {
        return Response::deny('Only a moderator can create articles.');
    }

    public function update(User $user, Article $article): Response
    {
        return Response::deny('Only a moderator can edit articles.');
    }

    public function delete(User $user, Article $article): Response
    {
        return Response::deny('Only a moderator can delete articles.');
    }
}