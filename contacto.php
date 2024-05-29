<?php include_once('header.php'); ?>
    
    <div class="contact-box-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-sm-12">
                    <div class="contact-form-right">
                        <h2>PONTE EN CONTACTO</h2>
                        <p>Ponte en contacto con nostros si quieres un pedido especial o si tienes alguna duda sobre nuestros productos en tu compra.</p>
                        
                            <div class="row">
                               
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="asuntocontacto" name="asuntocontacto" placeholder="Asunto" required data-error="Por favor , introduce el asunto del mensaje">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea class="form-control" id="mensajecontacto" name="mensajecontacto" placeholder="Tu mensaje" rows="4" data-error="Escribe tu mensaje" required></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="submit-button text-center">
                                    <a class="btn hvr-hover" id="enviarCorreo" href="#" style="color:white;">Enviar Mensaje</a>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        
                    </div>
                </div>
				<div class="col-lg-4 col-sm-12">
                    <div class="contact-info-left">
                        <h2>INFORMACIÓN DE CONTACTO</h2>
                        <p>Si prefieres ponerte en contacto con nosotros, puedes hacerlo por cualquiera de los siguientes medios: </p>
                        <ul>
                            <li>
                                <p><i class="fas fa-phone-square"></i>Teléfono: <a href="tel:652652652">652652652</a></p>
                            </li>
                            <li>
                                <p><i class="fas fa-envelope"></i>Email: <a href="mailto:jsandur900@g.educaand.es">jsandur900@g.educaand.es</a></p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include('footer.php'); ?>


 <!--Como necesitaba un servidor para enviar correos se me ocurrio enviarlo por enlace para que te abra el correo instalado y pasarle el valor de el asunto y el del mensaje directamente --> 
<script>
    document.getElementById("enviarCorreo").addEventListener("click", function() {
        var asunto = document.getElementById("asuntocontacto").value;
        var mensaje = document.getElementById("mensajecontacto").value;

        var email = "jsandur900@g.educaand.es";
        var Asunto = encodeURIComponent(asunto);
        var enviara = "mailto:" + email + "?subject=" + Asunto +"&body=" + mensaje;
        window.location.href = enviara;
    });
</script>