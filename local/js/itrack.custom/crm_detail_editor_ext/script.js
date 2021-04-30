BX.namespace('iTrack.Crm.DetailEditorExt');

BX.iTrack.Crm.DetailEditorExt = {
    listFields: [
        'UF_CRM_1606230321',
        'UF_CRM_1606230395',
        'UF_CRM_1619604580',
        'UF_CRM_1619604659',
        'UF_CRM_1619604763',
        'UF_CRM_1619612517',
        'UF_CRM_1619612557',
        'UF_CRM_1619612608',
        'UF_CRM_1619612651',
        'UF_CRM_1619614028',
        'UF_CRM_1619614056'
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