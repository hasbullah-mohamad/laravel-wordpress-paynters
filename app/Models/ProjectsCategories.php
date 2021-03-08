<?php

namespace App\Models;

use Enpress\Database\WordpressModel;

class ProjectsCategories extends WordpressModel
{

    protected $table = 'projects_categories';

    public function scopeWithTerms($query)
    {
        $terms_table = (new Term())->getTable();
        return $query->leftJoin($terms_table, "{$terms_table}.term_id", '=', "{$this->getTable()}.term_id");
    }

}
