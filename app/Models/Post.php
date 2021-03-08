<?php

namespace App\Models;

class Post extends \Enpress\Models\Post
{

    /*
     * Column to use for route model binding
     */
    public function getRouteKeyName()
    {
        return 'post_name';
    }

    public function date()
    {
        return $this->post_date->format(get_option('date_format'));
    }

    public function scopeFilterBy($query, $taxonomy, $id)
    {
        if (!$id) {
            return $query;
        }
        
        $posts = $this->getTable();
        $relations = (new TermRelationship())->getTable();
        
        return $query->leftJoin($relations, "{$relations}.object_id", '=', "{$posts}.id")
                     ->where('term_taxonomy_id', $id);
    }

    public function scopeWithTerms($query, $type)
    {
        $posts = $this->getTable();
        $relations = (new TermRelationship())->getTable();
        $taxonomy = (new Taxonomy())->getTable();
        $terms = (new Term())->getTable();

        return $query->select("{$posts}.*", \DB::raw("group_concat({$terms}.name) as {$type}"))
                     ->leftJoin($relations, "{$relations}.object_id", '=', "{$posts}.id")
                     ->leftJoin($taxonomy, "{$taxonomy}.term_taxonomy_id", '=', "{$relations}.term_taxonomy_id")
                     ->leftJoin($terms, "{$terms}.term_id", '=', "{$taxonomy}.term_taxonomy_id")
                     ->where("{$taxonomy}.taxonomy", $type)
                     ->groupBy("{$posts}.id");
    }

}
