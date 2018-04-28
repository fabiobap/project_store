            </div>
                </div>
                    <div class="col-sm-2 col-right">
                        <ul class="nav flex-column">
                            <h5><i class="fa fa-cog fa-spin fa-fw"></i>
                                <small><b>Tags</b></small>
                            </h5>
                            <li class="nav-item">
                                <a href="#">Tags(soon)</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <footer class="footer">
                    <p>Project Store 2018</p>
                </footer>
            </main>
        </div>
        <!-- /container -->
        <!-- Bootstrap core JavaScript
            ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="inside/resources/js/jquery-3.2.1.slim.min.js"></script>
        <script src="inside/resources/js/popper.js"></script>
        <script src="inside/resources/js/bootstrap.min.js"></script>
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