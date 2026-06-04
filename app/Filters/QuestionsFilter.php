<?php 

namespace App\Filters;

class QuestionsFilter extends ApiFilter 
{
    protected $safeParms = [
        'resultNumber' => ['eq', 'gt', 'gte', 'lt', 'lte'],
        'description' => ['eq', 'like']
    ];

    protected $columnMap = [
        'resultNumber' => 'result_number'
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