<?php

use boctulus\SW\core\libs\Url;

/** Shortcodes */

// shortcode
function sperant()
{
    ?>
    
    <form id="hola_form" aria-label="Formulario de contacto">
        <p><span class="wpcf7-form-control-wrap"><input size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required f2save" aria-required="true" aria-invalid="false" placeholder="Nombre*" value="" type="text" name="fname"></span>
        </p>
        
        <p><span class="wpcf7-form-control-wrap"><input size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required f2save" aria-required="true" aria-invalid="false" placeholder="Apellido*" value="" type="text" name="lname"></span>
        </p>
        
        <p><span class="wpcf7-form-control-wrap"><input size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email f2save" aria-required="true" aria-invalid="false" placeholder="Correo electrónico*" value="" type="email" name="email"></span>
        </p>
        
        <p><span class="wpcf7-form-control-wrap"><input size="40" class="wpcf7-form-control wpcf7-text wpcf7-tel wpcf7-validates-as-required wpcf7-validates-as-tel f2save" aria-required="true" aria-invalid="false" placeholder="Teléfono*" value="" type="tel" name="phone"></span>
        </p>
        
        <p>¿Cuentas con algún presupuesto para adquirir tu nuevo departamento?<br>
        <span class="wpcf7-form-control-wrap">        
            <select class="wpcf7-form-control wpcf7-select wpcf7-validates-as-required f2save" aria-required="true" aria-invalid="false" name="extra_fields:presupuesto"> 
                <option value="De $2,000,000 a $3,000,000">De $2,000,000 a $3,000,000</option>
                <option value="De $3,000,000 a $4,000,000">De $3,000,000 a $4,000,000</option>
                <option value="Más de $4,000,000">Más de $4,000,000</option>
                <option value="No cuento con un presupuesto definido">No cuento con un presupuesto definido</option>
            </select>
        </span>
        </p>
        <p>
            
        <input class="wpcf7-form-control has-spinner wpcf7-submit" type="submit" value="Enviar"><span class="wpcf7-spinner"></span><br>
        <input class="wpcf7-form-control wpcf7-hidden f2save" value="9" type="hidden" name="input_channel_id"><br>
        <input class="wpcf7-form-control wpcf7-hidden f2save" value="4" type="hidden" name="source_id"><br>
        <input class="wpcf7-form-control wpcf7-hidden f2save" value="3" type="hidden" name="interest_type_id"><br>
        <input class="wpcf7-form-control wpcf7-hidden f2save" value="540" type="hidden" name="project_id">

        <!-- area de mensajes -->
        </p><div class="wpcf7-response-output" aria-hidden="true">Gracias por tu mensaje. Ha sido enviado.</div>
    </form>          
            
    <script>

        const base_url = '<?= Url::getBaseUrl() ?>'
        //const url      = base_url + 'wp-json/bzz-export/v1/post';  /// apuntar al endpoint reg. en rutas

        function do_it(e){
                e.preventDefault();

                const jsonData = getFormData(e.currentTarget, false)

                console.log(jsonData)
    
                // jQuery.ajax({
                //     url: url, // post
                //     type: "post",
                //     dataType: 'json',
                //     cache: false,
                //     processData: false, // important
                //     contentType: false, // important
                //     data: '',
                //     success: function(res) {
                //         clearAjaxNotification();

                //         if (typeof res['message'] != 'undefined'){
                //             let msg = res['message'];

                //             if (typeof res['errors'] != 'undefined'){
                //                 if (typeof msg['path'] != 'undefined'){
                //                     console.log(msg['path']);
                //                     setNotification(msg['path']);
                //                 }
                //             }
                //         }

                //         //console.log(res);                        
                //     },
                //     error: function(res) {
                //         clearAjaxNotification();

                //         if (typeof res['message'] != 'undefined'){
                //             setNotification(res['message']);
                //         }

                //         console.log(res);
                //         console.log("An error occured, please try again.");         
                //     }
                // });
            }

            jQuery('#hola_form').on("submit", function(event){ do_it(event); });
    </script>

    <?php
}


add_shortcode('sperant', 'sperant');