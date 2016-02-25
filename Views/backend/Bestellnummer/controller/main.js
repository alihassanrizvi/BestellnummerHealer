Ext.define('Shopware.apps.Bestellnummer.controller.Main', {

    extend: 'Enlight.app.Controller',

    init: function () {
        var me = this;
   
        
          Ext.Ajax.request({
            url: '{url controller=Bestellnummer action=updateOrderId}',
            method: 'POST',
            params: {
                updateOrderId: 'yes'
            },
            success: function(response, operation) {
                //callback(response, operation);
                Ext.Msg.alert('Bestellnummer Healer', response.responseText);
            }
        });
    }

});