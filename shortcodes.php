<?php

/** Shortcodes */

// shortcode
function sperant()
{
    ?>
    
    <form action="/#wpcf7-f82-p84-o1" method="post" aria-label="Formulario de contacto">
        <p><span class="wpcf7-form-control-wrap" data-name="text-155"><input size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="Nombre*" value="" type="text" name="text-155"></span>
        </p>
        
        <p><span class="wpcf7-form-control-wrap" data-name="text-150"><input size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="Apellido*" value="" type="text" name="text-150"></span>
        </p>
        
        <p><span class="wpcf7-form-control-wrap" data-name="email-444"><input size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" aria-required="true" aria-invalid="false" placeholder="Correo electrónico*" value="" type="email" name="email-444"></span>
        </p>
        
        <p><span class="wpcf7-form-control-wrap" data-name="tel-341"><input size="40" class="wpcf7-form-control wpcf7-text wpcf7-tel wpcf7-validates-as-required wpcf7-validates-as-tel" aria-required="true" aria-invalid="false" placeholder="Teléfono*" value="" type="tel" name="tel-341"></span>
        </p>
        
        <p>¿Cuentas con algún presupuesto para adquirir tu nuevo departamento?<br>
        <span class="wpcf7-form-control-wrap" data-name="menu-261">        
            <select class="wpcf7-form-control wpcf7-select wpcf7-validates-as-required" aria-required="true" aria-invalid="false" name="menu-261"> 
                <option value="De $2,000,000 a $3,000,000">De $2,000,000 a $3,000,000</option>
                <option value="De $3,000,000 a $4,000,000">De $3,000,000 a $4,000,000</option>
                <option value="Más de $4,000,000">Más de $4,000,000</option>
                <option value="No cuento con un presupuesto definido">No cuento con un presupuesto definido</option>
            </select>
        </span>
        </p>
        <p>
            
        <input class="wpcf7-form-control has-spinner wpcf7-submit" type="submit" value="Enviar"><span class="wpcf7-spinner"></span><br>
        <input class="wpcf7-form-control wpcf7-hidden" value="9" type="hidden" name="input_channel_id"><br>
        <input class="wpcf7-form-control wpcf7-hidden" value="4" type="hidden" name="source_id"><br>
        <input class="wpcf7-form-control wpcf7-hidden" value="3" type="hidden" name="interest_type_id"><br>
        <input class="wpcf7-form-control wpcf7-hidden" value="540" type="hidden" name="project_id">

        <!-- area de mensajes -->
        </p><div class="wpcf7-response-output" aria-hidden="true">Gracias por tu mensaje. Ha sido enviado.</div>
    </form>          
            
    <?php
}


add_shortcode('sperant', 'sperant');