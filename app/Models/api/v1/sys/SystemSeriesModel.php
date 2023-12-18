<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models\api\v1\sys;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\api\v1\dto\SystemSeriesDTO;
use App\Http\Controllers\api\v1\dto\PaymentVendorDetailsDTO;
use App\Http\Controllers\api\v1\dto\ModelInterface;
use App\Http\Controllers\api\v1\util\DBUtil;
use App\Http\Controllers\api\v1\sns\bo\BSnsService;
use App\Http\Controllers\api\v1\dto\SnsDTO;
use App\Http\Controllers\isgapi\api\v1\util\StringUtil;
use App\Http\Controllers\api\v1\dto\AppDTO;

/**
 * @author ISG
 * EventDetailsModel class. EventDetailsModel persistent object.
 */
class SystemSeriesModel extends Model implements ModelInterface{

    public function saveObject(SystemSeriesDTO $systemSeriesDTO)
    {
        $this->series_name = $systemSeriesDTO->getSeriesName();
        $this->last_number = $systemSeriesDTO->getLastNumber();


        $obj = $this->save();
        $systemSeriesDTO->setId($this->id);


        return $systemSeriesDTO;
    }

    public function updateObject(SystemSeriesDTO  $systemSeriesDTO)
    {

    }

    public function getDTOById($id) {
        $systemSeriesDTO = new SystemSeriesDTO();
        $sysSeriesArr = SystemSeriesModel::where('id', $id )->get();
        if($sysSeriesArr)
        {
            $systemSeriesDTO->setId($sysSeriesArr[0]->id);
            $systemSeriesDTO->setSeriesName($sysSeriesArr[0]->series_name);
            $systemSeriesDTO->setLastNumber($sysSeriesArr[0]->last_number);
            return $systemSeriesDTO;
        }
        return null;
    }

    public function getDTOBySeriesName($seriesName) {
        $systemSeriesDTO = new SystemSeriesDTO();
        $sysSeriesArr = SystemSeriesModel::where('series_name', $seriesName )->get();
        if($sysSeriesArr)
        {
            $systemSeriesDTO->setId($sysSeriesArr[0]->id);
            $systemSeriesDTO->setSeriesName($sysSeriesArr[0]->series_name);
            $systemSeriesDTO->setLastNumber($sysSeriesArr[0]->last_number);
            return $systemSeriesDTO;
        }
        return null;
    }



    public function updateSeries(SystemSeriesDTO $sysSeriesDTO)
    {
        $sysDTO = $this->getDTOById($sysSeriesDTO->getId());
        $nextValue = $sysDTO->getLastNumber() + 1;
        DBUtil::updateById($this->table, $sysDTO->getId(), 'last_number', $nextValue);
    }


    /**
     * Instance Variables for the persistent object Model.
     * @var type
     */
    public $timestamps = false;
    protected $table = 'isg_system_series';

}
