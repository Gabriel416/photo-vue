// var $grid = $('.grid').masonry({
//   itemSelector: '.grid-item',
//   percentPosition: true,
//   columnWidth: '.grid-sizer'
// });
// // layout Masonry after each image loads
// $grid.imagesLoaded().progress( function() {
//   $grid.masonry();
// });  

// Also can pass in optional settings block
// var rellax = new Rellax('.rellax', {
//   speed: -2,
//   center: false,
//   round: true,
//   vertical: true,
//   horizontal: false
// });

var app = new Vue({
  el: '#app',
  data: {
    name: '',
    email: '',
    message: '',
    didYouMean: '',
    colorSelected: '#1BBC9B',
    errorColor: '#F03434',
    disabled: false,
    nameError: false,
    emailError: false,
    messageError: false,
    buttonText: 'Submit'
  },

  methods: {

    animate: function() {
      $('html, body').animate({
        scrollTop: $(".about-section").offset().top
      }, 900);
    },

    emailSuggestion: function() {
      var that = this;
      var domains = [
        /* Default domains included */
        "aol.com", "att.net", "comcast.net", "facebook.com", "gmail.com", "googlemail.com",
        "google.com", "hotmail.com", "hotmail.co.uk", "mac.com", "me.com", "mail.com", "msn.com",
        "live.com", "sbcglobal.net", "verizon.net", "yahoo.com", "yahoo.co.uk",

        /* United States ISP domains */
        "bellsouth.net", "charter.net", "cox.net", "earthlink.net", "juno.com",

        /* British ISP domains */
        "btinternet.com", "virginmedia.com", "blueyonder.co.uk", "freeserve.co.uk", "live.co.uk",
        "ntlworld.com", "o2.co.uk", "orange.net", "sky.com", "talktalk.co.uk", "tiscali.co.uk",
        "virgin.net", "wanadoo.co.uk", "bt.com",
      ];
      Mailcheck.run({
        email: that.email,
        domains: domains,
        suggested: function(suggestion) {
          // callback code
          console.log(suggestion.full);
          that.didYouMean = suggestion.full;
        },
        empty: function() {
          // callback code
        }
      });
    },

    replaceEmail: function() {
      this.email = this.didYouMean;
      this.didYouMean = '';
    },


    sendContact: function(event) {
      var that = this;
      event.preventDefault();
      this.disabled = true;
      this.buttonText = 'Processing ...';

      axios.post('/contact', {
          name: this.name,
          email: this.email,
          message: this.message
        })
        .then(function(response) {

          // display errors
          if (response.data.errors) {
            that.disabled = false
            that.buttonText = 'Submit';

            if (response.data.errors.name) {
              that.nameError = true;
            } else {
              that.nameError = false;
            }

            if (response.data.errors.email) {
              that.emailError = true;
            } else {
              that.emailError = false;
            }

            if (response.data.errors.message) {
              that.messageError = true;
            } else {
              that.messageError = false;
            }


            //form succesfully goes through
          } else {
            console.log('success');
          }

        })
        .catch(function(error) {
          if (error) {
            alert('Something went wrong. Error message: ' + error)
            that.disabled = false
            that.buttonText = 'Submit';
          }
        });

    },
  }
});
