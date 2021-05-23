<?php
namespace iTrack\BpExtension\EventHandlers;

use Bitrix\Bizproc\Workflow\Entity\WorkflowInstanceTable;

class Bizproc
{
	public static function onTaskAdd($taskId, $arFields)
	{
        \Bitrix\Main\Diag\Debug::writeToFile($taskId, "task", "__miros.log");
	    \Bitrix\Main\Diag\Debug::writeToFile($arFields, "fff", "__miros.log");
	    \Bitrix\Main\Loader::includeModule('pull');
		$params = unserialize($arFields['PARAMETERS']);
        \Bitrix\Main\Diag\Debug::writeToFile($params, "params", "__miros.log");
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
            if(!empty($params['WORKFLOW_ID'])) {
                $iterator = WorkflowInstanceTable::getList(
                    array(
                        'select' => array('WORKFLOW_TEMPLATE_ID'),
                        'filter' => array(
                            '=ID' => $params['WORKFLOW_ID'],
                        ),
                    )
                );
                $row = $iterator->fetch();
                if($row['WORKFLOW_TEMPLATE_ID']==WF_contract) {
                    \Bitrix\Main\Diag\Debug::writeToFile($documentId, "docid", "__miros.log");
                }
            }
		}



	}
}