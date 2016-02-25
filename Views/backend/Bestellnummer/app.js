Ext.define('Shopware.apps.Bestellnummer', {

    extend: 'Enlight.app.SubApplication',

    name: 'Shopware.apps.Bestellnummer',

    loadPath: '{url action=load}',

    bulkLoad: true,

    controllers: [
        'Main'
    ],

    launch: function () {
        return this.getController('Main').mainWindow;
    }

});