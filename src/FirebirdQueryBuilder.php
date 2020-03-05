<?php

namespace Firebird;

use Illuminate\Database\Query\Builder;

class FirebirdQueryBuilder extends Builder
{
    /**
     * Determine if any rows exist for the current query.
     *
     * @return bool
     */
    public function exists()
    {
        return parent::count() > 0;
    }
}
