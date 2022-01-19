<?php

namespace Api\Controller;


use Common\Service\SchemaService;

class CoreController extends BaseController
{

    /**
     * 获得所有module信息
     * @return \Think\Response
     */
    public function getModuleData()
    {
        $SchemaService = new SchemaService();
        $resData = $SchemaService->getModuleData();
        foreach ($resData["rows"] as $key => $value) {
            if ($value["code"] == "base") {
                $resData["rows"][$key]["code"] = "task";
            }
        }
        return $this->executeReturn($resData);
    }
}