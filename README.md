
Existe otro repositorio que tiene el WP completo (plugins incluidos, pero no base de datos en gitlab, este es solo el theme). 

Requiere
===
Tener Contact Form(https://es.wordpress.org/plugins/contact-form-7/) instalado y los formularios creados para insertaros en el DOM mediante shortcodes.

>>   <div class="row visible-xs">
            <div class="form">
                <?php echo do_shortcode('[contact-form-7 id="4" title="Busco trabajadores" html_class="col-xs-10 col-xs-offset-1 col-sm-12 col-sm-offset-0"]'); ?>
            </div>
        </div>

        

Leeme
===
- Tema basado en Underscore de Automattic. 
- 05/12/19. Como no encontraba rastro de la forma en la que anteriormente los assets eran compilados he añadido un archivo de compilación para (Koala)[http://koala-app.com/]. Este mete todos los JS en uno y los mezcla + genera el .min, y lo coloca en la carpeta de JS.
- 05/12/2019. Añadida nueva sección y nuevos formulariso, preparando para cambio de servidor. 



