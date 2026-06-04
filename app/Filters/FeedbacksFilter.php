<?php 

namespace App\Filters;

class FeedbacksFilter extends ApiFilter 
{
    protected $safeParms = [
        'resultNumber' => ['eq', 'gt', 'gte', 'lt', 'lte'],
        'minNote' => ['eq', 'gt', 'gte', 'lt', 'lte'],
        'maxNote' => ['eq', 'gt', 'gte', 'lt', 'lte'],
        'description' => ['eq', 'like'],
    ];

    protected $columnMap = [
        'resultNumber' => 'result_number',
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