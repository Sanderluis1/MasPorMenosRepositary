</div>
</div>
<footer class="footer">
    <div class="container-fluid">
        <div class="copyright float-right">
            Corporacion de Servicios DIVI
            &copy;
            <script>
                document.write(new Date().getFullYear())
            </script>
            <a href="#" target="_blank"></a>
        </div>
    </div>
</footer>
</div>
</div>
<div id="nuevo_pass" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">Cambiar contraseña</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="frmPass">
                    <div class="form-group">
                        <label for="actual"><i class="fas fa-key"></i> Contraseña Actual</label>
                        <input id="actual" class="form-control" type="password" name="actual" placeholder="Contraseña actual" required>
                    </div>
                    <div class="form-group">
                        <label for="nueva"><i class="fas fa-key"></i> Contraseña Nueva</label>
                        <input id="nueva" class="form-control" type="password" name="nueva" placeholder="Contraseña nueva" required>
                    </div>
                    <button class="btn btn-primary btn-block" type="button" onclick="btnCambiar(event)">Cambiar Contraseña</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="../assets/js/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
<script src="../assets/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="../assets/js/material-dashboard.js" type="text/javascript"></script>
<script src="../assets/js/bootstrap-notify.js"></script>
<script src="../assets/js/arrive.min.js"></script>
<script src="../assets/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="../assets/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
<script src="../assets/js/sweetalert2.all.min.js"></script>
<script src="../assets/js/jquery-ui/jquery-ui.min.js"></script>
<script src="../assets/js/chart.min.js"></script>
<script src="../assets/js/funciones.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
    const navLinks = document.querySelectorAll('.nav-link');
    const currentUrl = window.location.href;

    // Encontrar el enlace activo y desplazar la barra de desplazamiento
    const activeLink = Array.from(navLinks).find(link => link.href === currentUrl);
    if (activeLink) {
        activeLink.classList.add('active');
        activeLink.scrollIntoView({ behavior: 'auto', block: 'nearest', inline: 'start' }); // Desplazamiento sin animación
    }

    navLinks.forEach(link => {
        link.addEventListener('click', (event) => {
            event.preventDefault(); // Evitar el comportamiento predeterminado del enlace

            // Remover la clase 'active' de todos los enlaces
            navLinks.forEach(navLink => navLink.classList.remove('active'));

            // Agregar la clase 'active' al enlace clickeado
            link.classList.add('active');

            // Desplazar la barra hasta que el enlace activo esté visible sin animación
            link.scrollIntoView({ behavior: 'auto', block: 'nearest', inline: 'start' });

            // Obtener la URL del enlace clickeado
            const url = link.getAttribute('href');

            // Actualizar la URL en la barra de direcciones sin recargar la página
            window.history.pushState({}, '', url);

            // Redirigir a la página correspondiente
            window.location.href = url;
        });
    });

    // Manejar los eventos de cambio de URL
    window.addEventListener('popstate', () => {
        const currentUrl = window.location.href;
        const activeLink = Array.from(navLinks).find(link => link.href === currentUrl);
        if (activeLink) {
            activeLink.classList.add('active');
            activeLink.scrollIntoView({ behavior: 'auto', block: 'nearest', inline: 'start' }); // Desplazamiento sin animación
        }
    });
});


</script>
</body>

</html>