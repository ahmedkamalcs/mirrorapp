<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers\api\v1\util;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Pagination\LengthAwarePaginator;

class DBUtil {

    public static $RECORD_DOESNOT_EXIST = 0;
    public static $PAGINATION_DEFAULT_ROWS_PER_PAGE = 10;

    public static function select($query) {
        $results = DB::select(DB::raw($query));
        return $results;
    }

    public static function paginate($query, $request)
    {
        $results1 = DB::select(DB::raw($query));
        $results = $this->arrayPaginator($results1, $request);
        return $results;
    }

     public static function arrayPaginator($array, $request) {
        $page = Input::get('page', 1);
        $perPage = DBUtil::$PAGINATION_DEFAULT_ROWS_PER_PAGE;
        $offset = ($page * $perPage) - $perPage;

        return new LengthAwarePaginator(array_slice($array, $offset, $perPage, true), count($array), $perPage, $page, ['path' => $request->url(), 'query' => $request->query()]);
    }

    /**
     * Update value by id.
     * @param type $tableName The table where you need to update values in.
     * @param type $id Unique ID used in where clause
     * @param type $col Target Column to Update.
     * @param type $value New Value.
     */
    public static function updateById($tableName, $id, $col, $value)
    {
       return DB::table($tableName)
                                                    ->where('id','=',$id)
                                                    ->update([
                                                                $col            => $value,
                                                            ]);
    }
    
    public static function updateColumnsById($tableName, $id, $col1, $col2, $col3, $col4, $value1, $value2, $value3, $value4)
    {
       return DB::table($tableName)
                                                    ->where('id','=',$id)
                                                    ->update([
                                                                $col1            => $value1,
                                                                $col2            => $value2,
                                                                $col3            => $value3,
                                                                $col4            => $value4,    
                                                            ]);
    }

    public static function updateByColName($tableName, $condColName, $condColValue, $updateCol, $updateValue)
    {
        DB::table($tableName)
                                                    ->where($condColName,'=',$condColValue)
                                                    ->update([
                                                                $updateCol            => $updateValue,
                                                            ]);
    }

    public static function massUpdate($table, $array)
    {
         DB::table($table)
                ->update($array);
    }

    //TODO
    public static function saveOrUpdate($obj, $queryToFind)
    {

    }

    public static function exeQuery($query)
    {
        DB::statement($query);
    }
}

