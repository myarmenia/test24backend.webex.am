<?php
namespace App\Trait;
 use Illuminate\Http\Request;
 trait FilterTrait {

    public function scopeFilter($builder, $filters = [])
    {
        if(!$filters) {
            return $builder;
        }

        $tableName = $this->getTable();
        foreach($filters as $field => $value){

            $builder->where($field, $value);

        }
        return $builder;

    }

 }


