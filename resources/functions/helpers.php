<?php 

function relative_url($url) {
    return str_replace(get_home_url(), '', $url);
}

function create_pager($total, $current, $query) {
    if ($total < 2) {
        return [];
    }

    $pager = range(1, $total);

    if ($current < 3) {
        $pager = array_slice($pager, 0, 5);
    } else {
        $next = array_slice($pager, $current, 2);
        if (($diff = 2 - count($next)) > 0) {
            $prev = array_slice($pager, $current - 3 - $diff, 2 + $diff);
        } else {
            $prev = array_slice($pager, $current - 3, 2);
        }
        $pager = array_merge($prev, [$current], $next);
    }

    return array_map(function($page) use ($query, $current) { 
        return (object)[
            'page' => $page,
            'active' => $current == $page,
            'url' => '?' . http_build_query(compact('page') + $query),
        ];
    }, $pager);
}