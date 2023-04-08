<?php
css_file('assets/libs/bootstrap/css/bootstrap.min.css');
css_file('assets/libs/jstree/themes/default/style.min.css');
js_file('https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js');
js_file('assets/libs/jstree/jstree.min.js');
?>
<div class="wrap">
    <h1>Árbol de Interacciones</h1>
    <div class="mt-3">
        <span>Búsqueda:</span>
        <span class="input-text-wrap">
            <input id="jstree-search" type="text">
        </span>
    </div>
    <div id="jstree" class="mt-3">
    </div>
</div>
<script>
jQuery(function() {
    (async () => {
        const interactions = await axios.get('/botman/api/interactions/get').then(({
            data
        }) => {
            const q = []
            data.data.forEach(element => {
                const parent = element.parent_id == '0' ? '#' : (element.parent_id ??
                    '#')
                const tmp = {
                    ...element,
                    text: element.interaction,
                    parent,
                    a_attr: {
                        href: `/wp-admin/admin.php?page=chatbot-edit-interaction&id=${element.id}`
                    }
                }

                q.push(tmp)
            });
            return q
        })

        jQuery('#jstree').jstree({
            core: {
                'data': interactions,
            },
            plugins: ['search']
        })

        jQuery('#jstree').bind("select_node.jstree", function(e, data) {
            var href = data.node.a_attr.href;
            window.location.href = href;
        });

        jQuery(function() {
            var to = false;
            jQuery('#jstree-search').keyup(function() {
                if (to) {
                    clearTimeout(to);
                }
                to = setTimeout(function() {
                    var input = jQuery('#jstree-search').val();
                    jQuery('#jstree').jstree(true).search(input);
                }, 250);
            });
        });
    })()
});
</script>