<?php
namespace iTrack\BpExtension\EventHandlers;

use Bitrix\Bizproc\Workflow\Entity\WorkflowInstanceTable;
use Bitrix\Main\Loader;
use Itrack\Custom\Helpers\Utils;

class Bizproc
{
	public static function onTaskAdd($taskId, $arFields)
	{
	    \Bitrix\Main\Loader::includeModule('pull');
		$params = unserialize($arFields['PARAMETERS']);

		if(!empty($params['DOCUMENT_ID'])) {
			list($module, $entity, $documentId) = \CBPHelper::ParseDocumentId($params['DOCUMENT_ID']);
			if($module === 'crm') {
				$entityTypeId = null;
				$entityId = null;
				switch($entity) {
					case 'CCrmDocumentDeal':
					case 'CCrmDocumentLead':
					case 'CCrmDocumentContact':
					case 'CCrmDocumentCompany':
					\CPullStack::AddShared(['module_id' => 'crm', 'command' => 'crm_bizproc_task_create', 'params' => ['TAG' => 'CRM_BP_TASK_'.$documentId]]);
						break;
				}
			}
            if(!empty($arFields['WORKFLOW_ID'])) {
                $wfid = $arFields['WORKFLOW_ID'];
                $workflowState = \CBPStateService::getWorkflowState($wfid);
                if($workflowState['TEMPLATE_ID']==WF_contract) {
                    $dealid = preg_replace("/[^\d]/", '', $documentId);
                    if(Loader::includeModule('crm'))
                    {
                       $arDeal = \CCrmDeal::GetByID($dealid);
                       $ibcont = Utils::getIDIblockByCode(IBPL_CONTR, IBPL_TYPE);
                       $contracts = Utils::getIBlockElementsByConditions($ibcont, ['PROPERTY_KOMPANIYA'=>$arDeal['COMPANY_ID']]);
                       if(!empty($contracts)) {
                           foreach ($contracts as $contract) {
                               $params['REQUEST'][0]['Options'][$contract['ID']] = $contract['NAME'];
                           }
                       }

                       $update = \CBPTaskService::Update($taskId, array(
                           'PARAMETERS' => $params
                       ));
                    }
                }
            }
		}
	}
}