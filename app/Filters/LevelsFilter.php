<?php 

namespace App\Filters;

class LevelsFilter extends ApiFilter 
{
    protected $safeParms = [
        'name' => ['eq', 'like'],
        'minNote' => ['eq', 'gt', 'gte', 'lt', 'lte'],
        'maxNote' => ['eq', 'gt', 'gte', 'lt', 'lte']
    ];

    protected $columnMap = [
        'minNote' => 'min_note',
        'maxNote' => 'max_note'
    ];

    protected $operatorMap = [
        'eq' => '=',
        'gt' => '>',
        'lt' => '<',
        'gte' => '>=',
        'lte' => '<=',
        'like' => 'like'
    ];
}