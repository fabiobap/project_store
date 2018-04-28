                </main>
                <footer class="footer">
                    <p>Project Store 2018</p>
                </footer>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript
        ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="resources/js/jquery-3.2.1.slim.min.js"></script>
    <script src="resources/js/popper.js"></script>
    <script src="resources/js/bootstrap.min.js"></script>
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict';

            window.addEventListener('load', function() {
                var form = document.getElementById('needs-validation');
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            }, false);
        })();
    </script>
    <?=$extraJs?>
    </body>
</html>
