<!-- ======= Footer ======= -->
<footer id="footer" class="footer">
    <div class="copyright">
        &copy; Copyright <strong><span>ITSALLFUN</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
        Designed & Developed by <a href="https://arafat.click/">Arafat Hossain</a>
    </div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>
<script>
$(document).ready(function() {
    $('#datatable').DataTable({
        "order": [
            [0, "desc"]
        ]
    });
});
</script>

</body>

</html>