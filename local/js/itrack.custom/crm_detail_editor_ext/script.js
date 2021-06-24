BX.namespace('iTrack.Crm.DetailEditorExt');

BX.iTrack.Crm.DetailEditorExt = {
    listFields: [
        'UF_CRM_1620301344',
        'UF_CRM_1620301388',
        'UF_CRM_1620301433',
        'UF_CRM_1620301455',
        'UF_CRM_1622644345',
        'UF_CRM_1620301475',
        'UF_CRM_1620301501',
        'UF_CRM_1622644455',
        'UF_CRM_1620301525',
        'UF_CRM_1622642147',
        'UF_CRM_1622642485',
        'UF_CRM_1622644345',
        'UF_CRM_1622644455',
        'UF_CRM_1622015320',
        'UF_CRM_1619604763'
    ],
    init: function () {
        BX.addCustomEvent('BX.UI.EntityEditorField:onLayout', BX.delegate(this.fieldLayoutHandler, this));
        //BX.addCustomEvent('BX.Crm.EntityEditorSection:onLayout', BX.delegate(this.detailHandler, this));
    },
    fieldLayoutHandler: function (field) {
        console.log(field);
        if (typeof field === 'object') {
            if (field.hasOwnProperty('_id')) {
                if (this.listFields.indexOf(field._id) !== -1) {
                    if (field._mode === 1) {
                        var $node = $(field._innerWrapper).find('select[name="' + field._id + '"]');
                        $node.select2();
                        $node.on('select2:select', function () {
                            field.onChange();
                            //$node[0].dispatchEvent(new Event('bxchange'));
                        });
                    }
                }
            }
        }
    }
};