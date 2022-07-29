define([
    'ko',
    'uiComponent',
], function (ko, Component) {
    'use strict';

    return Component.extend({
        first : ko.observable(),
        second : ko.observable(),
        result : ko.observable(),
        /** @inheritdoc */
        initialize: function () {
            this._super();
        },
        addEvent: function () {
            this.result(parseInt(this.first()) + parseInt(this.second()));
        }
    });
});
