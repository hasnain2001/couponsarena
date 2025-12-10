          document.getElementById('subscribeForm').addEventListener('submit', function(event) {
                event.preventDefault();
                document.getElementById('thankYouMessage').style.display = 'block';
            });
              // Hide loading spinner when content is loaded
          document.addEventListener('DOMContentLoaded', function() {
              document.getElementById('loadingSpinner').style.display = 'none';
          });

              // Scroll to Top Button
              function topFunction() {
                  document.body.scrollTop = 0;
                  document.documentElement.scrollTop = 0;
              }

              // Show/Hide Scroll to Top Button
              window.onscroll = function() {
                  const myBtn = document.getElementById('myBtn');
                  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                      myBtn.style.display = "block";
                  } else {
                      myBtn.style.display = "none";
                  }
              };

          // Toggle Mobile Menu
          function toggleMobileMenu() {
              const menu = document.getElementById('mobileMenu');
              menu.classList.toggle('active');
              document.body.classList.toggle('no-scroll');
          }

          // Toggle Mega Menu (Desktop)
          function toggleMegaMenu() {
              const megaMenu = document.getElementById('megaMenu');
              megaMenu.classList.toggle('active');
          }
