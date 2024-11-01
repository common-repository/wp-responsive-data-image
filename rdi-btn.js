(function() {
    tinymce.create('tinymce.plugins.rdi', {
        init : function(ed, url) {
            ed.addButton('rdi', {
                title : 'RDI',
                image : url+'/rdi.png',
                onclick : function() {
                    ed.selection.setContent('[rdi]' + ed.selection.getContent() + '[/rdi]');
                    ed.undoManager.add();
                }
            });
        },
        createControl : function(n, cm) {
            return null;
        },
    });
    tinymce.PluginManager.add('rdi', tinymce.plugins.rdi);
})();