<footer class="footer pt-0">
  <div class="row align-items-center justify-content-lg-between">
    <div class="col-lg-6">
      <div class="copyright text-center  text-lg-left  text-muted">
        &copy; 2020 <a href="https://www.creative-tim.com/" class="font-weight-bold ml-1" target="_blank">Creative Tim</a>
      </div>
    </div>
    <div class="col-lg-6">
      <ul class="nav nav-footer justify-content-center justify-content-lg-end">
        <li class="nav-item">
          <a href="https://www.creative-tim.com/" class="nav-link" target="_blank">Creative Tim</a>
        </li>
        <li class="nav-item">
          <a href="https://www.creative-tim.com/presentation" class="nav-link" target="_blank">About Us</a>
        </li>
        <li class="nav-item">
          <a href="http://blog.creative-tim.com/" class="nav-link" target="_blank">Blog</a>
        </li>
        <li class="nav-item">
          <a href="https://www.creative-tim.com/license" class="nav-link" target="_blank">License</a>
        </li>
      </ul>
    </div>
  </div>
</footer>
</div>
</div>
<!-- Argon Scripts -->
<!-- Core -->
<script src="../../assets/vendor/jquery/dist/jquery.min.js"></script>
<script src="../../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="../../assets/vendor/js-cookie/js.cookie.js"></script>
<script src="../../assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
<script src="../../assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
<!-- Optional JS -->
<script>
  // Example starter JavaScript for disabling form submissions if there are invalid fields
  (function() {
    'use strict';
    window.addEventListener('load', function() {
      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      var forms = document.getElementsByClassName('needs-validation');
      // Loop over them and prevent submission
      var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
          if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
          }
          form.classList.add('was-validated');
        }, false);
      });
    }, false);
  })();
</script>
<!-- Argon JS -->
<script src="../../assets/js/argon.min5438.js?v=1.2.0"></script>
<!-- Demo JS - remove this in your project -->
<script src="../../assets/js/demo.min.js"></script>
<script>
  // Facebook Pixel Code Don't Delete
  ! function(f, b, e, v, n, t, s) {
    if (f.fbq) return;
    n = f.fbq = function() {
      n.callMethod ?
        n.callMethod.apply(n, arguments) : n.queue.push(arguments)
    };
    if (!f._fbq) f._fbq = n;
    n.push = n;
    n.loaded = !0;
    n.version = '2.0';
    n.queue = [];
    t = b.createElement(e);
    t.async = !0;
    t.src = v;
    s = b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t, s)
  }(window,
    document, 'script', '../../../../connect.facebook.net/en_US/fbevents.js');

  try {
    fbq('init', '111649226022273');
    fbq('track', "PageView");

  } catch (err) {
    console.log('Facebook Track Error:', err);
  }
</script>
<noscript>
  <img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=111649226022273&amp;ev=PageView&amp;noscript=1" />
</noscript>
</body>


<!-- Mirrored from demos.creative-tim.com/argon-dashboard-pro/pages/forms/validation.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 02 Feb 2021 17:50:21 GMT -->

</html>