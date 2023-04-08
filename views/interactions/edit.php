<?php

css_file('assets/libs/bootstrap/css/bootstrap.min.css');
css_file('assets/libs/tabulator/css/tabulator.min.css');
css_file('assets/libs/tagify/tagify.css');
css_file('assets/libs/sweetalert2/sweetalert2.min.css');
css_file('assets/libs/bootstrap-icons-1.10.3/bootstrap-icons.css');

js_file('assets/libs/bootstrap/js/bootstrap.bundle.min.js');
js_file('assets/libs/tabulator/js/tabulator.min.js');
js_file('assets/libs/axios/axios.min.js');
js_file('assets/libs/sweetalert2/sweetalert2.all.min.js');
js_file('assets/libs/tagify/tagify.min.js');
js_file('assets/libs/tagify/tagify.polyfills.min.js');
js_file('assets/js/interactions/view.js');
js_file('assets/js/interactions/childs.js');

?>
<div class="wrap">
    <h1>Interacción: <span id="interaction-description"></span></h1>
    <div class="d-flex mt-3 gap-2">
        <div class="btn-group">
            <button id="return-btn" type="button" class="btn btn-secondary">
                <i class="bi bi-arrow-return-left"></i>
            </button>
            <button id="add-interaction-btn" class="btn btn-success d-flex gap-2" data-bs-toggle="modal" data-bs-target="#interactionModal">
                <i class="bi bi-plus-square"></i>
            </button>
            <button id="edit-interaction-btn" class="btn btn-info d-flex gap-2" type="button">
                <i class="bi bi-pencil"></i>
            </button>
        </div>
        <a href="admin.php?page=chatbot-iteractions" class="ms-auto">Interacciones</a>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="interactionModal" tabindex="-1" aria-labelledby="interactionModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="interaction-form-title"></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    <form id="interaction-form" class="container">
                        <input type="text" name="id" id="interaction-id" class="d-none">
                        <input type="hidden" id="parent_id" name="parent_id" value="<?= $_GET['id'] ?? null ?>">
                        <div class="row">
                            <div class="mb-3">
                                <label for="interaction" class="form-label">Nombre</label>
                                <textarea id="interaction" name="interaction" class="form-control"></textarea>
                                <div id="interactionFeedback" class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3">
                                <label for="enabled" class="form-label">Habilitado</label>
                                <input type="hidden" name="enabled" value="0">
                                <input type="checkbox" id="enabled" name="enabled" class="form-checkbox" value="1">
                            </div>
                        </div>
                        <input type="hidden" name="is_super_parent" value="0">
                        <div class="row">
                            <div class="mb-3">
                                <label for="has_submenu" class="form-label">Habilitar Submenú</label>
                                <input type="hidden" name="has_submenu" value="0">
                                <input type="checkbox" id="has_submenu" name="has_submenu" class="form-checkbox" value="1">
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3">
                                <label for="question" class="form-label">Pregunta</label>
                                <textarea id="question" name="question" class="form-control"></textarea>
                                <div id="questionFeedback" class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3">
                                <label for="response" class="form-label">Respuesta</label>
                                <textarea id="response" name="response" class="form-control"></textarea>
                                <div id="responseFeedback" class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3">
                                <label for="link" class="form-label">Link</label>
                                <input type="text" id="link" name="link" class="form-control">
                                <div id="linkFeedback" class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3">
                                <label for="coincidences" class="form-label">Coincidencias</label>
                                <input id="coincidences" name="coincidences" type="text" class="form-control" />
                                <div id="coincidencesFeedback" class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3">
                                <label for="menu_order" class="form-label">Orden</label>
                                <input id="menu_order" name="menu_order" type="number" class="form-control" />
                                <div id="menu_orderFeedback" class="invalid-feedback"></div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary" form="interaction-form">Guardar</button>
                </div>
            </div>
        </div>
    </div>
    <h1>Interacciones hijas</h1>
    <div id="table" class="mt-3"></div>
</div>