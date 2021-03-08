<?php

namespace App\Models;

use Enpress\Database\WordpressModel;

class ProjectsAwards extends WordpressModel
{

    protected $table = 'projects_awards';

    public function scopeDetailed($query)
    {
        $awards = $this->getTable();
        $projects = (new Project())->getTable();
        $terms = (new Term())->getTable();

        $query->select([
            'badge_url',
            'year',
            'url',
            \DB::raw("{$terms}.name AS `awarder`"),
            \DB::raw("{$awards}.title AS `title`"),
            \DB::raw("IF(LENGTH(subtitle), subtitle, {$projects}.title) AS `subtitle`"),
            \DB::raw("IFNULL({$awards}.thumbnail_url, {$projects}.thumbnail_url) AS `thumbnail_url`"),
        ]);
        
        return $query->leftJoin($projects, "{$projects}.id", "{$awards}.project_id")
                     ->leftJoin($terms, "{$terms}.term_id", '=', "{$awards}.awarder_id")
                     ->orderBy('year', 'desc');
    }

    public function scopeFeatured($query)
    {
        return $this->detailed()->where('featured', 1)->take(7);
    }

}
