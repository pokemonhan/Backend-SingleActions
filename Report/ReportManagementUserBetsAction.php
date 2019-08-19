<?php

namespace App\Http\SingleActions\Backend\Report;

use App\Http\Controllers\BackendApi\BackEndApiMainController;
use App\Models\Project;
use Illuminate\Http\JsonResponse;

class ReportManagementUserBetsAction
{
    /**
     * 玩家注单报表
     * @param   BackEndApiMainController  $contll
     * @return  JsonResponse
     */
    public function execute(BackEndApiMainController $contll): JsonResponse
    {
        $projectEloq = new Project;
        $searchAbleFields = [
            'username',
            'top_id',
            'parent_id',
            'series_id',
            'lottery_sign',
            'method_sign',
            'is_tester',
            'issue',
            'status'
        ];
        $field = 'id';
        $type = 'desc';
        $datas = $contll->generateSearchQuery($projectEloq, $searchAbleFields, 0, null, null, $field, $type);
        return $contll->msgOut(true, $datas);
    }
}