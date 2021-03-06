<?php
namespace App\GraphQL\Types;

use App\Grade;
use App\User;
use GraphQL\Type\Definition\ListOfType;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class UserType extends GenericType
{
    protected $attributes = [
        'name' => 'User',
        'description' => 'A user',
        'model' => User::class,
    ];
    public function fields(): array
    {
        $return = parent::fields(); // TODO: Change the autogenerated stub


        // adding additional fields
        $add = [
            'role' => [
                'type' => GraphQL::type('Role'),
                'description' => 'The Users Role',

            ],
            'grades' => [
                'type' => Type::listOf(GraphQL::type('Grade')),
                'description' => 'The grades of this individual',

            ],
            'UniClasses' => [
                'type' => Type::listOf(GraphQL::type('UniClass')),
                'description' => 'The class this user is attending',

            ],
            'TeachingClasses' => [
                'type' => Type::listOf(GraphQL::type('UniClass')),
                'description' => 'The class this user is teaching',

            ],
        ];

        $return = array_merge($return, $add);
        //$return= $add;

        //dd($return);

        return $return;
    }
}
