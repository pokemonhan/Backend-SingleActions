<?php

namespace App\Http\SingleActions\Backend\Users\Fund;

use App\Http\Controllers\backendApi\BackEndApiMainController;
use App\Models\User\Fund\FrontendUsersAccountsTypesParam;
use Illuminate\Http\JsonResponse;
use DB;

class AccountChangeTypeFieldModAction
{
    protected $model;

    /**
     * @param  FrontendUsersAccountsType $frontendUsersAccountsType
     */
    public function __construct(FrontendUsersAccountsTypesParam $frontendUsersAccountsTypesParam)
    {
        $this->model = $frontendUsersAccountsTypesParam;
    }

    /**
     * 帐变类型字段修改
     * @param  BackEndApiMainController $contll
     * @return JsonResponse
     */
    public function execute(BackEndApiMainController $contll, $inputDatas): JsonResponse
    {
        $typeField = $this->model->find($inputDatas['id']);
        if (is_null($typeField)) {
            return $contll->msgOut(false, [], '102300');
        }
        $typeField->fill($inputDatas);
        $typeField->save();
        if ($typeField->errors()->messages()) {
            return $contll->msgOut(false, [], '400', $typeField->errors()->messages());
        }
        return $contll->msgout(true);
    }
}
