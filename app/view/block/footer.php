        </div>
    </div>
<div id="footer">
    (C) #FOOTER
</div>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
    <script type="text/javascript" src="<?= URL ?>app/public/js/app.js"></script>
    <script type="text/javascript" src="<?= URL ?>app/public/js/mapsvin.js"></script>
    <script type="text/javascript" src="<?= URL ?>app/public/js/sky.js"></script>
    <script type="text/javascript" src="<?= URL ?>app/public/js/ejs.js"></script>
    <script type="text/javascript" src="<?= URL ?>app/public/js/tmpl.js"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAjpQsW1iXSAXHmSu2uGKqxt527i9Jxp8U&callback=initMap">
    </script>
    <script>
        function initMap() {
            mapsvin.initMap();
        }
        (function () {
            mapsvin.init();
        })();
    </script>
</body>
</html>