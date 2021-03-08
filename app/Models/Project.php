<?php

namespace App\Models;

use Enpress\Database\WordpressModel;

class Project extends WordpressModel
{

    protected $table = 'projects';

    public function content($field = null)
    {
        if ($field) {
            return apply_filters('the_content', $this->field($field));
        } else {
            return apply_filters('the_content', $this->content);
        }
    }

    public function categories()
    {
        return $this->hasMany('App\Models\ProjectsCategories');
    }

    public function region()
    {
        return $this->hasOne('App\Models\Term', 'term_id', 'region_id')->first();
    }

    public function field($name, $default = null)
    {
        return get_field($name, $this->id) ?: $default;
    }

    public function featuredImage()
    {
        return preg_replace('#-\d+x\d+#', '', $this->thumbnail_url);
    }

    public function scopeFilterBy($query, $options)
    {
        $projects = $this->getTable();
        $categories = (new ProjectsCategories())->getTable();
        $terms = (new Term())->getTable();
        
        if (!empty($options->category)) {
            $query->leftJoin($categories, "{$categories}.project_id", '=', "{$projects}.id")
                  ->where("{$categories}.term_id", $options->category);
        }
        
        if (!empty($options->region)) {
            $query->where('region_id', $options->region);
        }

        if (strlen($options->q) > 2) {
            $query->leftJoin($categories, "{$categories}.project_id", '=', "{$projects}.id")
                  ->leftJoin($terms, "{$terms}.term_id", '=', "{$categories}.term_id")
                  ->where(function ($query) use($projects, $terms, $options) {
                        $query->where("$projects.title", 'LIKE', "%{$options->q}%")
                              ->orWhere("$terms.name", 'LIKE', "%{$options->q}%");
            });
        }

        return $query;
    }

    public function scopeWithAwards($query)
    {
        $projects = $this->getTable();
        $awards = (new ProjectsAwards())->getTable();

        return $query->addSelect("{$projects}.*")
                     ->addSelect(\DB::raw("COUNT({$awards}.id) as awards"))
                     ->leftJoin($awards, "{$awards}.project_id", '=', "{$projects}.id")
                     ->groupBy("{$projects}.id");
    }

    public function scopeIsPublished($query)
    {
        $projects = $this->getTable();
        $posts = (new Post())->getTable();

        return $query->addSelect("{$projects}.*")
                    ->leftJoin($posts, "{$posts}.id", '=', "{$projects}.id")
                     ->where(function ($query) use ($projects, $posts) {
                         $query->where("$posts.post_status", '=', 'publish');
                     });
    }

    public function scopeWithCategories($query)
    {
        $projects = $this->getTable();
        $categories = (new ProjectsCategories())->getTable();
        $terms = (new Term())->getTable();

        $query->addSelect("{$projects}.*")
              ->addSelect(\DB::raw("group_concat({$terms}.name SEPARATOR '|') as categories"))
              ->leftJoin($categories, "{$categories}.project_id", '=', "{$projects}.id")
              ->leftJoin($terms, "{$terms}.term_id", '=', "{$categories}.term_id")
              ->groupBy("{$projects}.id");

        return $query;
    }

    public function scopeOrderByDate($query)
    {
        $projects = $this->getTable();
        return $query->addSelect("{$projects}.*")
                     ->addSelect(\DB::raw("IFNULL({$projects}.completion_date, {$projects}.updated_at) AS `date`"))
                     ->orderBy('date', 'desc');
    }

}
