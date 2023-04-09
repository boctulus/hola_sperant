<?php

use boctulus\SW\core\libs\Url;

/** Shortcodes */

// shortcode
function sperant()
{
    ?>
    
    <form id="hola_form" aria-label="Formulario de contacto">
        <p><span class="wpcf7-form-control-wrap">
            <input required size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required f2save" aria-required="true" aria-invalid="false" placeholder="Nombre*" value="" type="text" name="fname"></span>
        </p>
        
        <p><span class="wpcf7-form-control-wrap">
            <input required size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required f2save" aria-required="true" aria-invalid="false" placeholder="Apellido*" value="" type="text" name="lname"></span>
        </p>
        
        <p><span class="wpcf7-form-control-wrap">
            <input required size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email f2save" aria-required="true" aria-invalid="false" placeholder="Correo electrónico*" value="" type="email" name="email"></span>
        </p>
        
        <p><span class="wpcf7-form-control-wrap">
            <input required size="40" class="wpcf7-form-control wpcf7-text wpcf7-tel wpcf7-validates-as-required wpcf7-validates-as-tel f2save" aria-required="true" aria-invalid="false" placeholder="Teléfono*" value="" type="tel" name="phone"></span>
        </p>
        
        <p>¿Cuentas con algún presupuesto para adquirir tu nuevo departamento?<br>
        <span class="wpcf7-form-control-wrap">        
            <select required class="wpcf7-form-control wpcf7-select wpcf7-validates-as-required f2save" aria-required="true" aria-invalid="false" name="extra_fields:presupuesto"> 
                <option value="De $2,000,000 a $3,000,000">De $2,000,000 a $3,000,000</option>
                <option value="De $3,000,000 a $4,000,000">De $3,000,000 a $4,000,000</option>
                <option value="Más de $4,000,000">Más de $4,000,000</option>
                <option value="No cuento con un presupuesto definido">No cuento con un presupuesto definido</option>
            </select>
        </span>
        </p>
        <p>
            
        <input class="wpcf7-form-control has-spinner wpcf7-submit" id="submit_btn" type="submit" value="Enviar">

        <!-- loading notification -->
        <div id="loading-text"></div><br>
        
        <input class="wpcf7-form-control wpcf7-hidden f2save" value="9" type="hidden" name="input_channel_id"><br>
        <input class="wpcf7-form-control wpcf7-hidden f2save" value="4" type="hidden" name="source_id"><br>
        <input class="wpcf7-form-control wpcf7-hidden f2save" value="3" type="hidden" name="interest_type_id"><br>
        <input class="wpcf7-form-control wpcf7-hidden f2save" value="540" type="hidden" name="project_id">

        <!-- area de mensajes     -->
        </p><div class="wpcf7-response-output" id="response-output" aria-hidden="true"></div>
    </form>          
            
    <script>

        const base_url = '<?= Url::getBaseUrl() ?>'
        const url      = base_url + '/api/v1/form/save';  /// apuntar al endpoint reg. en rutas

        function setNotification(msg){
            $('#response-output').show()
            $('#response-output').html(msg);
        }

        /*
            Agregado para el "loading,.." con Ajax
        */
    
        function loadingAjaxNotification() {
            <?php $path = asset('images/loading.gif') ?>

            document.getElementById("loading-text").innerHTML = "<img src=\"<?= $path ?>\" style=\"transform: scale(0.5);\" />";
        }

        function clearAjaxNotification() {
            document.getElementById("loading-text").innerHTML = "";
        }

        function do_it(e){
                e.preventDefault();

                let jsonData = getFormData(e.currentTarget, false)

                jsonData['extra_fields'] = { 'presupuesto': jsonData['extra_fields:presupuesto'] }
                delete jsonData['extra_fields:presupuesto']

                //console.log(jsonData)

                loadingAjaxNotification()

                jQuery.ajax({
                    url: url, // post
                    type: "post",
                    dataType: 'json',
                    cache: false,
                    contentType: 'application/json',
                    data: JSON.stringify(jsonData),
                    success: function(res) {
                        clearAjaxNotification();

                        // if (typeof res['error'] != 'undefined'){
                        //     if (typeof res['error']['message'] != 'undefined'){
                        //         setNotification(res['error']['message']);
                        //     }
                        // }

                        //console.log('RES', res); 
                        setNotification("Gracias por tu mensaje. Ha sido enviado.");
                                               
                    },
                    error: function(res) {
                        clearAjaxNotification();

                        // if (typeof res['message'] != 'undefined'){
                        //     setNotification(res['message']);
                        // }

                        //console.log('RES', res);
                        setNotification("Hubo un error. Inténtelo más tarde.");  
                    }
                });
        }

        jQuery('#hola_form').on("submit", function(event){ do_it(event); });
    </script>

    <?php
}


add_shortcode('sperant', 'sperant');