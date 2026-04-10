$(document).ready(function() {
    // 1. Initialize Bootstrap Tooltips
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
      return new bootstrap.Tooltip(tooltipTriggerEl);
    });

    // 2. Initialize Bootstrap Popovers
    var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));
    var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
      return new bootstrap.Popover(popoverTriggerEl);
    });

    // 3. Navbar scroll effect (Glassmorphism transition)
    $(window).scroll(function() {
        if ($(this).scrollTop() > 50) {
            $('.navbar').addClass('shadow-sm');
        } else {
            $('.navbar').removeClass('shadow-sm');
        }
    });

    // 4. jQuery Form Validation (Custom display intercept)
    $('#contactForm').on('submit', function(event) {
        var form = this;
        if (!form.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
        } else {
             // Form is valid, show a success message demo
            event.preventDefault(); // Prevent actual submission for demo purposes
            
            // Generate dynamic alert via jQuery instead of standard alert()
            var alertHtml = '<div class="alert alert-success alert-dismissible fade show shadow-sm border-0 mt-3" role="alert">' +
                            '<i class="bi bi-check-circle-fill me-2"></i><strong>Success!</strong> Your message has been sent.' +
                            '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
            
            $(form).after(alertHtml);
            form.reset();
            $(form).removeClass('was-validated');
            
            // Auto hide the alert after 4 seconds
            setTimeout(function() {
                $('.alert-dismissible').alert('close');
            }, 4000);
            return;
        }
        $(form).addClass('was-validated');
    });

    // 5. jQuery dynamic modal data handling (Triggers modal with dynamic content)
    $('.view-project-btn').on('click', function() {
        var title = $(this).data('title');
        var imgSrc = $(this).data('img');
        
        // Dynamically inject data into modal elements
        $('#modalTitle').text(title);
        $('#modalImg').attr('src', imgSrc);
        $('#modalDesc').html('Immerse yourself in the <strong>' + title + '</strong> project. This text and the image above were dynamically loaded utilizing jQuery <code>.data()</code> attributes and event handling. A perfect demonstration of bridging DOM elements with modal components.');
    });

    // 6. jQuery interactivity (Event handling, show/hide, addClass)
    // Tangles the secret message visibility
    $('#magicBtn').on('click', function() {
        $('#secretMessage').slideToggle(400); // animate show/hide
        $(this).toggleClass('btn-dark btn-primary');
        
        // Change button text dynamically
        if ($(this).text() === 'Toggle Secret Message') {
            $(this).text('Hide Secret Message');
        } else {
            $(this).text('Toggle Secret Message');
        }
    });

    // Custom hover states for the interactive box
    $('.interactive-box').hover(
        function() {
            $(this).addClass('hover-active');
        },
        function() {
            $(this).removeClass('hover-active');
        }
    );
});
